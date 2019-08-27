@extends('layouts.app')



@section('content')

<div class="container">
 <h4>Lo sentimos!!!, usted no tiene permisos para acceder en este momento</h4>
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a> 
	
@endsection