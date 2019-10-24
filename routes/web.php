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

// DB::listen(function ($event) 
// {
// 	dump($event->sql);
// });

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth'],'prefix' => 'task'], function() {
	Route::get('/', 'TaskController@index');
	Route::post('/', 'TaskController@store')->middleware('checkduedate');
	Route::get('/create', 'TaskController@create');
});


// Route::resource('task', 'TaskController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users','UserController@index');
// Route::group(['middleware' => ['permission:user-list']], function () {
	Route::get('/users/role','UserController@roles');
// });

Route::post('/users/assignrole','UserController@assignrole')->name('assignrole');
Route::post('/users/createRole','UserController@createRole')->name('createRole');
Route::post('/users/createPermission','UserController@createPermission')->name('createPermission');
Route::post('/users/roleassignpermission','UserController@roleassignpermission')->name('roleassignpermission');
