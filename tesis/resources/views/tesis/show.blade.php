@extends('layouts.app')



@section('content')

<div class="container">
 <h4>DETALLE DE INFORMACION</h4>
	<h3>{{$tesis->nombre_completo}}</h3>
	<p>{{$tesis->rut}}</p>
	<p>{{$tesis->profesor_guia}}</p>
	<p>{{$tesis->ano_ingreso}}</p>
	<p>{{$tesis->carrera}}</p>
	<p>{{$tesis->tipo}}</p>
	<p>{{$tesis->nombre_vinculacion}}</p>
	<p>{{$tesis->tipo_vinculacion}}</p>
	<p>{{$tesis->nombre_tesis}}</p>
	<p>{{$tesis->area_tesis}}</p>
	<p>{{$tesis->descripcion}}</p>
	<p>{{$tesis->objetivos}}</p>
	<p>{{$tesis->contribucion}}</p>
@endsection