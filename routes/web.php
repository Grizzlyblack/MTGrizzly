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

Route::get('/home', 'PageController@index');
Route::get('/', 'PageController@index')->name('home');
Route::get('/cards/add', 'CardController@create')->middleware('admin');
Route::get('/cards', 'CardController@index');
Route::get('/cards/{id}', 'CardController@show');
Route::get('/search', 'PageController@search');
Route::get('/search/results', 'CardController@filter');

Route::post('/cards/store', 'CardController@store')->middleware('admin');

Auth::routes();



