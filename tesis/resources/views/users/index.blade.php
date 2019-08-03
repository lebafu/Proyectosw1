@extends('layouts.app')



@section('content')

<!--link para usar gliphycons de bootstrap-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
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

            <a href="{{url('/usersmostrar/'.$user->id)}}" type= button class="btn-btn-info"><span class="glyphicon glyphicon-eye-open"></span></a> 
            <br>
            <a href="{{URL::action('UsersController@edit', $user->id)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
             <br>
           <form action="{{ route('users.destroy', $user->id)}}" method="POST">
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

   {!! $users->render() !!}

@endsection