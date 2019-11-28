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
    return redirect()->route('users.index');
});

Route::post('/login/social', 'Auth\LoginController@loginSocial')->name('loginsocial');
Route::get('/login/callback', 'Auth\LoginController@loginCallback');

Route::resource('users', 'UserController');
Route::resource('services', 'ServiceController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

