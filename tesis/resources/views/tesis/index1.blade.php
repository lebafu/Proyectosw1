@extends('layouts.app')



@section('content')


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<!--<link rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>-->
<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">-->

    <!--link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-16"> <!--Con 12 se ocupa todo el ancho de la pantalla a lo ancho-->
      <div class="card">
        <div class="card-header">{{ __('Tesis del alumno') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <!--<th>Estudiante(s)</th>-->
          <th>Profesor Guia</th>
          <th>Tipo</th>
          <!--<th>Fecha Peticion</th>-->
          <th>Estado</th>
          <th>Nota Pendiente</th>
          <th>Nota Prorroga</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          @if($tesis->nombre_completo==$user->name or $tesis->nombre_completo2)
          <td>{{$tesis->id_pk}}</td>
          @if($tesis->nombre_completo2!=null)
          <!--<td>{{$tesis->nombre_completo}} y {{$tesis->nombre_completo2}}</td>-->
          @else
          <!--<td>{{$tesis->nombre_completo}}</td>-->
          @endif   
            @if($tesis->estado1>=2 and $tesis->estado2==1 and ($tesis->nota_tesis==null)) <!--Al alumno le aparecerá la opcion de descargar word de inscripcion solo una vez que el profesor lo envie al director de tesis -->
            <a href="{{url('/generar_formulario_inscripcion_tesis/'.$tesis->id_pk)}}">Formulario Inscripción</a>
            @endif
          </td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <!--<td>{{$tesis->fecha_peticion}}</td>-->
           <td>
          @if($tesis->estado1!=4 and $tesis->estado1!=5)
              En espera
          @endif
          @if($tesis->estado1==4)
              Inscrita
           @endif  
           @if($tesis->estado1==5)
                Rechazada
           @endif
           @if($tesis->nota_pendiente!=null and $tesis->nota_prorroga==null and $tesis->estado6==1 and $tesis->estado7==null and ( $tesis->nota_tesis==null))
           <td>{{$tesis->nota_pendiente}}</td>
           <td><a href="{{url('/pedir_nota_prorroga/'.$tesis->id_pk)}}">Pedir nota</a></td>
            <td><a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir constancia</a><td>
             @endif
           @if($tesis->nota_pendiente!=null and $tesis->nota_prorroga==null and $tesis->estado6!=1 and $tesis->estado7==null and ($tesis->nota_tesis>=4 or $tesis->nota_tesis==null))
           <td>En espera</td>
          <td><a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir constancia</a><td>
         @endif
          @if($tesis->nota_pendiente==null and $tesis->estado1==4 and $tesis->nota_prorroga==null and($tesis->nota_tesis==null))
          <td>
            <a href="{{url('/pedir_nota_pendiente/'.$tesis->id_pk)}}">Pedir nota Pendiente</a>
          </td>
          <td> </td>
          <td>
            <a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir constancia</a>
          </td>
          @endif
          @if($tesis->nota_pendiente==null and $tesis->estado1!=4 and $tesis->nota_prorroga==null)
          <td>  </td>
          <td>  </td>
          @endif
          @if($tesis->nota_prorroga!=null and $tesis->nota_pendiente!=null and $tesis->estado6==1 and $tesis->estado7!=1 and ( $tesis->nota_tesis==null))
         <td>{{$tesis->nota_pendiente}}</td>
          <!--<td><a href="{{url('/pedir_nota_prorroga/'.$tesis->id_pk)}}">Pedir nueva nota de Prorroga</a></td>-->
          <td><a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir constancia</a></td>
         @endif
          @if($tesis->nota_prorroga!=null and $tesis->nota_pendiente!=null and $tesis->estado6==1 and $tesis->estado7==1 and ( $tesis->nota_tesis==null))
          <td>{{$tesis->nota_pendiente}}</td>
          <td>{{$tesis->nota_prorroga}}<a href="{{url('/pedir_nota_prorroga/'.$tesis->id_pk)}}">Pedir nota</a></td>
          <td><a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir const</a></td>
         @endif
         @if($tesis->nota_prorroga!=null and $tesis->nota_pendiente!=null and $tesis->estado6==1 and $tesis->estado7==1 and ($tesis->nota_tesis!=null))
          <td>{{$tesis->nota_pendiente}}</td>
          <td>{{$tesis->nota_prorroga}}</td>
          @elseif($tesis->nota_pendiente!=null and $tesis->estado6==1)
           <td>{{$tesis->nota_pendiente}}</td>
           @elseif($tesis->nota_prorroga!=null and $tesis->estado7==1)
            <td></td>
            <td>{{$tesis->nota_prorroga}}</td>
         @endif
      <td>
          <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST" class="form-inline">
        <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}"  class="btn btn-info" style="width:25px; height:25px;margin:1px"><span class="fa fa-eye fa-xs" style="float:left; margin-left:-8px" ></span></a>
        <a href="{{URL::action('TesisController@edit', $tesis->id_pk)}}" class="btn btn-primary" style="width:25px; height:25px;margin:1px"><span class="fa fa-edit fa-xs" style="float:left;margin-left:-8px"></span></a>
        <button type="submit" class="btn btn-danger" style="width:25px; height:25px"> <span class="fa fa-trash fa-xs" style="float:left;margin-left:-8px"></span>
          {{ method_field('DELETE') }}
           {{ csrf_field() }}

            </button>
           </form>

          <!-- <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}"  class="btn btn-info"><i class="material-icons">remove_red_eye
</i><br> 
            <a href="{{URL::action('TesisController@edit', $tesis->id_pk)}}" class="btn btn-primary"><i class="material-icons">create</i></a>
            <br>
           <form action="{{route('tesis.destroy', $tesis->id_pk)}}" method="POST">
          <button type="submit" class="btn btn-danger"><i class="material-icons">delete_outline</i>
            <br>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}

            </button>
           </form>-->
        </td>
        </tr>
        @endif
        @endforeach
     </table>
     </div>
     </div>
       @if($tesis->constancia_ex!=null and $tesis->nota_tesis==null)
           <a href="{{URL::action('Recopilacion_infController@edit', $tesis->id_pk)}}" class="btn btn-primary">Editar recopilacion de informacion<span class="far fa-edit"></span></a>
             @endif
     </div>
     </div>
     <a href="{{ url('/profesorhome')}}" class="btn btn-default">Volver a home</a>
     </div>
</div>

   
{!! $tesistas->render() !!}
@endsection