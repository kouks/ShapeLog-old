<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//->middleware('logout_check')
Route::get('', "HomeController@index");
Route::get('login', "HomeController@login");

Route::group(['prefix' => 'profile'], function() {
	Route::get('', 'ProfileController@index')->middleware('logout_check');
	Route::post('add', 'ProfileController@add')->middleware('logout_check');
	Route::get('delete/{id}', 'ProfileController@delete')->middleware('logout_check');

	Route::get('graphs', 'GraphsController@index')->middleware('logout_check');

	Route::get('logout', 'ProfileController@logout');
});