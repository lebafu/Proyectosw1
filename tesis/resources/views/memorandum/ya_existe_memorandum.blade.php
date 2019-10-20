@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Lo sentimos, el nombre de memorandum que usted a ingresado ya existe</h4>
 <a href="{{ url('/directorhome') }}" class="btn btn-default">Volver a home</a> 
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
	
@endsection