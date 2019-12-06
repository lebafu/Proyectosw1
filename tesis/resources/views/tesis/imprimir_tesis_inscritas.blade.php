@extends('layouts.app')



@section('content')

<head>
  <title> TODAS LAS TESIS INSCRITAS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<div class="container">
  <h4 align="center" style="margin-bottom: 40px; margin-top: 30px"> Todas las tesis inscritas</h4>
    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Nombre Tesis</th>
          <th>Fecha Peticion</th>
          <th>Fecha Inscripcion</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id_pk}}</td>

          @if($tesis->nombre_completo2==null)
            <td>{{ $tesis->nombre_completo}} </td>
            @else
               <td>{{ $tesis->nombre_completo}} y {{$tesis->nombre_completo2}}</td>
            @endif
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->nombre_tesis}}</td>
          <td>{{$tesis->fecha_peticion}}}</td>
          <td>{{$tesis->fecha_inscripcion}}</td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     </div>
</div>
<script>
    
    $(document).ready(function(){
      window.print();
    })
  </script>

@endsection