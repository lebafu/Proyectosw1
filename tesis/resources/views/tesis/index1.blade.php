@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
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
          @if($tesis->nombre_completo==$user->name)
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}}</td>
           <td>
          @if($tesis->estado1!=4)
              En espera
          @endif
          @if($tesis->estado1==4)
              Inscrita
           @endif  
           @if($tesis->nota_pendiente!=null)
           <td>{{$tesis->nota_pendiente}}</td>
           <td>
            <a href="{{url('/pedir_nota_prorroga/'.$tesis->id)}}">Pedir nota Prorroga</a>
          </td>

           @endif
           @if($tesis->nota_pendiente!=null)
          
          @endif
          @if($tesis->nota_pendiente==null and $tesis->estado1==4)
          <td>
            <a href="{{url('/pedir_nota_pendiente/'.$tesis->id)}}">Pedir nota Pendiente</a>
          </td>
          @endif
          
         
      <td>
            <a href="{{url('/tesismostrar/'.$tesis->id)}}" class="btn btn-info">Ver detalles</a> 
            <a href="{{URL::action('TesisController@edit', $tesis->id)}}" class="btn btn-primary">Editar</a>
            
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

  

@endsection