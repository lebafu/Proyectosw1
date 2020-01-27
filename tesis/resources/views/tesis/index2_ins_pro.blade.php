@extends('layouts.app')


@section('content')
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">-->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Tesis inscritas a profesor')}}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>% avance</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
          <th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          @if($tesis->profesor_guia==$user->name and ($tesis->estado1==4 and $tesis->estado2==1))
          <td>{{$tesis->id_pk}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->avance_general}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}}</td>
          <td>
         <!-- <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info"><span class="far fa-eye"></span></a>
            <a href="{{url('/tesis_profesor/'.$tesis->id_pk)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
            <a href="{{url('/tesis_profesor_evaluar/'.$tesis->id_pk)}}" class="btn btn-info"><span class="fas fa-check"></span></a> 
           <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST">
          <button type="submit" class="btn btn-danger"><span class="fas fa-trash"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button> -->

           <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">remove_red_eye
</i></a>
            <a href="{{url('/tesis_profesor/'.$tesis->id_pk)}}" class="btn btn-primary"><i class="material-icons">create</i></a>
            <a href="{{url('/tesis_profesor_evaluar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">done</i></a> 
           <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST">
          <button type="submit" class="btn btn-danger"><i class="material-icons">delete_outline</i>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button>
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
     <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
     </div>
</div>

  
{!! $tesistas->render() !!}
@endsection