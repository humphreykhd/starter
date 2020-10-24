<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $title = "Dashboard";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        return view('dashboard', ['title'=>$title]);


    }

    public function profile(){
        $title = "Profile Management";
        $user = Auth::user();

        $model_has_role = DB::table('model_has_roles')->select('model_has_roles.role_id')
            ->where('model_id', $user->id)
            ->pluck('model_has_roles.role_id');

            $roles = DB::table('roles')->select('roles.*')
                ->whereIn('id', $model_has_role)
                ->get();
            $loginuser = DB::table('roles')->select('roles.name')
                ->whereIn('id', $model_has_role)
                ->get();
            return view('profile', ['user' => $user,'loginuser' => $loginuser], compact('title', 'roles'));

    }
}
