@extends('layouts.app')



@section('content')

<div class="container">
 <h4>DETALLE DE INFORMACION</h4>
	<h3>{{$user->name}}</h3>
	<p>{{$user->email}}</p>
	@if($user->tipo_usuario==0)
	<p>Administrador</p>
	@endif
	@if($user->tipo_usuario==1)
	<p>Alumno</p>
	@endif
	@if($user->tipo_usuario==2)
	<p>Profesor</p>
	@endif
	@if($user->tipo_usuario==3)</div>
	<p>Director de Tesis</p>
	@endif
@endsection