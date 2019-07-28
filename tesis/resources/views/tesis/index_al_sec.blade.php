@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Tesis inscritas') }}</div>
          <div class="card-body">

 <table class="table table-bordered">
        <tr>
         
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Acta examen</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
           @if(($tesis->estado1==4 and $tesis->estado2==1))
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
           <td>{{$tesis->tipo}}</td>
            <td>@if($tesis->constancia_ex==null)
             Debe subir informe
            @else
              <a class="btn btn-primary" href="{{url('/acta_examen/'.$tesis->id)}}" id="descargaPDF" ><span class="fa fa-print"> </span>Generar Acta</a>
              @endif
           @endif
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
            <a href="{{ url('secretariahome') }}" class="btn btn-default">Volver a home</a>
     </div>
</div>




@endsection

  

