@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12"> <!--Con 12 se ocupa todo el ancho de la pantalla-->
      <div class="card">
        <div class="card-header">{{ __('Lista de Tesis con bitacora') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Nombre Tesis</th>
        </tr>
        @foreach($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id_pk}}</td>
          @if($tesis->nombre_completo2==null)
          <td>{{$tesis->nombre_completo}} </td>
          @endif
          @if($tesis->nombre_completo2!=null)
          <td>{{$tesis->nombre_completo}} y {{$tesis->nombre_completo2}}</td>
          @endif
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->nombre_tesis}}</td>
          <td><a href="{{url('/mostrar_bitacora_tesis/'.$tesis->id_pk)}}"  class="btn btn-info"><span class="far fa-eye"></span></td>
        @endforeach
</div>

   
{!! $tesistas->render() !!}
@endsection