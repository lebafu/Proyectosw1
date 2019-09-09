@extends('layouts.app')



@section('content')

<!--link para usar gliphycons de bootstrap-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Lista de Comunidades') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
        </tr>
        @foreach ($comunidads as $comunidad)
        <tr>
          <td>{{$comunidad->id}}</td>
          <td>{{$comunidad->nombre}}</td>
          <td>

            <a href="{{url('/comunidadmostrar/'.$comunidad->id)}}" class="btn btn-info"><span class="far fa-eye"></span>
            <br>
            <a href="{{URL::action('ComunidadController@edit', $comunidad->id)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
             <br>
           <form action="{{ route('comunidad.destroy', $comunidad->id)}}" method="POST">
          <button type="submit" class="btn btn-danger"><span class="fas fa-trash"></span>
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
     </div>
     </div>
     </div>
</div>

   {!! $comunidads->render() !!}

@endsection