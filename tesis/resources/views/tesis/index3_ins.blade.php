@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">-->

   <style>
        .contenedor-botones {
            display: block;
            width: 100%;
        }
        .boton-adaptado {
            width: 50%;
        }
    </style>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-16">
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
           <th>Area</th>
          <!--<th>Tesis</th>-->
          <th>Vínc</th>
          <th>Revisión</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
           @if(($tesis->estado1==4 and $tesis->estado2==1))
          <td>{{$tesis->id_pk}}</td>
          @if($tesis->nombre_completo2!=null)
          <td>{{$tesis->alumno1_res}} y {{$tesis->alumno2_res}}</td>
          @else
          <td>{{$tesis->alumno1_res}}</td>
          @endif
          <td>{{$tesis->nombre_profe_res}}</td>
          <td>{{$tesis->avance_general}}</td>
          @if($tesis->tipo=="Tesis")
          <td>T</td>
          @endif
          @if($tesis->tipo=="Memoria")
          <td>M</td>
          @endif
          <!--<td>{{$tesis->tipo}}</td>-->
          <td>{{$tesis->area}}</td>
          <!--<td>{{$tesis->nombre_tes_res}}</td>-->
          @if($tesis->tipo_vinculacion=="Empresa")
          <td>Emp</td>
          @endif
          @if($tesis->tipo_vinculacion=="Proyecto")
          <td>Proy</td>
          @endif
          @if($tesis->tipo_vinculacion=="Comunidad")
          <td>Com</td>
          @endif
          @if($tesis->tipo_vinculacion=="Fondo concursable")
          <td>Fc</td>
          @endif
          <!--<td>{{$tesis->tipo_vinculacion}}</td>-->
          @if($tesis->constancia_ex!=null and $tesis->nota_tesis==null)
           <td><a href="{{url('tesis/create_num_memo'.$tesis->id_pk) }}" class="btn btn-simple btn-primary">Memo</a></td>
          @else
          <td></td>
          @endif
          <td>
          <div class="row">
            <div class="btn-group" role="group">
            <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST" class="form-inline">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info boton-adaptado" style="width:25px; height:25px;margin:1px"><span class="far fa-eye fa-sm"  style="float:left;margin-left:-8px"></span></a>
          <button type="submit"  class="btn btn-danger boton-adaptado" style="width:25px; height:25px;margin:1px"><span class="fas fa-trash fa-sm" style="float:left;margin-left:-8px"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button>
          </form>
          <!-- <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">remove_red_eye
</i></a>
           <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST">
          <button type="submit"  class="btn btn-danger"><i class="material-icons">delete_outline</i>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button>-->
        </div>
      </div>
      </td>
       <td><a href="{{url('/mostrar_bitacora_tesis/'.$tesis->id_pk)}}">Bit</span></a>
       <a href="{{url('/mostrar_capitulos_tesis/'.$tesis->id_pk)}}">Caps</span></a></td>
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