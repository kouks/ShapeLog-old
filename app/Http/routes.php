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

Route::group(['prefix' => 'setup'], function() {
	Route::get('', "SetupController@index")->middleware('setup');
	Route::post('save', "SetupController@save")->middleware('logout');
	Route::post('check-name', "SetupController@checkName")->middleware('logout');
});

Route::group(['prefix' => 'profile'], function() {
	
	Route::get('', 'ProfileController@index')->middleware('logout');
	Route::post('add', 'ProfileController@add')->middleware('logout');
	Route::post('edit', 'ProfileController@edit')->middleware('logout');
	Route::get('delete/{id}', 'ProfileController@delete')->middleware('logout');

	Route::get('graphs', 'GraphsController@index')->middleware('logout');

	Route::group(['prefix' => 'tags'], function() {
		Route::get('', 'TagsController@index')->middleware('logout');
		Route::post('add', 'TagsController@add')->middleware('logout');
		Route::get('delete/{id}', 'TagsController@delete')->middleware('logout');
	});

	Route::group(['prefix' => 'settings'], function() {
		Route::get('', 'SettingsController@index')->middleware('logout');
		Route::post('save', 'SettingsController@save')->middleware('logout');
	});

	Route::group(['prefix' => 'community'], function() {
		Route::get('', 'CommunityController@index')->middleware('logout');
		Route::get('detail/{id}/{username?}', 'CommunityController@detail')->middleware('logout');
		Route::post('follow', 'CommunityController@follow')->middleware('logout');
		Route::post('unfollow', 'CommunityController@unfollow')->middleware('logout');
		Route::post('filter', 'CommunityController@filter')->middleware('logout');
	});

	Route::get('logout', 'ProfileController@logout');
});

Route::get('setlocale/{locale}', function($locale) {
	App::setLocale($locale);
});