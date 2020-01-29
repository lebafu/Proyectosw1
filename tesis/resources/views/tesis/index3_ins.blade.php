@extends('layouts.app')



@section('content')

<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">-->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Tesis inscritas') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
         
          <th>ID</th>
          <th>Estudiante(s)</th>
          <th>Profesor Guia</th>
          <th>% avance</th>
          <th>Tipo</th>
           <th>Area Tesis</th>
          <th>Tesis</th>
          <th>Vinculacion</th>
          <th>Revision</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
           @if(($tesis->estado1==4 and $tesis->estado2==1))
          <td>{{$tesis->id_pk}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->avance_general}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->area_tesis}}</td>
          <td>{{$tesis->nombre_tes_res}}</td>
          <td>{{$tesis->tipo_vinculacion}}</td>
          @if($tesis->constancia_ex!=null)
           <td><a href="{{url('tesis/create_num_memo'.$tesis->id) }}" class="btn btn-simple btn-primary btn-icon edit">Memo</a></td>
          @else
          <td></td>
          @endif
          <td>
          <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info"><span class="far fa-eye"></span></a>
           <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST">
          <button type="submit"  class="btn btn-danger"><span class="fas fa-trash"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button>

          <!-- <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">remove_red_eye
</i></a>
           <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST">
          <button type="submit"  class="btn btn-danger"><i class="material-icons">delete_outline</i>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button>-->
      </td>
       <td><a href="{{url('/mostrar_bitacora_tesis/'.$tesis->id_pk)}}">Bitacora</span></a>
       <a href="{{url('/mostrar_capitulos_tesis/'.$tesis->id_pk)}}">Capitulos</span></a></td>
        </tr>
        @endif
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
                  <a href="{{ url('directorhome') }}" class="btn btn-default">Volver a home</a>
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
        url:'{{route('descargar_todas_tesis_ins')}}',
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


  
{!! $tesistas->render() !!}
@endsection