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

Route::get('/', 'Admin\IndexController@index');
Route::get('/navAdd', 'Admin\IndexController@navAdd');
Route::any('/addDo', 'Admin\IndexController@addDo');  
