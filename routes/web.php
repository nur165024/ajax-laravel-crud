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

Route::get('post','PostController@index');
Route::post('post/create','PostController@store');
Route::get('post/edit/{id}','PostController@edit');
Route::put('post/update/{id}','PostController@update');
Route::delete('post/delete/{id}','PostController@delete');
