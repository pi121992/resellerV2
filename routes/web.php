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
    return view('home');
});

Auth::routes();


Route::resource('MyUsers','myUsersController')->middleware('auth');
Route::resource('edit','editController')->middleware('auth');
Route::resource('demo', 'demoController');

Route::resource('RegisterNew', 'plexAddController')->middleware('auth');