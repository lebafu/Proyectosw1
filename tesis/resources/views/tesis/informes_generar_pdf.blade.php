@extends('layouts.app')



@section('content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Lista de Informes') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>Nombre PDF</th>
          <th>Opcion</th>
        </tr>
        <tr>
        <td>Empresas</td>
        <td><a class="btn btn-primary" href="#" id="descargaPDF_empresas"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      <tr>
        <td>Proyectos</td>
        <td><a class="btn btn-primary" href="#" id="descargaPDF_proyectos"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      <tr>
        <td>Fondo Concursable</td>
        <td><a class="btn btn-primary" href="#" id="descargaPDF_fondoconcursable"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      <tr>
        <td>Comunidad</td>
          <td><a class="btn btn-primary" href="#" id="descargaPDF_comunidad"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      <tr>
        <td>Notas Pendientes</td>
         <td><a class="btn btn-primary" href="#" id="descargaPDF_pendiente"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      <tr>
        <td>Notas de Prorroga</td>
        <td><a class="btn btn-primary" href="#" id="descargaPDF_prorroga"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      <tr>
        <td>Notas Pendientes y de Prorroga</td>
        <td><a class="btn btn-primary" href="#" id="descargaPDF_pend_pro"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
      <tr>
        <td>Tesis Inscritas</td>
        <td><a class="btn btn-primary" href="#" id="descargaPDF_inscritas"> <span class="fa fa-print"> </span> Descargar PDF</a></td>
      </tr>
     </table>
     </div>
     </div>
     </div>
     </div>
     <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
     </div>
</div>

<script>
  $(function(){
    $('#descargaPDF_empresas').on('click', function(){
      $.ajax({
        url:'{{route('descargar_te')}}',
        type:'get',
         data:{
          fecha_inicio:'{{$fecha_inicio}}',
          fecha_final:'{{$fecha_final}}'
        },        success: function(data){
          var ventana=window.open("", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>

<script>
  $(function(){
    $('#descargaPDF_proyectos').on('click', function(){
      $.ajax({
        url:'{{route('descargar_tp')}}',
        type:'get',
        data:{
          fecha_inicio:'{{$fecha_inicio}}',
          fecha_final:'{{$fecha_final}}'
        },
        success: function(data){
          var ventana=window.open("", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>


    <script>
  $(function(){
    $('#descargaPDF_fondoconcursable').on('click', function(){
      $.ajax({
        url:'{{route('descargar_tfc')}}',
        type:'get',
         data:{
          fecha_inicio:'{{$fecha_inicio}}',
          fecha_final:'{{$fecha_final}}'
        },
        success: function(data){
          var ventana=window.open("", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>

<script>
  $(function(){
    $('#descargaPDF_comunidad').on('click', function(){
      $.ajax({
        url:'{{route('descargar_tc')}}',
        type:'get',
        data:{
          fecha_inicio:'{{$fecha_inicio}}',
          fecha_final:'{{$fecha_final}}'
        },
        success: function(data){
          var ventana=window.open("", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>

 <script>
  $(function(){
    $('#descargaPDF_prorroga').on('click', function(){
      $.ajax({
        url:'{{route('descargar_notaprorroga')}}',
        type:'get',
        data:{
          fecha_inicio:'{{$fecha_inicio}}',
          fecha_final:'{{$fecha_final}}'
        },
        success: function(data){
          var ventana=window.open("", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>

  <script>
  $(function(){
    $('#descargaPDF_pendiente').on('click', function(){
      $.ajax({        
        url:'{{route('descargar_notapendiente')}}',
        type:'get',
        data:{
          fecha_inicio:'{{$fecha_inicio}}',
          fecha_final:'{{$fecha_final}}'
        },
        success: function(data){
          var ventana=window.open("", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>


 <script>
  $(function(){
    $('#descargaPDF_pend_pro').on('click', function(){
      $.ajax({
        url:'{{route('descargar_notapendpro')}}',
        type:'get',
         data:{
          fecha_inicio:'{{$fecha_inicio}}',
          fecha_final:'{{$fecha_final}}'
        },
        success: function(data){
          var ventana=window.open("", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>

   <script>
  $(function(){
    $('#descargaPDF_inscritas').on('click', function(){
      $.ajax({
        url:'{{route('descargar_tesis_ins')}}',
        type:'get',
         data:{
          fecha_inicio:'{{$fecha_inicio}}',
          fecha_final:'{{$fecha_final}}'
        },
        success: function(data){
          var ventana=window.open("", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>




@endsection