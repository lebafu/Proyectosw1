@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">-->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-16">
      <div class="card">
        <div class="card-header">{{ __('Tesis inscritas a profesor')}}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Estudiante(s)</th>
          <th>% avance</th>
          <th>Tipo</th>
         <!--<th>Fecha Peticion</th>-->
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          @if($tesis->profesor_guia==$user->name and ($tesis->estado1==4 and $tesis->estado2==1))
          <td>{{$tesis->id_pk}}</td>
          @if($tesis->nombre_completo2!=null)
          <td>{{$tesis->nombre_completo}} y {{$tesis->nombre_completo2}}</td>
          @endif
          @if($tesis->nombre_completo2==null)
          <td>{{$tesis->nombre_completo}}</td>
          @endif
          <td>{{$tesis->avance_general}}</td>
          <td>{{$tesis->tipo}}</td>
          <!--<td>{{$tesis->fecha_peticion}}}</td>-->
          <td>
         <div class="row">
             <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST" class="form-inline">

            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info" style="width:25px; height:25px"><span class="far fa-eye fa-xs" style="float:left;margin-left:-8px"></span></a>
            <a href="{{url('/tesis_profesor/'.$tesis->id_pk)}}" class="btn btn-primary" style="width:25px; height:25px"><span class="far fa-edit fa-xs" style="float:left;margin-left:-8px"></span></a>
            <a href="{{url('/tesis_profesor_evaluar/'.$tesis->id_pk)}}" class="btn btn-info" style="width:25px; height:25px"><span class="fas fa-check fa-xs" style="float:left;margin-left:-8px"></span></a>
             <button type="submit" class="btn btn-danger btn-sm" style="width:25px; height:25px"><span class="fas fa-trash fa-xs" style="float:left;margin-left:-8px"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
         </button>
           </form>
          </div>
          <!--  <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">remove_red_eye
          </i></a>
            <a href="{{url('/tesis_profesor/'.$tesis->id_pk)}}" class="btn btn-primary"><i class="material-icons">create</i></a>
            <a href="{{url('/tesis_profesor_evaluar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">done</i></a> 
           <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST">
          <button type="submit" class="btn btn-danger"><i class="material-icons">delete_outline</i>
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
        @if($user->director_escuela==1)
     <a href="/director_escuelahome" class="btn btn-default">Volver a home</a>
     @endif
     @if($user->director_escuela==0)
     <a href="/profesorhome" class="btn btn-default">Volver a home</a>
     @endif
     </div>
</div>

  
{!! $tesistas->render() !!}
@endsection