@extends('layouts.app')



@section('content')

<!--link para usar gliphycons de bootstrap-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Lista de Memorandum') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
        </tr>
        @foreach ($memos as $memo)
        <tr>
          <td>{{$memo->id}}</td>
          <td>{{$memo->nombre_memorandum}}</td>
          <td>

            <a href="{{URL::action('MemorandumController@edit', $memo->id)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
           {{ csrf_field() }}
           </form>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     <a href="{{URL::action('MemorandumController@create')}}" class="btn btn-primary">Crear Memo</a>
     </div>
     </div>
     </div>
     <a href="{{ url('/diretorhome')}}" class="btn btn-default">Volver a home</a>
</div>

   {!! $memos->render() !!}

@endsection