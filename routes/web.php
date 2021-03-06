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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('board', ['as' => 'board', 'uses' => 'BoardController@index']);
	Route::get('board/create', ['as' => 'board.create', 'uses' => 'BoardController@create']);
	Route::get('board/card/{id}', ['as' => 'board.showById', 'uses' => 'BoardController@showById']);
	Route::post('board/save', ['as' => 'board.store', 'uses' => 'BoardController@store']);
	Route::delete('board/delete/{id}', ['as' => 'board.destroy', 'uses' => 'BoardController@destroy']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::post('task', ['as' => 'task.store', 'uses' => 'TaskController@store']);
	Route::get('task/done/{id}', ['as' => 'task.done', 'uses' => 'TaskController@done']);
	Route::delete('task/delete/{id}', ['as' => 'task.destroy', 'uses' => 'TaskController@destroy']);

});

Route::group(['middleware' => 'auth'], function () {
	Route::get('card/create/{id}', ['as' => 'card.create', 'uses' => 'CardController@create']);
	Route::post('card/save', ['as' => 'card.store', 'uses' => 'CardController@store']);
	Route::delete('card/delete/{id}', ['as' => 'card.destroy', 'uses' => 'CardController@destroy']);
});




