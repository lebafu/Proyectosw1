@extends('layouts.app')



@section('content')

<!--link para usar gliphycons de bootstrap-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Lista de Proyectos') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
        </tr>
        @foreach ($proyectos as $proyecto)
        <tr>
          <td>{{$proyecto->id}}</td>
          <td>{{$proyecto->nombre}}</td>
          <td>
            <form action="{{route('proyectos.destroy', $proyecto->id)}}" method="POST" class="form-inline">
            <a href="{{URL::action('ProyectosController@edit', $proyecto->id)}}" class="btn btn-primary" style="width:25px;height:25px;margin:1px"><span class="far fa-edit fa-sm" style="float:left;margin-left:-8px"></span></a>
           
          <button type="submit" class="btn btn-danger"  style="width:25px;height:25px"><span class="fas fa-trash fa-sm" style="float:left;margin-left:-8px"></span>
          <br>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     <a href="{{URL::action('ProyectosController@create')}}" class="btn btn-primary">Crear Proyectos </a>
     </div>
     </div>
      <a href="{{ url('/profesorhome')}}" class="btn btn-default">Volver a home</a>
     </div>
</div>

   {!! $proyectos->render() !!}

@endsection