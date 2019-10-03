@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Lo sentimos el compañero que usted esta ingresando como segundo alumno no existe</h4>
 <a href="{{ url('/alumnohome') }}" class="btn btn-default">Volver a home</a> 
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
	
@endsection