@extends('layouts.app')



@section('content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Lista de Informes de profesores de comision') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>Nombre Profesor Comision</th>
          <th>Opcion</th>
        </tr>
        <tr>
        <td>{{$profesor1}}</td>
        <td><a class="btn btn-primary" href="#" id="descargarPDF_profesor1"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      <tr>
        <td>{{$profesor2}}</td>
        <td><a class="btn btn-primary" href="#" id="descargarPDF_profesor2"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      @if($profesor3!="Ninguno")
      <tr>
        <td>{{$profesor3}}</td>
        <td><a class="btn btn-primary" href="#" id="descargarPDF_profesor3"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      @endif
      @if(($profesor4!=null))
      <tr>
        <td>{{$profesor4}}</td>
          <td><a class="btn btn-primary" href="#" id="descargarPDF_profesor4"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      @endif
      @if(($profesor5!=null))
      <tr>
        <td>{{$profesor5}}</td>
         <td><a class="btn btn-primary" href="#" id="descargarPDF_profesor5"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      @endif
      <tr>
      </tr>
    </table>
     </div>
     </div>
     </div>
     </div>
     <a href="{{ url('directorhome')}}" class="btn btn-default">Volver a home</a>
     </div>
</div>

<!-- Los script aca abajo detallados , son los que envian a los controladores de las respectivas rutas la id y el numero para abrir una nueva veentana en blanco y escribir sobre un documento los datos de la consulta realizada en aquel controlador. -->


<script>
  $(function(){
    $('#descargarPDF_profesor1').on('click', function(){
      $.ajax({
        url:'{{route('descargar_memorandum_revision1')}}',
        type:'get',
         data:{
          numero:'{{$numero}}',
          id: '{{$id}}'
        },        success: function(data){
          var ventana=window.open("/", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>

<script>
  $(function(){
    $('#descargarPDF_profesor2').on('click', function(){
      $.ajax({
        url:'{{route('descargar_memorandum_revision2')}}',
        type:'get',
         data:{
          numero:'{{$numero}}',
          id: '{{$id}}'
        },        success: function(data){
          var ventana=window.open("/", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>

<script>
  $(function(){
    $('#descargarPDF_profesor3').on('click', function(){
      $.ajax({
        url:'{{route('descargar_memorandum_revision3')}}',
        type:'get',
         data:{
          numero:'{{$numero}}',
          id: '{{$id}}'
        },        success: function(data){
          var ventana=window.open("/", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>


@endsection
