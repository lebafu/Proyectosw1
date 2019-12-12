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

Route::get('/dashboard',function()
	{
		return view('dashboard');

	});

Route::get('/login1',function()
	{
		return view('login');

	});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminhome', 'HomeController@index')->name('adminhome');
Route::get('/alumnohome', 'HomeController@index')->name('alumnohome');
Route::get('/profesorhome', 'HomeController@index')->name('profesorhome');
Route::get('/directorhome', 'HomeController@index')->name('directorhome');
Route::get('/secretariahome','HomeController@index')->name('secretariahome');

//Profesor editar su propio perfil
Route::get('/grado_academico_create', 'HomeController@index')->name('grado_academico_create');
Route::put('/grado_academico_create{profesor}','UsersController@save_profe_grado_academico')->name('users.save_profe_grado_academico');

//Vista para añadir campo de grado academico profesor//
Route::get('/create_grado_academico_profesor{profesor}','UsersController@create_grado_academico_profesor')->name('users.create_grado_academico_profesor');
Route::put('/create_grado_academico','UsersController@store_grado_academico')->name('users.store_grado_academico');

//Vista para crear o asignar director de escuela//
Route::get('/definir_director_escuela', 'UsersController@definir_director_escuela')->name('users.definir_director_escuela');
Route::post('/guardar_director_escuela','UsersController@guardar_director_escuela')->name('users.guardar_director_escuela');


//Routas para resetear contraseña//
Route::get('password/reset', 'UsersController@showLinkRequestForm')->name('password.request');
//Route::get('password/reset', 'UsersController@reestablecer_pass')->name('password.reestablecer');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/index_solicitud_nota_pendiente', 'TesisController@index_solicitud_nota_pendiente')->name('tesis.index_solicitud_nota_pendiente');
Route::get('/aceptar_nota_pendiente/{tesis}', 'TesisController@aceptar_nota_pendiente')->name('tesis.aceptar_nota_pendiente');
Route::put('/actualizarpendiente/{tesis}','TesisController@pendiente_update')->name('tesis.pendiente_update');	
Route::get('/index_solicitud_nota_extendida', 'TesisController@plazo_nota_extendida')->name('tesis.index_solicitud_nota_extendida');	

Route::get('/index_solicitud_nota_prorroga', 'TesisController@index_solicitud_nota_prorroga')->name('tesis.index_solicitud_nota_prorroga');
Route::get('/aceptar_nota_prorroga/{tesis}', 'TesisController@aceptar_nota_prorroga')->name('tesis.aceptar_nota_prorroga');
Route::put('/actualizarprorroga/{tesis}','TesisController@prorroga_update')->name('tesis.prorroga_update');												

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users{users}', 'UsersController@edit')->name('users.edit');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::get('/usersmostrar/{id}', 'UsersController@show')->name('users.show');
Route::post('/users','UsersController@store')->name('users.store');
Route::put('/actualizarusers{users}','UsersController@update')->name('users.update');
Route::delete('/eliminarusers{users}','UsersController@destroy')->name('users.destroy');


//Rutas de editar profesor//

Route::get('/editar_profesor', 'UsersController@editar_informacion_profesor')->name('users.editar_informacion_profesor');
Route::put('/actualizarinfoprofesor{users}','UsersController@update_profesor')->name('users.update_profesor');

//Vistas de tipos de vinculacion:
Route::get('/empresas', 'EmpresasController@index')->name('empresas.index');
Route::get('/empresas{empresas}', 'EmpresasController@edit')->name('empresas.edit');
Route::get('/empresas/create', 'EmpresasController@create')->name('empresass.create');
Route::get('/empresasmostrar/{id}', 'EmpresasController@show')->name('empresas.show');
Route::post('/empresas','EmpresasController@store')->name('empresas.store');
Route::put('/actualizarempresas{empresas}','EmpresasController@update')->name('empresas.update');
Route::delete('/eliminarempresas{empresas}','EmpresasController@destroy')->name('empresas.destroy');

