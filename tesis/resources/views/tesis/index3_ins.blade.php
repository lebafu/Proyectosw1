@extends('layouts.app')



@section('content')
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
           <th>Area Tesis</th>
          <th>Nombre tesis</th>
          <th>Vinculacion</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
           @if(($tesis->estado1==4 and $tesis->estado2==1))
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->area_tesis}}</td>
          <td>{{$tesis->nombre_tesis}}}</td>
          <td>{{$tesis->tipo_vinculacion}}</td>
          <td>

            <a href="{{url('/tesismostrar/'.$tesis->id)}}">Ver detalles</a> 
            <!--<a href="{{URL::action('TesisController@edit', $tesis->id)}}" class="btn btn-primary">Editar</a>-->
            
           <form action="{{ route('tesis.destroy', $tesis->id)}}" method="POST">
          <input type="submit" value="Eliminar" class="btn btn-danger">
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
      </td>
        </tr>
        @endif
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
        </div>
   <script>
  $(function(){
    $('#descargaPDF').on('click', function(){
      $.ajax({
        url:'{{route('descargar_tesis_ins')}}',
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