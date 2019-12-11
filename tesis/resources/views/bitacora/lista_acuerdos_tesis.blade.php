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
          <th>Nombre Tesis</th>
          <th>Fecha</th>
          <th>Comentario</th>
         <th>Acuerdo</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id_tesis}}</td>
          @if($tesis->nombre_completo2==null)
          <td>{{$tesis->nombre_completo}} </td>
          @endif
          @if($tesis->nombre_completo2!=null)
          <td>{{$tesis->nombre_completo}} y {{$tesis->nombre_completo2}}</td>
          @endif
          <td>{{$tesis->nombre_tesis}}</td>
          <td>{{$tesis->created_at}}</td>
          <td>{{$tesis->comentario}}</td>
          <td>{{$tesis->acuerdo}}</td>
        </tr>
        @endforeach
</div>

   
{!! $tesistas->render() !!}
@endsection