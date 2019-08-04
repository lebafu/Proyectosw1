@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Solicitudes de tesis por aprobar o rechazar') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
         
          <th>Rut</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Area Tesis</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->rut}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->area_tesis}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}}</td>
          <td>
          <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id)}}" class="btn btn-info"><span class="far fa-eye"></span></a>

            <a href="{{URL::action('TesisController@edit3', $tesis->id)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
             <a href="{{url('/tesis_director_evaluar/'.$tesis->id)}}" class="btn btn-info"><span class="fas fa-check"></span></a> 
            
           <form action="{{ route('tesis.destroy', $tesis->id)}}" method="POST">
          <button type="submit"  class="btn btn-danger"><span class="fas fa-trash"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
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
@endsection