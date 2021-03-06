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
Route::resource('articles','ArticleController');
Route::resource('customer','DetailsController');
// Route::get('register','RegisterController@validator');
// Route::post('register','RegisterController@create');

// Auth::routes();
// Route::get('register','RegisterController@create')->name('register');
// Route::post('register','RegisterController@store')->name('register');

// Route::get('login', 'SessionController@create');
// Route::post('login', 'SessionController@dologin');
// Route::get('logout', 'SessionController@destroy')->name('register');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
