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

    Route::get('user/login','UserController@showLogin')->name('login');
    Route::post('user/login_request','UserController@getLoginForm')->name('login_request');
    
    Route::get('user/register','UserController@showRegister')->name('register');
    Route::post('user/register_request','UserController@getRegisterForm')->name('register_request');


});

Route::group(['namespace' => 'admin'], function () {
    Route::get('admin/login', 'AdminController@showLogin');
});