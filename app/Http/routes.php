<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    // return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@showHome')->name('home');
    Route::get('contact', 'HomeController@showContact')->name('contact');
    Route::post('contact_request','HomeController@getContactForm')->name('contact');

    // Authentication routes...
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Route::get('user/login','UserController@showLogin')->name('login');
    // Route::post('user/login_request','UserController@getLoginForm')->name('login_request');

    // Registration routes...
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

    // Route::get('user/register','UserController@showRegister')->name('register');
    // Route::post('user/register_request','UserController@getRegisterForm')->name('register_request');

	// Route::get('user/logout','UserController@userLogout')->name('user_logout');    
});

Route::group(['namespace' => 'admin'], function () {
    Route::get('admin/login', 'AdminController@showLogin');
});