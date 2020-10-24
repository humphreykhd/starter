<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Session;

class RoleManagementController extends Controller
{
    private $title = "Role Management";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
       $this->middleware(['permission:show-role|create-role|edit-role|delete-role'],['only' => ['index','edit','create','delete']]);
    }
    public function index()
    {
        $title = $this->title;
        $roles = DB::table('roles')
            ->select('roles.*')
            ->get();
        return view('admin/roles-mgmt/index', ['roles' => $roles, 'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $permissions = Permission::all();
        return view('admin/roles-mgmt/create',['title'=>$title],compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        try {

        $this->validate($request,[
            'name' =>'required|max:191|unique:roles|regex:/^[a-zA-Z ]+$/u|max:255',
            'description' => 'required',
            'permissions' => 'required'
        ]);
        $role = new Role();
        $role->name = $request['name'];
        $role->guard_name = 'web';
        $role->description = $request['description'];
        $role->syncPermissions($request->input('permissions'));
        $role->save();

        Session::flash('success', 'Role '.$role->name.' created successfully');
        return redirect()->intended('role-management');
//        } catch (\Illuminate\Database\QueryException $ex) {
//            Session::flash('error', 'Role creation failed! Please check your details and try again');
//            return redirect()->intended('/admin/role-management');
//        }
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
        $role = Role::findOrFail($id);
        // Redirect to role list if record to edit is not found or does not exist
        if ($role == null) {
            return redirect()->intended('admin/role-management');
        }
        $permissions = Permission::all();
        return view('admin/roles-mgmt/edit', ['role' => $role, 'title'=>$title, 'permissions'=>$permissions]);
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
        $title = $this->title;
        $this->validate(request(), [
            'name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'description' => 'required',
            'permissions' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request['name'];
        $role->description = $request['description'];

        $role->permissions()->sync($request['permissions']);
//        dd($role->permissions);
        $role->save();
        Session::flash('success', 'Role '.$role->name.' updated Successfully');
        return redirect()->intended('role-management')->with('title', $title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Role::where('id', $request->id)->delete();
        Session::flash('success', 'Role Deleted successfully!');
        return redirect()->intended('role-management');
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
            'description' => $request['description']
        ];
        $roles = $this->doSearchingQuery($constraints);
        return view('admin/roles-mgmt/index', ['roles' => $roles, 'searchingVals' => $constraints]);
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
}
