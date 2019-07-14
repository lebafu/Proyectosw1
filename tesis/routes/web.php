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
Route::post('/users','UsersController@store')->name('users.store');
Route::put('/actualizarusers{users}','UsersController@update')->name('users.update');
Route::delete('/eliminarusers{users}','UsersController@destroy')->name('users.destroy');
