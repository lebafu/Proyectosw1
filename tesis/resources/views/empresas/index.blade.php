@extends('layouts.app')



@section('content')

<!--link para usar gliphycons de bootstrap-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Lista de Empresas') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
        </tr>
        @foreach ($empresas as $empresa)
        <tr>
          <td>{{$empresa->id}}</td>
          <td>{{$empresa->nombre}}</td>
          <td>

            <form action="{{ route('empresas.destroy', $empresa->id)}}" method="POST" class="form-inline">
            <a href="{{URL::action('EmpresasController@edit', $empresa->id)}}" class="btn btn-primary" style="width:25px;height:25px;margin:1px"><span class="far fa-edit fa-sm" style="float:left;margin-left:-8px"></span></a>
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
     <a href="{{URL::action('EmpresasController@create')}}" class="btn btn-primary">Crear Empresa</a>
     </div>
     </div>
     </div>
     <a href="{{ url('/profesorhome')}}" class="btn btn-default">Volver a home</a>
</div>

   {!! $empresas->render() !!}

@endsection