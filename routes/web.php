<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');




Route::group(['namespace' => 'App\Http\Controllers'], function(){

    // User Routes
    Route::resource('users', 'UserController');
    Route::get('all-users', 'UserController@allUsers');
    Route::post('user-store', 'UserController@store');
    Route::get('edit-user/{id}', 'UserController@edit');



    // Role Routes
    Route::resource('role', 'RoleController');
    Route::get('allrole', 'RoleController@allRoles') -> name('role.all');
    Route::get('role-status-update/{id}', 'RoleController@roleStatus') -> name('role.status');
    Route::get('role-edit-data/{id}', 'RoleController@roleEditData') -> name('role.edit.data');
    Route::put('role-update-data', 'RoleController@roleUpdateData') -> name('role.update.data');
    Route::get('role-delete/{id}', 'RoleController@roleDeleteData') -> name('role.delete.data');
});
