@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Filtro de notas pendientes y prorrogas vencidas') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
        </tr>
        @foreach ($notas_pend_pro_vencidas as $tesis)
        <tr>
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}}</td>
          <td>

      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     </div>
</div>


            <div class="col-md-3">
                  <div class="form-group" align="center">
                    <a class="btn btn-primary" href="#" id="descargaPDF"> <span class="fa fa-print"> </span> Descargar PDF</a>
              </div>
              <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
              <a href="{{ url('/directorhome') }}">Volver a inicio</a>
        </div>
  <script>
  $(function(){
    $('#descargaPDF').on('click', function(){
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


@endsection