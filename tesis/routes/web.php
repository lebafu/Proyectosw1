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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users{users}', 'UsersController@edit')->name('users.edit');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::get('/usersmostrar/{id}', 'UsersController@show')->name('users.show');
Route::post('/users','UsersController@store')->name('users.store');
Route::put('/actualizarusers{users}','UsersController@update')->name('users.update');
Route::delete('/eliminarusers{users}','UsersController@destroy')->name('users.destroy');


Route::get('/tesis', 'TesisController@index')->name('tesis.index');
Route::get('/tesis_profesor', 'TesisController@index2')->name('tesis.index2');
Route::get('/tesis{tesis}', 'TesisController@edit')->name('tesis.edit');
Route::get('/tesis_profesor/{tesis}', 'TesisController@edit2')->name('tesis.edit2');
Route::get('/tesis/create', 'TesisController@create')->name('tesis.create');
Route::get('/tesismostrar/{id}', 'TesisController@show')->name('tesis.show');
Route::post('/tesis','TesisController@store')->name('tesis.store');
Route::put('/actualizartesis{tesis}','TesisController@update')->name('tesis.update');
Route::put('/actualizartesis_profesor{tesis}','TesisController@update2')->name('tesis.update2');
Route::delete('/eliminartesis{tesis}','TesisController@destroy')->name('tesis.destroy');



Route::get('/comision', 'ComisionController@index')->name('comision.index');
Route::get('/comision{comision}', 'ComisionController@edit')->name('comision.edit');
Route::get('/comision/create', 'ComisionController@create')->name('comision.create');
Route::get('/comisionmostrar{id}', 'ComisionController@show');
Route::post('/comision','ComisionController@store')->name('comision.store');
Route::put('/actualizarcomision{comision}','ComisionController@update')->name('comision.update');
Route::delete('/eliminarcomision{comision}','ComisionController@destroy')->name('comision.destroy');
