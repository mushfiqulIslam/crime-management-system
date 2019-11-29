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
# Home
Route::get('/', 'PagesController@home');

#Admin Route
Route::get('/admin', 'AdminController@signup');
Route::post('/admin', 'AdminController@signup');
Route::get('/admin/{user}', 'AdminController@dashboard');
Route::get('/admin/{user}/add_police', 'AdminController@addpolice');
Route::post('/admin/{user}/add_police', 'AdminController@addpolice');
Route::get('/admin/{user}/add_thana', 'AdminController@addthana');
Route::post('/admin/{user}/add_thana', 'AdminController@addthana');
Route::get('/admin/{user}/add_supervisor', 'AdminController@addsuper');
Route::post('/admin/{user}/add_supervisor', 'AdminController@addsuper');

#Supervisor Route
Route::get('/login', 'PagesController@signup');
Route::post('/login', 'PagesController@signup');
Route::get('/login/{user}', 'PagesController@userhome');