Route::get('/comunidad', 'ComunidadController@index')->name('comunidad.index');
Route::get('/comunidad{comunidad}', 'ComunidadController@edit')->name('comunidad.edit');
Route::get('/comunidad/create', 'ComunidadController@create')->name('comunidad.create');
Route::get('/comunidadmostrar/{id}', 'comunidadController@show')->name('comunidad.show');
Route::post('/comunidad','ComunidadController@store')->name('comunidad.store');
Route::put('/actualizarcomunidad{comunidad}','ComunidadController@update')->name('comunidad.update');
Route::delete('/eliminarcomunidad{comunidad}','ComunidadController@destroy')->name('comunidad.destroy');

Route::get('/proyectos', 'ProyectosController@index')->name('proyectos.index');
Route::get('/proyectos{proyectos}', 'ProyectosController@edit')->name('proyectos.edit');
Route::get('/proyectos/create', 'ProyectosController@create')->name('proyectos.create');
Route::get('/proyectosmostrar/{id}', 'ProyectosController@show')->name('proyectos.show');
Route::post('/proyectos','ProyectosController@store')->name('proyectos.store');
Route::put('/actualizarproyectos{proyectos}','ProyectosController@update')->name('proyectos.update');
Route::delete('/eliminarproyectos{proyectos}','ProyectosController@destroy')->name('proyectos.destroy');

Route::get('/fondoconcursable', 'FondoConcursableController@index')->name('fondoconcursable.index');
Route::get('/fondoconcursable{fondoconcursable}', 'FondoConcursableController@edit')->name('fondoconcursable.edit');
Route::get('/fondoconcursable/create', 'FondoConcursableController@create')->name('fondoconcursable.create');
Route::get('/fondoconcursablemostrar/{id}', 'FondoConcursableController@show')->name('fondoconcursable.show');
Route::post('/fondoconcursable','FondoConcursableController@store')->name('fondoconcursable.store');
Route::put('/actualizarfondoconcursable{fondoconcursable}','FondoConcursableController@update')->name('fondoconcursable.update');
Route::delete('/eliminarfondoconcursable{fondoconcursable}','FondoConcursableController@destroy')->name('fondoconcursable.destroy');

//Vistas de memorandums										  
Route::get('/memorandum', 'MemorandumController@index')->name('memorandum.index');
Route::get('/memorandum{memoradum}', 'MemorandumController@edit')->name('memorandum.edit');
Route::get('/memorandum/create', 'MemorandumController@create')->name('memorandum.create');
Route::post('/memorandums','MemorandumController@store')->name('memorandum.store');
Route::put('/actualizarmemorandum{memorandum}','MemorandumController@update')->name('memorandum.update');
Route::get('/memorandum_ya_existe', 'MemorandumController@ya_existe_memorandum')->name('memorandum.ya_existe_memorandum');


Route::get('/area_tesis', 'Area_tesisController@index')->name('area_tesis.index');
Route::get('/area_tesis{area_tesis}', 'Area_tesisController@edit')->name('area_tesis.edit');
Route::get('/area_tesis/create', 'Area_tesisController@create')->name('area_tesis.create');
Route::post('/area_tesis','Area_tesisController@store')->name('area_tesis.store');
Route::put('/actualizararea_tesis{area_tesis}','Area_tesisController@update')->name('area_tesis.update');
Route::delete('/eliminararea_tesis{area_tesis}','Area_tesisController@destroy')->name('area_tesis.destroy');

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
Route::get('/tesis_profesor_comision', 'TesisController@profe_comision')->name('tesis.tesis_profesor_comision');
Route::get('/tesis{id}', 'TesisController@edit')->name('tesis.edit');
Route::get('/repositorio_tesis','TesisController@repositorio_tesis')->name('repositorio_tesis');
Route::get('/mostrar_tesis/{id_pk}', 'TesisController@mostrar_tesis')->name('tesis.show');

Route::get('/pedir_nota_pendiente/{tesis}', 'TesisController@pedir_nota_pendiente')->name('tesis.pedir_nota_pendiente');
Route::put('/nota_pendiente_ingresada/{tesis}','TesisController@save_nota_pendiente')->name('tesis.save_nota_pendiente');
Route::get('/pedir_nota_prorroga/{tesis}', 'TesisController@pedir_nota_prorroga')->name('tesis.pedir_nota_prorroga');
Route::put('/nota_prorroga_ingresada/{tesis}','TesisController@save_nota_prorroga')->name('tesis.save_nota_prorroga');


