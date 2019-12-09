@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12"> <!--Con 12 se ocupa todo el ancho de la pantalla-->
      <div class="card">
        <div class="card-header">{{ __('Tesis del alumno') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
          <th>Estado</th>
          <th>Nota Pendiente</th>
          <th>Nota Prorroga</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          @if($tesis->nombre_completo==$user->name or $tesis->nombre_completo2)
          <td>{{$tesis->id_pk}}</td>
          <td>{{$tesis->nombre_completo}} {{$tesis->nombre_completo2}}    
            @if($tesis->estado1>=2 and $tesis->estado2==1 and ($tesis->nota_tesis==null)) <!--Al alumno le aparecerá la opcion de descargar word de inscripcion solo una vez que el profesor lo envie al director de tesis -->
            <a href="{{url('/generar_formulario_inscripcion_tesis/'.$tesis->id_pk)}}">Formulario Inscripción</a>
            @endif
          </td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}</td>
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
           @if($tesis->constancia_ex!=null and $tesis->nota_tesis==null)
           <a href="{{URL::action('Recopilacion_infController@edit', $tesis->id_pk)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
          @endif
           @if($tesis->nota_pendiente!=null and $tesis->nota_prorroga==null and $tesis->estado6==1 and $tesis->estado7==null and ( $tesis->nota_tesis==null))
           <td>{{$tesis->nota_pendiente}}</td>
           <td><a href="{{url('/pedir_nota_prorroga/'.$tesis->id_pk)}}">Pedir nota Prorroga</a></td>
            <td><a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir archivo constancia</a><td>
           <td></td>
         @endif
           @if($tesis->nota_pendiente!=null and $tesis->nota_prorroga==null and $tesis->estado6!=1 and $tesis->estado7==null and ($tesis->nota_tesis>=4 or $tesis->nota_tesis==null))
           <td>En espera</td>
          <td><a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir archivo constancia</a><td>
           <td></td>
         @endif
          @if($tesis->nota_pendiente==null and $tesis->estado1==4 and $tesis->nota_prorroga==null and($tesis->nota_tesis==null))
          <td>
            <a href="{{url('/pedir_nota_pendiente/'.$tesis->id_pk)}}">Pedir nota Pendiente</a>
          </td>
          <td> </td>
          <td>
            <a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir archivo constancia</a>
          </td>
          @endif
          @if($tesis->nota_pendiente==null and $tesis->estado1!=4 and $tesis->nota_prorroga==null)
          <td>  </td>
          <td>  </td>
          @endif
          @if($tesis->nota_prorroga!=null and $tesis->nota_pendiente!=null and $tesis->estado6==1 and $tesis->estado7!=1 and ( $tesis->nota_tesis==null))
         <td>{{$tesis->nota_pendiente}}</td>
          <td>En espera</td>
          <!--<td><a href="{{url('/pedir_nota_prorroga/'.$tesis->id_pk)}}">Pedir nueva nota de Prorroga</a></td>-->
          <td><a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir archivo constancia</a><td>
          <td></td>
         @endif
          @if($tesis->nota_prorroga!=null and $tesis->nota_pendiente!=null and $tesis->estado6==1 and $tesis->estado7==1 and ( $tesis->nota_tesis==null))
         <td>{{$tesis->nota_pendiente}}</td>
          <td>{{$tesis->nota_prorroga}}</td>
          <td><a href="{{url('/pedir_nota_prorroga/'.$tesis->id_pk)}}">Pedir nueva nota de Prorroga</a></td>
          <td><a href="{{url('/vista_subir_archivo', $tesis->id_pk)}}">Subir archivo constancia</a><td>
          <td></td>
         @endif
      <td>
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}"  class="btn btn-info"><span class="far fa-eye"></span>
            <br> 
            <a href="{{URL::action('TesisController@edit', $tesis->id_pk)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
            <br>
           <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST">
          <button type="submit" class="btn btn-danger"><span class="fas fa-trash"></span>
            
            <br>
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
     <a href="{{ url('/profesorhome')}}" class="btn btn-default">Volver a home</a>
     </div>
</div>

   
{!! $tesistas->render() !!}
@endsection