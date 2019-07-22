@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
      <div class="card">
        <div class="card-header">{{ __('Tesis relacionadas a empresa')}}</div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-9">
                <table class="table table-bordered">
                  <tr>
                    <th>ID</th>
                    <th>Nombre Estudiante</th>
                    <th>Profesor Guia</th>
                    <th>Nombre Tesis</th>
                    <th>Tipo Vinculacion</th>
                  </tr>
                  @foreach ($tes_empresas as $tesis)
                  <tr>
                    <td>{{$tesis->id}}</td>
                    <td>{{$tesis->nombre_completo}}</td>
                    <td>{{$tesis->profesor_guia}}</td>
                    <td>{{$tesis->nombre_tesis}}</td>
                    <td>{{$tesis->tipo_vinculacion}}</td>
                  </tr>
                  @endforeach
               </table>
              </div>
              <div class="col-md-3">
                  <div class="form-group" align="center">
                    <a class="btn btn-primary" href="#" id="descargaPDF"> <span class="fa fa-print"> </span> Descargar PDF</a>
                  </div>
              </div>

            </div>

          </div>
     </div>
     </div>
     </div>
</div>

<script>
  $(function(){
    $('#descargaPDF').on('click', function(){
      $.ajax({
        url:'{{route('descargar_te')}}',
        type:'get',
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