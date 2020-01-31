@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-16"> <!--Con 12 se ocupa todo el ancho de la pantalla-->
      <div class="card">
        <div class="card-header">{{ __('Bitacora') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
         <th>Estudiante(s)</th>
          <th>Tesis</th>
          <th>Fecha</th>
          <th>Comentario</th>
         <th>Acuerdo</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id_tesis}}</td>
          @if($tesis->nombre_completo2==null)
          <td>{{$tesis->nombre1}} </td>
          @endif
          @if($tesis->nombre_completo2!=null)
          <td>{{$tesis->nombre1}} y {{$tesis->nombre2}}</td>
          @endif
          <td>{{$tesis->nombre_tesis}}</td>
          <td>{{$tesis->created_at_res}}</td>
          <td>{{$tesis->comentario_res}}</td>
          <td>{{$tesis->acuerdo_res}}</td>
            @if($user->tipo_usuario==2)
          <td>
              <div class="row">
            <form action="{{ route('bitacora.destroy', $tesis->id)}}" method="POST" class="form-inline">
         <a href="{{URL::action('BitacoraController@edit', $tesis->id)}}" class="btn btn-primary" style="width:25px;height:25px;margin:1px"><span class="far fa-edit fa-sm" style="float:left;margin-left:-8px"></span></a>
         @if($user->tipo_usuario==3 or $user->tipo_usuario==2)
            <a href="{{url('/bitacoramostrar/'.$tesis->id)}}" class="btn btn-info" style="width:25px;height:25px;margin:1px"><span class="far fa-eye fa-sm" style="float:left;margin-left:-8px"></span></a>
        @endif
          <button type="submit" class="btn btn-danger" style="width:25px;height:25px"><span class="fas fa-trash" style="float:left;margin-left:-8px"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
            </button>
           </form>
            </div>
         </td>
         @endif
        @if($user->tipo_usuario==3)
         <td><a href="{{url('/bitacoramostrar/'.$tesis->id)}}" class="btn btn-info" style="width:25px;height:25px;margin:1px"><span class="far fa-eye fa-sm" style="float:left;margin-left:-8px"></span></a></td>
        @endif
        </tr>
        @endforeach
      </table>
@if($user->tipo_usuario==3)
    <td><a href="{{url('/index_tesis_bitacora')}}">Lista de Bitacoras</a></td>
@endif
</div>
</div>
@if($user->tipo_usuario==2)
<td><a href="{{url('/bitacora_tesis/create'.$id)}}" class="fas fa-plus"></a></td>
@endif
@if($user->tipo_usuario==2)
<td><a href="{{url('/bitacora_tesis/no_hay_acuerdo'.$id)}}" class="fas fa-plus">No hay acuerdo(fila automatica)</a></td>
@endif
</div>
</div>
</div>
{!! $tesistas->render() !!}
@endsection