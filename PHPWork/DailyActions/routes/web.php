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

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'ActionsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 活動項目
Route::resource('action-items', 'ActionitemsController');

// 日次活動内容
Route::resource('actions', 'ActionsController');
