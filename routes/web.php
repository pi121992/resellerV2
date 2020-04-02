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



Route::get('ruleta', 'ruletaController@index');
Route::get('ruleta/juega', 'ruletaController@juega');
Route::get('ruleta/ayuda', 'ruletaController@ayuda');
Route::get('ruleta/reclama', 'ruletaController@reclama');
Route::get('luz/{estado}', function($estado) {
    $file=fopen("luz.txt", "w");
    fwrite($file, $estado);

    echo file_get_contents("luz.txt");

});
Route::post('ruleta/reclama', 'ruletaController@store');


Route::post('ruleta','ruletaController@ajaxRequestPost');
Auth::routes();


Route::resource('MyUsers','myUsersController')->middleware('auth');
Route::resource('edit','editController')->middleware('auth');
Route::resource('demo', 'demoController');
Route::get('checked','checked@index');


Route::resource('RegisterNew', 'plexAddController')->middleware('auth');