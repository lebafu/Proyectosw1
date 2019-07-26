@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Lo sentimos, usted ya ha registrado tesis!!!, no puedes crear otra, pero puedes modificarla!! en ver tesis!!!</h4>
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a> 
	
@endsection