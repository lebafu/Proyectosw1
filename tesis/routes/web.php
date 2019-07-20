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
Route::get('/tesis_dir_sol', 'TesisController@index3_solicitudes')->name('tesis.index3_sol');
Route::get('/tesis_dir_ins', 'TesisController@index3_inscritas')->name('tesis.index3_ins');
Route::get('/tesis_alumno_solicitud', 'TesisController@index1')->name('tesis.index1');
Route::get('/tesis_profesor', 'TesisController@index2')->name('tesis.index2');
Route::get('/tesis_empresa', 'TesisController@tesis_empresa')->name('tesis.tesis_empresa');
Route::get('/tesis_proyecto', 'TesisController@tesis_proyecto')->name('tesis.tesis_proyecto');
Route::get('/tesis_fondoconcursable', 'TesisController@tesis_fondoconcursable')->name('tesis.tesis_fondoconcursable');
Route::get('/tesis_comunidad', 'TesisController@tesis_comunidad')->name('tesis.tesis_comunidad');
Route::get('/tesis_comunidad', 'TesisController@tesis_comunidad')->name('tesis.comunidad');
Route::get('/tesis_inscritas_profesor', 'TesisController@index2_ins_pro')->name('tesis.index2_ins_pro');
Route::get('/tesis{tesis}', 'TesisController@edit')->name('tesis.edit');
Route::get('/tesis_profesor/{tesis}', 'TesisController@edit2')->name('tesis.edit2');
Route::get('/tesis_director/{tesis}', 'TesisController@edit3')->name('tesis.edit3');
Route::get('/tesis/create', 'TesisController@create')->name('tesis.create');
Route::get('/tesismostrar/{id}', 'TesisController@show')->name('tesis.show');
//Route::get('/tesismostrar2/{id}', 'TesisController@show2')->name('tesis.show2');
Route::post('/tesis','TesisController@store')->name('tesis.store');
Route::put('/actualizartesis{tesis}','TesisController@update')->name('tesis.update');
Route::put('/actualizartesis_profesor/{tesis}','TesisController@update2')->name('tesis.update2');
Route::put('/actualizartesis_director/{tesis}','TesisController@update5')->name('tesis.update5');
Route::delete('/eliminartesis{tesis}','TesisController@destroy')->name('tesis.destroy');

Route::get('/noeditartesis', 'TesisController@noeditartesis')->name('tesis.noeditartesis');
Route::get('/noeditartesis_profe', 'TesisController@noeditartesis_profe')->name('tesis.noeditartesis_profe');
Route::get('/sinpermiso', 'TesisController@sinpermiso')->name('tesis.sinpermiso');
Route::get('/tesis_profesor_evaluar/{tesis}', 'TesisController@evaluar')->name('tesis.evaluar');
Route::put('/tesis_profesor_a_dt/{tesis}','TesisController@update3')->name('tesis.update3');
Route::put('/tesis_dt/{tesis}','TesisController@update4')->name('tesis.update4');
Route::get('/tesis_director_evaluar/{tesis}', 'TesisController@evaluar_director')->name('tesis.evaluar_director');


Route::get('/comision','ComisionController@index')->name('comision.index');
Route::get('/comision{comision}', 'ComisionController@edit')->name('comision.edit');
Route::get('/comision/create', 'ComisionController@create')->name('comision.create');
Route::get('/comisionmostrar{id}', 'ComisionController@show');
Route::post('/comision','ComisionController@store')->name('comision.store');
Route::put('/actualizarcomision{comision}','ComisionController@update')->name('comision.update');
Route::delete('/eliminarcomision{comision}','ComisionController@destroy')->name('comision.destroy');


Route::get('pdf',function(){
	$pdf= PDF::loadview('tesis_empresa');
	return $pdf->download('tesis_empresas.pdf');
});