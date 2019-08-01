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
Route::get('/adminhome', 'HomeController@index')->name('adminhome');
Route::get('/alumnohome', 'HomeController@index')->name('alumnohome');
Route::get('/profesorhome', 'HomeController@index')->name('profesorhome');
Route::get('/directorhome', 'HomeController@index')->name('directorhome');
Route::get('/secretariahome','HomeController@index')->name('secretariahome');


			 												

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users{users}', 'UsersController@edit')->name('users.edit');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::get('/usersmostrar/{id}', 'UsersController@show')->name('users.show');
Route::post('/users','UsersController@store')->name('users.store');
Route::put('/actualizarusers{users}','UsersController@update')->name('users.update');
Route::delete('/eliminarusers{users}','UsersController@destroy')->name('users.destroy');


Route::get('/tesisregistrada', 'TesisController@tesisregistrada')->name('tesis.tesisregistrada');
Route::get('/archivosubido', 'TesisController@archivosubido')->name('tesis.archivosubido');
Route::get('/tesis', 'TesisController@index')->name('tesis.index');
Route::get('/tesis_dir_sol', 'TesisController@index3_solicitudes')->name('tesis.index3_sol');
Route::get('/tesis_dir_ins', 'TesisController@index3_inscritas')->name('tesis.index3_ins');
Route::get('/tesis_alumno_solicitud', 'TesisController@index1')->name('tesis.index1');
Route::get('/tesis_profesor', 'TesisController@index2')->name('tesis.index2');
Route::get('/tesis_empresa', 'TesisController@tesis_empresa')->name('tesis.tesis_empresa');
Route::get('/tesis_proyecto', 'TesisController@tesis_proyecto')->name('tesis.tesis_proyecto');
Route::get('/tesis_fondoconcursable', 'TesisController@tesis_fondoconcursable')->name('tesis.tesis_fondoconcursable');
Route::get('/tesis_comunidad', 'TesisController@tesis_comunidad')->name('tesis.tesis_comunidad');
//Route::get('/tesis_comunidad', 'TesisController@tesis_comunidad')->name('tesis.comunidad');
Route::get('/tesis_inscritas_profesor', 'TesisController@index2_ins_pro')->name('tesis.index2_ins_pro');
Route::get('/tesis{tesis}', 'TesisController@edit')->name('tesis.edit');
Route::get('/repositorio_tesis','TesisController@repositorio_tesis')->name('tesis.repositorio_tesis');
Route::get('/mostrar_tesis/{id}', 'TesisController@mostrar_tesis')->name('tesis.show');

Route::get('/pedir_nota_pendiente/{tesis}', 'TesisController@pedir_nota_pendiente')->name('tesis.pedir_nota_pendiente');
Route::put('/nota_pendiente_ingresada/{tesis}','TesisController@save_nota_pendiente')->name('tesis.save_nota_pendiente');
Route::get('/pedir_nota_prorroga/{tesis}', 'TesisController@pedir_nota_prorroga')->name('tesis.pedir_nota_prorroga');
Route::put('/nota_prorroga_ingresada/{tesis}','TesisController@save_nota_prorroga')->name('tesis.save_nota_prorroga');


//Acta examen
Route::get('/index_al_sec','TesisController@index_al_sec')->name('tesis.index_al_sec');
Route::get('/acta_examen/{tesis}','TesisController@acta_examen')->name('tesis.acta_examen');
//RUTAS PARA FILTROS POR FECHA:
Route::get('/filtro_nota_pendiente_prorroga','TesisController@llamar_filtro_pendiente_prorroga_vencida')->name('tesis.filtro_nota_pendiente_prorroga');
Route::get('/filtro_nota_pendiente', 'TesisController@llamar_filtro_pendiente_vencida')->name('tesis.filtro_pendiente_vencida');

Route::get('/filtro_nota_prorroga', 'TesisController@llamar_filtro_prorroga_vencida')->name('tesis.filtro_prorroga_vencida');

