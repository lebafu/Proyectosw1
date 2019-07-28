@extends('layouts.app')



@section('content')



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Filtro de notas pendientes vencidas') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
        </tr>
        @foreach ($notas_pendientes_vencidas as $tesis)
        <tr>
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}}</td>
          <td>

          
              </div>
           </form>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
     <a href="{{ url('directorhome')}}" class="btn btn-default">Volver a home</a>
     </div>
     </div>
</div>


  <div class="col-md-3">
                  <div class="form-group" align="center">
                    <a class="btn btn-primary" href="#" id="descargaPDF"> <span class="fa fa-print"> </span> Descargar PDF</a>
              </div>
        </div>
  <script>
  $(function(){
    $('#descargaPDF').on('click', function(){
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


@endsection