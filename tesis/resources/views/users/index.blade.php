@extends('layouts.app')



@section('content')

<!--link para usar gliphycons de bootstrap-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Lista de usuarios') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
        </tr>
        @foreach ($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            <div class="row">
             <form action="{{ route('users.destroy', $user->id)}}" method="POST" class="form-inline">
            <a href="{{url('/usersmostrar/'.$user->id)}}" class="btn btn-info" style="width:25px;height:25px;margin:1px"><span class="far fa-eye fa-sm" style="float:left;margin-left:-8px"></span></a>
            <a href="{{URL::action('UsersController@edit', $user->id)}}" class="btn btn-primary" style="width:25px;height:25px;margin:1px"><span class="far fa-edit fa-sm" style="float:left;margin-left:-8px"></span></a>
             <br>
          <button type="submit" class="btn btn-danger" style="width:25px;height:25px"><span class="fas fa-trash fa-sm" style="float:left;margin-left:-8px"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
         </button>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
      <a href="{{ url('/adminhome')}}" class="btn btn-default">Volver a home</a>
     </div>
     </div>
     </div>
</div>

   {!! $users->render() !!}

@endsection