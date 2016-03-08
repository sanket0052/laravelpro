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
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('contact', 'HomeController@showContact')->name('contact');
    Route::post('contact','HomeController@storeContact')->name('contact');

    // Authentication routes...
    Route::get('auth/userlogin', 'Auth\AuthController@getLogin');
    Route::post('auth/userlogin', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    Route::get('admin/adminlogin', 'Admin\AdminController@login');
    Route::post('auth/adminlogin', 'Auth\AuthController@postLogin');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin', 'auth']], function () {

    Route::group(array('namespace' => 'Admin'), function() {
        Route::get('dashboard', 'AdminController@index');

        // Category routes...
        Route::resource('category', 'CategoryController');

        // Brand routes...
        Route::resource('brand', 'BrandController');

        // Product routes...
        Route::resource('product', 'ProductController');
        
        Route::post('product/brandlist', 'ProductController@getBrandList');
    });
});