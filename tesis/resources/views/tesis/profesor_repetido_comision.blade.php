@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Usted a repetido el nombre de algun o algunos de los profesores seleccionados en la comisión, por favor seleccione nuevamente otro profesor, que no haya sido seleccionado antes</h4>
 <a href="{{ url('/alumnohome') }}" class="btn btn-default">Volver a home</a> 
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
	
@endsection