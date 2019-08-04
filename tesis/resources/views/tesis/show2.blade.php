@extends('layouts.app')



@section('content')

<div class="container">
 	 <div class="row justify-content-center">
    		<div class="col-md-8">
      			<div class="card">
       				<div class="card-header">{{ __('Informacion detallada de Tesis') }}</div>
          				<div class="card-body">

    <table class="table table-bordered">
        <tr>
 <h4>DETALLE DE INFORMACION</h4>
 	<b>Nombre alumno</b>
	<p>{{$tesis->nombre_completo}}</p>
	<b>Rut</b>
	<p>{{$tesis->rut}}</p>
	<b>Profesor Guía</b>
	<p>{{$tesis->profesor_guia}}</p>
	<b>Año Ingreso</b>
	<p>{{$tesis->ano_ingreso}}</p>
	<b>Carrera</b>
	<p>{{$tesis->carrera}}</p>
	<b>Tipo trabajo</b>
	<p>{{$tesis->tipo}}</p>
	<b>Tipo vinculación</b>
	<p>{{$tesis->tipo_vinculacion}}</p>
	<b>Nombre vinculación</b>
	<p>{{$tesis->nombre_vinculacion}}</p>
	<b>Título Tesis</b>
	<p>{{$tesis->nombre_tesis}}</p>
	<b>Área Tesis</b>
	<p>{{$tesis->area_tesis}}</p>
	<b>Descripción</b>
	<p>{{$tesis->descripcion}}</p>
	<b>Objetivos</b>
	<p>{{$tesis->objetivos}}</p>
	<b>Contribucion</b>
	<p>{{$tesis->contribucion}}</p>
	<b>Primer profesor Comisión</b>
	<p>{{$tesis->profesor1_comision}}</p>
	<b>Segundo Profesor Comisión</b>
	<p>{{$tesis->profesor2_comision}}</p>
	@if($tesis->profesor3_comision!=null)
	<b>Tercer Profesor Comisión</b>
	<p>{{$tesis->profesor3_comision}}</p>
	@endif
	@if($tesis->profesor1_externo)
	<b>Primer profesor Externo</b>
	<p>{{$tesis->profesor1_externo}}</p>
	<b>Correo Electrónico Primer Profesor Externo</b>
	<p>{{$tesis->correo_profe1_externo}}</p>
	<b>Institución de Primer Profesor Externo</b>
	<p>{{$tesis->institucion1}}</p>
	@endif
	@if($tesis->profe2_externo!=null)
	<b>Segundo Profesor Externo</b>
	<p>{{$tesis->profe2_externo}}</p>
	<b>Correo Electrónico Segundo Profesor Externo</b>
	<p>{{$tesis->correo_profe2_externo}}</p>
	<b>Institución Segundo Profesor Externo</b>
	<p>{{$tesis->institucion2}}</p>
	@endif
	<a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
@endsection