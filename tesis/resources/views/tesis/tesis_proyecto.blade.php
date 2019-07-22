@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Tesis relacionadas a proyectos internos de la Universidad')}}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Nombre Tesis</th>
          <th>Tipo Vinculacion</th>
        </tr>
        @foreach ($tes_proyectos as $tesis)
        <tr>
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->nombre_tesis}}</td>
          <td>{{$tesis->tipo_vinculacion}}</td>
          <td>
           </form>
      </td>
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
<script>
  $(function(){
    $('#descargaPDF').on('click', function(){
      $.ajax({
        url:'{{route('descargar_tp')}}',
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
  
{!! $tes_proyectos->render() !!}
@endsection