@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Lo sentimos usted debe ingresar los 3 campos del segundo alumno tesista, estos son:
 nombre_completo, rut,año de ingreso. De lo contrario deje estos campos en blanco</h4>
 <a href="{{ url('/alumnohome') }}" class="btn btn-default">Volver a home</a> 
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
	
@endsection