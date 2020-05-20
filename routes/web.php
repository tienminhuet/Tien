<?php

use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth')->group(function () {

});

Route::post('userRegister', 'UserController@store');
Route::get('logout', 'UserController@logout')->name('logout');
Route::put('initGroup', 'GroupController@store');

Route::post('regGroup', 'GroupController@makeRegGroup');

Route::get('profile', 'ProfileController@index')->name('profile');
Route::put('profile', 'ProfileController@store');

Route::get('carDetail/{id}', 'CarDetailController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/user', 'UserController@index');
Route::get('/admin/group', 'GroupController@index');
