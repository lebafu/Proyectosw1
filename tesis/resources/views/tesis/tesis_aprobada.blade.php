@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Usted a aprobado su tesis, no necesita hacer este procedimiento</h4>
 <a href="{{ url('/alumnohome') }}" class="btn btn-default">Volver a home</a> 
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
	
@endsection