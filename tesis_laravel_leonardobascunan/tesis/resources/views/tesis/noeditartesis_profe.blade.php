@extends('layouts.app')



@section('content')

<div class="container">
 <h4>Lo sentimos!!!, el director de tesis ya ha evaluado o editado el registro.</h4>+

  <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a> 
	
@endsection