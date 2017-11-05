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


/** Socialite controllers */

Route::group(['prefix' => 'login'], function() {

    /** Facebook */
    Route::get('facebook', 'Auth\FacebookController@redirectToProvider')->name('login.facebook');
    Route::get('facebook/callback', 'Auth\FacebookController@handleProviderCallback');

    /** Twitter */
    Route::get('twitter', 'Auth\TwitterController@redirectToProvider')->name('login.twitter');
    Route::get('twitter/callback', 'Auth\TwitterController@handleProviderCallback');

    /** Google+ */
    Route::get('google', 'Auth\GPlusController@redirectToProvider')->name('login.google');
    Route::get('google/callback', 'Auth\GPlusController@handleProviderCallback');
});



Auth::routes();

Route::group(['prefix' => 'user'], function() {

    Route::get('/profile', 'Auth\UserController@profileEdit')->name('user.profile');
    Route::post('/profile', 'Auth\UserController@profileUpdate');


    Route::group(['prefix' => 'location'], function() {
        Route::get('/', 'Auth\UserLocationController@index')->name('user.location');

        Route::get('/add_new', 'Auth\UserLocationController@create')->name('user.location.add_new');
        Route::post('/add_new', 'Auth\UserLocationController@store')->name('user.location.add_new');

        Route::get('/edit/{id}', 'Auth\UserLocationController@show')->name('user.location.edit');
        Route::post('/edit/{id}', 'Auth\UserLocationController@update');
    });


});

Route::get('/home', 'HomeController@index')->name('home');
