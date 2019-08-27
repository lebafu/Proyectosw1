@extends('layouts.app')



@section('content')

<div class="container">
 <h4>DETALLE DE INFORMACION</h4>
	<h3>{{$com->profesor_guia}}</h3>
	<p>{{$com->nombre_alumno}}</p>
	<p>{{$com->profesor1_comision}}</p>
	<p>{{$com->profesor2_comision}}</p>
	<p>{{$com->profesor3_comision}}</p>
	<p>{{$com->profesor1_externo}}</p>
	<p>{{$com->correo_profe1_externo}}</p>
	<p>{{$com->institucion1}}</p>
	<p>{{$com->profesor2_externo}}</p>
	<p>{{$com->correo_profe2_externo}}</p>
	<p>{{$com->institucion2}}</p>
@endsection