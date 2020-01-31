@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Lo sentimos, usted no puede crear una nueva tesis ya que ha reprobado 3 veces la tesis!!</h4>
 <a href="{{ url('/alumnohome') }}" class="btn btn-default">Volver a home</a> 
	
@endsection