@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Lista de Comisiones') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
        </tr>
        @foreach ($comision as $com)
        <tr>
          <td>{{$com->id}}</td>
          <td>{{$com->nombre_completo}}</td>
          <td>{{$com->profesor_guia}}</td>
          <td>

            <a href="{{url('/comisionmostrar/'.$com->id)}}">Ver detalles</a> 
            <a href="{{URL::action('ComisionController@edit', $com->id)}}" class="btn btn-primary">Editar</a>
            
           <form action="{{ route('tesis.destroy', $user->id)}}" method="POST">
          <input type="submit" value="Eliminar" class="btn btn-danger">
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     </div>
</div>

  

@endsection