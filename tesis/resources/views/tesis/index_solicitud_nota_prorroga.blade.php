@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Solicitudes Nota de Prorroga')}}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Nota Prorroga</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id_pk}}</td>
          @if($tesis->nombre_completo2==null)
          <td>{{$tesis->nombre_completo}}</td>
          @endif
          @if($tesis->nombre_completo2!=null)
          <td>{{$tesis->nombre_completo}} y {{$tesis->nombre_completo2}}</td>
          @endif
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->nota_prorroga}}</td>
          <td>
          <div class="row">
          <td><a href="{{url('/aceptar_nota_prorroga/'.$tesis->id_pk)}}" class="btn btn-info"><span class="fas fa-check"></span></a></td>
        </div>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     @if($user->director_escuela==0)
     <a href="{{ url('/profesorhome') }}" class="btn btn-default">Volver Home</a>
     @endif
     @if($user->director_escuela==1)
     <a href="{{ url('/director_escuelahome') }}" class="btn btn-default">Volver Home</a>
     @endif
     <a href="{{url('/index_solicitud_nota_pendiente/')}}">Ir a listado notas de pendiente</a>
     </div>
</div>

  
{!! $tesistas->render() !!}
@endsection

