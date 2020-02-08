@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Lo sentimos, usted no esta ingresando el nombre del director e tesis o de la secretaria en el formato permitido, intentelo nuevamente.Recuerde que el formato debe ser del tipo: Nombre1 Nombre2 Apellido1 Apellido2</h4>
 <a href="{{ url('/adminhome') }}" class="btn btn-default">Volver a home</a> 
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
	
@endsection