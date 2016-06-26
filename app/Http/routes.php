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

Route::get('', "HomeController@index");
Route::get('login', "HomeController@login");

Route::group(['prefix' => 'profile'], function() {
	
	Route::get('', 'ProfileController@index')->middleware('logout_check');
	Route::post('add', 'ProfileController@add')->middleware('logout_check');
	Route::post('edit', 'ProfileController@edit')->middleware('logout_check');
	Route::get('delete/{id}', 'ProfileController@delete')->middleware('logout_check');

	Route::get('graphs', 'GraphsController@index')->middleware('logout_check');

	Route::group(['prefix' => 'tags'], function() {
		Route::get('', 'TagsController@index')->middleware('logout_check');
		Route::post('add', 'TagsController@add')->middleware('logout_check');
		Route::get('delete/{id}', 'TagsController@delete')->middleware('logout_check');
	});

	Route::group(['prefix' => 'settings'], function() {
		Route::get('', 'SettingsController@index')->middleware('logout_check');
	});

	Route::group(['prefix' => 'community'], function() {
		Route::get('', 'CommunityController@index')->middleware('logout_check');
		Route::get('detail/{id}', 'CommunityController@detail')->middleware('logout_check');
		Route::post('filter', 'CommunityController@filter')->middleware('logout_check');
	});

	Route::get('logout', 'ProfileController@logout');
});

Route::get('setlocale/{locale}', function($locale) {
	App::setLocale($locale);
});