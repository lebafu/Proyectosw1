@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">-->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-16"> <!--De esta forma se ocupa toda la pantalla -->
      <div class="card">
        <div class="card-header">{{ __('Solicitudes de tesis por aprobar o rechazar') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
         
          <th>Id</th>
          <th>Estudiante(s)</th>
          <th>Profesor Guia</th>
          <th>Area Tesis</th>
          <th>Tipo</th>
          <!--th>Fecha Peticion</th>-->
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id}}</td>
          @if($tesis->nombre_completo2==null)
          <td>{{$tesis->nombre_completo}}</td>
          @else
           <td>{{$tesis->nombre_completo}} - {{$tesis->nombre_completo2}}</td>
          @endif
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->area_tesis}}</td>
          @if($tesis->tipo=="Tesis")
          <td>T</td>
          @endif
           @if($tesis->tipo=="Memoria")
           <td>M</td>
          @endif
          <!--<td>{{$tesis->tipo}}</td>-->
          <!--<td>{{$tesis->fecha_peticion}}</td>-->
          <td>
          <div class="row">
            <form action="{{ route('tesis.destroy', $tesis->id)}}" method="POST" class="form-inline">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info" style="width:25px; height:25px;margin:1px"><span class="far fa-eye fa-xs" style="float:left;margin-left:-8px"></span></a>

            <a href="{{URL::action('TesisController@edit3', $tesis->id_pk)}}" class="btn btn-primary" style="width:25px; height:25px;margin:1px"><span class="far fa-edit fa-xs" style="float:left;margin-left:-8px"></span></a>
             <a href="{{url('/tesis_director_evaluar/'.$tesis->id_pk)}}" class="btn btn-info" style="width:25px; height:25px;margin:1px"><span class="fas fa-check fa-xs" style="float:left;margin-left:-8px"></span></a> 
            
           
          <button type="submit"  class="btn btn-danger" style="width:25px; height:25px"><span class="fas fa-trash fa-xs" style="float:left;margin-left:-8px"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button>
           <!-- <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">remove_red_eye
</i></a>

            <a href="{{URL::action('TesisController@edit3', $tesis->id_pk)}}" class="btn btn-primary"><i class="material-icons">create
</i></a>
             <a href="{{url('/tesis_director_evaluar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">done
</i></a> 
            
           <form action="{{ route('tesis.destroy', $tesis->id)}}" method="POST">
          <button type="submit"  class="btn btn-danger"><i class="material-icons">delete_outline</i>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button> -->
        </div>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     <a href="{{ url('directorhome') }}" class="btn btn-default">Volver a home</a>
     </div>
</div>

  <!--      <div class="col-md-3">
                  <div class="form-group" align="center">   
                    <a class="btn btn-primary" href="#" id="descargaPDF"> <span class="fa fa-print"> </span> Descargar PDF</a>
              </div>
        </div>
 <script>
  $(function(){
    $('#descargaPDF').on('click', function(){
      $.ajax({
        url:'{{route('descargar_todas_tesis_sol')}}',
        type:'get',
        success: function(data){
          var ventana=window.open("", "_blank");
          ventana.document.write(data);
          ventana.document.close();
        }
      })
    });
  });
</script>-->


{!! $tesistas->render() !!}
@endsection