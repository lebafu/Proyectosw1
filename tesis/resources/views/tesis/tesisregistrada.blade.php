@extends('layouts.app')


@section('content')

<div class="container">
 <h4>Lo sentimos, usted o su compañero de tesis ya han registrado tesis!!!, no puedes crear otra.
 <a href="{{ url('/alumnohome') }}" class="btn btn-default">Volver a home</a> 
 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
	
@endsection