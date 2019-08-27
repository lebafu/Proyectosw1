@extends('layouts.app')



@section('content')

<div class="container">
	<div class="container">
 	 	<div class="row justify-content-center">
    		<div class="col-md-8">
      			<div class="card">
       				<div class="card-header">{{ __('Informacion detallada de Tesis') }}</div>
          				<div class="card-body">
 <table class="table table-bordered">
    <tr>
    <b>Nombre usuario</b>
	<p>{{$user->name}}</p>
	<b>Email usuario</b>
	<p>{{$user->email}}</p>
	<b>Tipo Usuario</b>
	@if($user->tipo_usuario==0)
	<p>Administrador</p>
	@endif
	@if($user->tipo_usuario==1)
	<p>Alumno</p>
	@endif
	@if($user->tipo_usuario==2)
	<p>Profesor</p>
	@endif
	@if($user->tipo_usuario==3)
	<p>Director de Tesis</p>
	@endif
	@if($user->tipo_usuario==4)
	<p>Secretaria</p>
	@endif
</tr>
</table>
@endsection