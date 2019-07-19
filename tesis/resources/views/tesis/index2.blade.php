@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Solicitudes de tesis en espera')}}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          @if($tesis->profesor_guia==$user->name and ($tesis->estado1==1 or $tesis->estado1==2 or ($tesis->estado1==3 and $tesis->estado2==1)))
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}}</td>
          <td>

            <a href="{{url('/tesismostrar/'.$tesis->id)}}" class="btn btn-info">Ver detalles</a> 
            <a href="{{url('/tesis_profesor/'.$tesis->id)}}" class="btn btn-primary">Editar</a>
            <a href="{{url('/tesis_profesor_evaluar/'.$tesis->id)}}">Evaluar</a> 
            
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

  
{!! $tesistas->render() !!}
@endsection