//Acta examen
Route::get('/index_al_sec','TesisController@index_al_sec')->name('tesis.index_al_sec');
Route::get('/acta_examen/{tesis}','TesisController@acta_examen')->name('tesis.acta_examen');
Route::get('/index_titulados_sec','TesisController@index_titulados_sec')->name('tesis.index_titulados_sec');
Route::get('/recopilacion_inf/{tesis}','TesisController@recopilacion_inf')->name('tesis.recopilacion_inf');
Route::get('/recopilacion_inf2/{tesis}','TesisController@recopilacion_inf2')->name('tesis.recopilacion_inf2');
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
Route::get('/descargar_todas_tesis_ins','TesisController@imprimir_todas_tesis_ins')->name('descargar_todas_tesis_ins');
Route::get('/descargar_todas_tesis_sol','TesisController@imprimir_todas_tesis_sol')->name('descargar_todas_tesis_sol');

Route::get('/ingresar_nota_tesis/{tesis}', 'TesisController@ingresar_nota_tesis')->name('tesis.ingresar_nota_tesis');
Route::put('/update_nota_tesis/{tesis}','TesisController@update_nota_tesis')->name('tesis.update_nota_tesis');

Route::get('/fecha_presentacion/{tesis}', 'TesisController@fecha_presentacion')->name('tesis.fecha_presentacion');
Route::put('/update_fecha_presentacion/{tesis}','TesisController@update_fecha_presentacion')->name('tesis.update_fecha_presentacion');

//Subir acta examen
Route::get('/vista_subir_acta/{tesis}','TesisController@vista_subir_acta')->name('tesis.vista_subir_acta');
Route::put('/update_acta_ex/{tesis}','TesisController@update_acta_ex')->name('tesis.update_acta_ex');
//

Route::get('/constancia_ex_ver/{tesis}', 'TesisController@verPDF')->name('verPDF');
Route::get('/acta_ex_ver/{tesis}', 'TesisController@verPDF_acta')->name('verPDF_acta');

Route::get('/rango_fechas', 'TesisController@rango_fechas')->name('tesis.rango_fechas');
Route::put('/informes_rangos_fechas/','TesisController@informes_rangos_fechas')->name('tesis.informes_rangos_fechas');
Route::get('/error_generar_pdf', 'TesisController@error_generar_pdf')->name('tesis.error_generar_pdf');
Route::get('/error_rut', 'TesisController@error_rut')->name('tesis.error_generar_pdf');
Route::get('/tesis_aprobada', 'TesisController@tesis_aprobada')->name('tesis.tesis_aprobada');
Route::get('/error_profesor_comision', 'TesisController@update2')->name('tesis.profesor_repetido_comision');
//NOTAS PENDIENTES Y DE PRORROGAS VENCIDAS
Route::get('/descargar_pendientes_vencidas','TesisController@imprimir_pend_venc')->name('descargar_pendientes_vencidas');
Route::get('/descargar_prorrogas_vencidas','TesisController@imprimir_pro_venc')->name('descargar_prorrogas_vencidas');
Route::get('/descargar_pend_pro_vencidas','TesisController@imprimir_pend_pro_venc')->name('descargar_pend_pro_vencidas');
Route::get('/tesis_filtro_fecha_profesor', 'TesisController@filtro_tesis_fecha')->name('tesis_filtro_fecha_profesor');

//Route::get('/createword',['as'=> 'createword' , 'uses' => 'WordTestController@createworddocx']);
//Route::post('msword', 'TesisController@msword');
//Rutas para crear word con tesis en las que participa el profesor.
Route::get('create','DocumentController@create');
Route::post('store','DocumentController@store');

//Rutas recopilacion_informacion
Route::get('/recopilacion_informacion','Recopilacion_infController@create')->name('recopilacion.recopilacion_informacion_titulados');
Route::post('store_recopilacion_informacion','Recopilacion_infController@store')->name('recopilacion.recopilacion_store');