Route::put('/filtro_pendiente', 'TesisController@filtro_nota_pendiente')->name('tesis.filtro_nota_pendiente');
Route::put('/filtro_prorroga', 'TesisController@filtro_nota_prorroga')->name('tesis.filtro_nota_prorroga');
Route::put('/filtro_pendiente_prorroga','TesisController@filtro_nota_pendiente_prorroga')->name('tesis.filtro_nota_pendiente_prorroga');


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

Route::get('/vista_subir_archivo/{tesis}','TesisController@vista_subir_archivo')->name('tesis.vista_subir_archivo');
Route::put('/actualizar_archivo/{tesis}','TesisController@update_archivo_ex')->name('tesis.update_archivo_ex');
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
Route::get('/comisionmostrar{id}','ComisionController@show');
Route::post('/comision','ComisionController@store')->name('comision.store');
Route::put('/actualizarcomision{comision}','ComisionController@update')->name('comision.update');
Route::delete('/eliminarcomision{comision}','ComisionController@destroy')->name('comision.destroy');

Route::get('/descargar_te', 'TesisController@printTesis')->name('descargar_te');
Route::get('/descargar_tp', 'TesisController@printTesisp')->name('descargar_tp');
Route::get('/descargar_tc', 'TesisController@printTesisc')->name('descargar_tc');
Route::get('/descargar_tfc', 'TesisController@printTesisfc')->name('descargar_tfc');
Route::get('/descargar_notapendiente', 'TesisController@imprimir_nota_pend_venc')->name('descargar_notapendiente');
Route::get('/descargar_notaprorroga', 'TesisController@imprimir_nota_pro_venc')->name('descargar_notaprorroga');
Route::get('/descargar_notapendpro', 'TesisController@imprimir_nota_pendpro_venc')->name('descargar_notapendpro');
Route::get('/descargar_tesis_ins', 'TesisController@imprimir_tesis_inscritas')->name('descargar_tesis_ins');
Route::get('/descargar_tesis_sol', 'TesisController@imprimir_sol')->name('descargar_tesis_sol');
Route::get('/descargar_pend_venc', 'TesisController@imprimir_pend_venc')->name('descargar_pend_venc');
Route::get('/descargar_pro_venc', 'TesisController@imprimir_pro_venc')->name('descargar_pro_venc');
Route::get('/descargar_pend_pro_venc', 'TesisController@imprimir_pend_pro_venc')->name('descargar_pend_pro_venc');

Route::get('/ingresar_nota_tesis/{tesis}', 'TesisController@ingresar_nota_tesis')->name('tesis.ingresar_nota_tesis');
Route::put('/update_nota_tesis/{tesis}','TesisController@update_nota_tesis')->name('tesis.update_nota_tesis');

Route::get('/fecha_presentacion/{tesis}', 'TesisController@fecha_presentacion')->name('tesis.fecha_presentacion');
Route::put('/update_fecha_presentacion/{tesis}','TesisController@update_fecha_presentacion')->name('tesis.update_fecha_presentacion');

Route::get('/vista_subir_acta/{tesis}','TesisController@vista_subir_acta')->name('tesis.vista_subir_acta');
Route::put('/update_acta_ex/{tesis}','TesisController@update_acta_ex')->name('tesis.update_acta_ex');

Route::get('/constancia_ex_ver/{tesis}', 'TesisController@verPDF')->name('verPDF');
Route::get('/acta_ex_ver/{tesis}', 'TesisController@verPDF_acta')->name('verPDF_acta');

Route::get('/rango_fechas', 'TesisController@rango_fechas')->name('tesis.rango_fechas');
Route::put('/informes_rangos_fechas/','TesisController@informes_rangos_fechas')->name('tesis.informes_rangos_fechas');
Route::get('/error_generar_pdf', 'TesisController@error_generar_pdf')->name('tesis.error_generar_pdf');

//NOTAS PENDIENTES Y DE PRORROGAS VENCIDAS
Route::get('/descargar_pendientes_vencidas','TesisController@imprimir_pend_venc')->name('descargar_pendientes_vencidas');
Route::get('/descargar_prorrogas_vencidas','TesisController@imprimir_pro_venc')->name('descargar_prorrogas_vencidas');
Route::get('/descargar_pend_pro_vencidas','TesisController@imprimir_pend_pro_venc')->name('descargar_pend_pro_vencidas');