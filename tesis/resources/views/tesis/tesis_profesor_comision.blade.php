@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Tesis a las que usted pertenece como miembro de comisión')}}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id}}</td>
          @if($tesis->nombre_completo2==null)
          <td>{{$tesis->nombre_completo}}</td>
          @endif
          @if($tesis->nombre_completo2!=null)
          <td>{{$tesis->nombre_completo}} y {{$tesis->nombre_completo2}}</td>
          @endif
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}</td>
          <td>
          <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id)}}" class="btn btn-info" style="width:25px;height:25px"><span class="far fa-eye fa-sm" style="float:left;margin-left:-8px"></span></a>
         
          </button>
        </div>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
     </div>
</div>

  
{!! $tesistas->render() !!}
@endsection