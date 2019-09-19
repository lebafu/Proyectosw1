@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Lo sentimos, el rut ya pertenece a un usuario con tesis asignada, por favor reingrese su rut</h4>
 <a href="{{ url('/alumnohome') }}" class="btn btn-default">Volver a home</a> 
	
@endsection