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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User profiles

Route::get('/user/{username}', [
	'as' => 'user.profile',
	'uses' => 'UserProfileController@index'
]);

Route::prefix('settings')->group(function(){

	Route::get('/', [
		'as' => 'settings',
		'uses' => 'UserSettingsController@index'
	])->middleware('auth');

	Route::post('/', [
		'as' => 'settings',
		'uses' => 'UserSettingsController@update'
	])->middleware('auth');

	Route::get('/security', [
		'as' => 'settings.security',
		'uses' => 'UserSettingsController@security'
	]);

	Route::post('/security', [
		'as' => 'settings.security',
		'uses' => 'UserSettingsController@update'
	]);
});