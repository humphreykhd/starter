<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    private $title = "User Management";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:show-user|create-user|edit-user|delete-user'], ['only' => ['index', 'edit', 'create', 'delete']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $users = DB::table('users')
            ->select('users.*')
            ->get();
        return view('admin/users-mgmt/index', ['users' => $users, 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;

        $user = Auth::user();

            return view('admin/users-mgmt/create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $this->validate(request(), [
                'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
                'last_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|min:6',
                'profilepic' => 'image|nullable|max:1999|mimes:jpeg,png,jpg'
            ]);

            $user = new User();
            if ($request->hasFile('profilepic')) {
                $image = $request->file('profilepic');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('profilepics/' . $filename);
                Image::make($image)->resize(190, 190)->save($location);
                $user->profilepic = $filename;
            }
            $user->name = $request['first_name'] . ' ' . $request['last_name'];
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->email = $request['email'];
            $user->verified = 1;
            $user->password = bcrypt($request['password']);
            $user->save();

//            $verifyUser = VerifyUser::create([
//                'user_id' => $user->id,
//                'token' => str_random(40)
//            ]);
//
//            Mail::to($user->email)->send(new VerifyMail($user));

            Session::flash('success', 'User ' . $user->name . ' created successfully');
            return redirect()->intended('user-management');
//            dd($admin);
        } catch (QueryException $ex) {
            Session::flash('error', 'User creation failed! Please check your details and try again' . $ex);
            return redirect()->intended('user-management');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = $this->title;
        $user = User::findOrFail($id);
        // Redirect to contact list if record to edit is not found or does not exist
        if ($user == null) {
            return redirect()->intended('user-management');
        }
        $roles = Role::all();
            return view('admin/users-mgmt/edit', ['user' => $user, 'roles' => $roles, 'title' => $title]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $title = $this->title;

            $user = User::findOrFail($id);

            $this->validate(request(), [
                'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
                'last_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
                'email' => 'required',
                'profilepic' => 'image|nullable|max:1999|mimes:jpeg,png,jpg'
            ]);
            if ($request->hasFile('profilepic')) {
                $image = $request->file('profilepic');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('profilepics/' . $filename);
                Image::make($image)->resize(190, 190)->save($location);
                $user->profilepic = $filename;
            }
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->name = $request['first_name'] . ' ' . $request['last_name'];
            $user->email = $request['email'];
            $user->roles()->sync($request->roles);
            $user->member_id = $request['member_id'];
            $user->save();

            Session::flash('success', 'User ' . $user->name . ' Updated Successfully');
            return redirect()->route('user-management.index', ['title' => $title]);

        } catch (\Error $ex) {
            return back()->withErrors($ex->getMessage());
        } catch (\InvalidArgumentException $ex) {
            return back()->withErrors($ex->getMessage());
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if($errorCode == 2601){
                Session::flash('error', 'Your email already exists, please try again');
            }
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)

    {
        User::where('id', $request->id)->delete();
        Session::flash('success', 'User Deleted Successfully');
        return redirect()->intended('user-management');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $constraints = [
            'name' => $request['name'],
            'first_name' => $request['firstname'],
            'last_name' => $request['lastname'],
            'email' => $request['email']
        ];

        $users = $this->doSearchingQuery($constraints);
        return view('admin/users-mgmt/index', ['users' => $users, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = User::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%' . $constraint . '%');
            }

            $index++;
        }
        return $query->get();
    }


    /**
     * Remove the Profile Picture resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function removeImage($id)
    {

        $user = User::findOrFail($id);
        if (File::exists(public_path('profilepics/' . $user->profilepic))) {

            File::delete(public_path('profilepics/' . $user->profilepic));
            $user->update(['profilepic' => null]);
//            dd($contact);
            Session::flash('success', 'Image for user ' . $user->name . ' deleted successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'File ' . public_path('profilepics/' . $user->profilepic) . ' does not exist');
            return redirect()->back();
        }
    }

}
