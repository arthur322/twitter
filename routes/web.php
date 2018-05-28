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

Route::post('/home/{content}/tweet', 'TweetController@store')->name('tweet.store')->middleware('auth');

Route::delete('/home/{tweet}/delete', 'TweetController@destroy')->name('tweet.delete')->middleware('auth');

Route::get('/discover', 'DiscoverController@show')->name('discover.show')->middleware('auth');

Route::post('/f/{user}', 'UserController@follow')->name('user.follow')->middleware('auth');

Route::post('/u/{user}', 'UserController@unfollow')->name('user.unfollow')->middleware('auth');

Route::get('/{user}/followers', 'UserController@followers')->name('user.followers');

Route::get('/{user}/followeds', 'UserController@followeds')->name('user.followeds');

Route::get('/{user}/edit', 'UserController@edit')->name('user.edit')->middleware('auth');

Route::put('/{user}/edit', 'UserController@update')->name('user.update')->middleware('auth');

Route::get('/{user}', 'UserController@show')->name('user.show');
