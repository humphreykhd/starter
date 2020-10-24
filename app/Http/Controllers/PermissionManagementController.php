<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Auth;
use Session;

class PermissionManagementController extends Controller
{
    private $title = 'Permission Management';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:show-permission|create-permission|edit-permission|delete-permission'],['only' => ['index','edit','create','delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $permissions = DB::table('permissions')
            ->select('permissions.*')
            ->get();
        return view('admin/permissions-mgmt/index', ['permissions' => $permissions, 'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        return view('admin/permissions-mgmt/create', ['title'=>$title]);
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
                'name' => 'required|unique:permissions|max:255'
            ]);

            $permission = new Permission();
            $permission->name = $request['name'];
            $permission->guard_name = 'web';
            $permission->save();

//            Mail::to($user->email)->send(new VerifyMail($user));
            Session::flash('success', 'Permission '.$permission->name.' created successfully');
            return redirect()->intended('permission-management');
//            dd($admin);
        } catch (\Illuminate\Database\QueryException $ex) {
            Session::flash('error', 'Permission creation failed! Please check your details and try again');
            return redirect()->intended('permission-management');
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
        $title = $this->title;
        $permission = Permission::findOrFail($id);
        // Redirect to state list if record to edit is not found or does not exist
        if ($permission == null) {
            return redirect()->intended('permission-management');
        }

        return view('admin/permissions-mgmt/show', ['permission' => $permission])->with('success', 'Record Updated Successfully');

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
        $permission = Permission::findOrFail($id);
        // Redirect to permission list if record to edit is not found or does not exist
        if ($permission == null) {
            return redirect()->intended('permission-management');
        }
        $user = Auth::user()->id;
        return view('admin/permissions-mgmt/edit', ['permission' => $permission, 'title'=>$title, 'user'=> $user]);
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
        try{
            $title = $this->title;
//        try {
            $this->validate(request(), [
                'name' => 'required|max:255'
            ]);


            $permission = Permission::findOrFail($id);
            $permission->name = $request['name'];
            $permission->guard_name = 'web';
            $permission->save();
            Session::flash('success', 'Permission '.$permission->name.' updated Successfully');
            return redirect()->route('permission-management.index');

        } catch (\Error $ex) {
            return back()->withErrors($ex->getMessage());
        } catch (\InvalidArgumentException $ex) {
            return back()->withErrors($ex->getMessage());
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if($errorCode == 2601){
                Session::flash('error', 'Your permission already exists, please try again');
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
        Permission::where('id', $request->id)->delete();
        Session::flash('success', 'Permission deleted successfully!');
        return redirect()->intended('permission-management');
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
            'category' => $request['category']
        ];

        $permissions = $this->doSearchingQuery($constraints);
        return view('admin/permissions-mgmt/index', ['permissions' => $permissions, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = Permission::query();
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
}
