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
Route::post('/users/assignrole','UserController@assignrole')->name('assignrole');