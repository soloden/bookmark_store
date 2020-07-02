<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'BookmarkController@index');
Route::get('/add', 'BookmarkController@create');
Route::post('/add', 'BookmarkController@store');
Route::get('/{id}', 'BookmarkController@show')->where('id', '[0-9]+');
Route::get('/delete/{id}', 'BookmarkController@destroy')->where('id', '[0-9]+');
