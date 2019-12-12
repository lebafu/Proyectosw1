@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Lo sentimos, este alumno no tiene ningun registro en su bitacora</h4>
 <a href="{{ url('/profesorhome') }}" class="btn btn-default">Volver a home</a> 
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
	
@endsection