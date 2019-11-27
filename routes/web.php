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

Route::get('/', 'PagesController@home');
Route::get('/login', 'PagesController@signup');
Route::post('/login', 'PagesController@signup');
Route::get('/login/{user}', 'PagesController@userhome');
Route::get('/admin', 'AdminController@signup');
Route::post('/admin', 'AdminController@signup');
Route::get('/admin/{user}', 'AdminController@dashboard');
Route::get('/admin/{user}/thana_list', 'AdminController@thanalist');
