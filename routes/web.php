<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', 'login');

Auth::routes(['register' => false]);

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

//Dashboard Controller
Route::get('dashboard', 'DashboardController@index');
Route::get('profile', 'DashboardController@profile')->name('profile');

//User Management
Route::resource('user-management', 'UserManagementController');

//Role Management
Route::resource('role-management', 'RoleManagementController');

//Permission Management
Route::resource('permission-management', 'PermissionManagementController');

//Log viewer
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