Route::get('htmlpdf58','PDFController@htmlPDF58')->name('htmlpdf58');
Route::get('generatePDF58','PDFController@generatePDF58')->name('generatePDF58');

//ruta de memorandum de revision tesis;
Route::get('/tesis/create_num_memo{tesis}', 'TesisController@create_num_memo')->name('tesis.create_num_memo');
Route::put('/tesis/lista_profe_comision_revision{tesis}', 'TesisController@lista_profe_comision_revision')->name('tesis.lista_profes_comision_revision');
Route::get('/memo_revision1', 'TesisController@memo_revision1')->name('descargar_memorandum_revision1');
Route::get('/memo_revision2', 'TesisController@memo_revision2')->name('descargar_memorandum_revision2');
Route::get('/memo_revision3', 'TesisController@memo_revision3')->name('descargar_memorandum_revision3');
Route::get('/memo_revision4', 'TesisController@memo_revision4')->name('descargar_memorandum_revision4');
Route::get('/memo_revision5', 'TesisController@memo_revision5')->name('descargar_memorandum_revision5');




Route::get('/tesis/createnummemotitulados{tesis}', 'TesisController@create_num_memo_titulados')->name('tesis.createnummemotitulados');
Route::put('/memo_titulados/', 'TesisController@memorandum_titulados')->name('memorandum.memorandum_titulados'); 
Route::get('/generar_formulario_inscripcion_tesis/{tesis}','DocumentController@create_formulario_inscripcion');


Route::get('/tesis/create_fecha_descargar_actas','TesisController@create_fecha_descargar_actas')->name('tesis.create_fecha_descargar_actas');
Route::post('tesis/descargar_actas_profesor','TesisController@descargar_actas')->name('tesis.descargar_actas');


//Nota pendiente y de prorroga aceptada por director de escuela.

Route::get('/index_solicitud_nota_pendiente_director', 'TesisController@index_solicitud_nota_pendiente_director')->name('tesis.index_solicitud_nota_pendiente_director');
Route::get('/index_solicitud_nota_prorroga_director', 'TesisController@index_solicitud_nota_prorroga_director')->name('tesis.index_solicitud_nota_prorroga_director');
Route::put('/actualizarpendiente{tesis}','TesisController@pendiente_director_update')->name('tesis.pendiente_director_update');	
Route::get('/aceptar_nota_pendiente_director/{tesis}', 'TesisController@aceptar_nota_pendiente_director')->name('tesis.aceptar_nota_pendiente_director');
Route::get('/aceptar_nota_prorroga_director/{tesis}', 'TesisController@aceptar_nota_prorroga_director')->name('tesis.aceptar_nota_prorroga_director');
Route::put('/actualizarprorroga{tesis}','TesisController@prorroga_director_update')->name('tesis.prorroga_director_update');	
//Route::get('/memorandum_revision/{tesis}', 'TesisController@memo_revision')->('tesis.memo_revision');

//Editar recopilacion de informacion
Route::get('/recopilacion{id}', 'Recopilacion_infController@edit')->name('recopilacion.recopilacion_edit');
Route::put('/actualizarrecopilacion_inf{recopilacion}','Recopilacion_infController@update')->name('recopilacion.update');

//Rutas de bitacora de Tesis//
Route::get('/index_tesis_bitacora', 'BitacoraController@index')->name('bitacora.index_tesis_bitacora');
Route::get('/mostrar_bitacora_tesis/{id}', 'BitacoraController@lista_acuerdos_tesis')->name('bitacora.lista_acuerdos_tesis');
Route::get('/bitacora_tesis/create{id}', 'BitacoraController@create')->name('bitacora.create');
Route::post('/bitacora_tesis_store','BitacoraController@store')->name('bitacora.store');
Route::get('/bitacora_edit{bitacora}', 'BitacoraController@edit')->name('bitacora.edit');
Route::put('/actualizarbitacora{bitacora}','BitacoraController@update')->name('bitacora.update');
Route::get('/no_existen_registros_bitacora', 'TesisController@lista_acuerdos_tesis')->name('bitacora.no_existen_registros_bitacora');
Route::delete('/eliminarcomentariobitacora{bitacora}','BitacoraController@destroy')->name('bitacora.destroy');