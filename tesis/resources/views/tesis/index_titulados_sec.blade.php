@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Titulados') }}</div>
          <div class="card-body">
            <div class="form-group">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
 <table class="table table-bordered">
        <tr>
         
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td><a class="btn btn-primary" href="{{url('/recopilacion_inf/'.$tesis->id)}}" id="descargaPDF" ><span class="fa fa-print"> </span>Recopilacion Informacion</a></td>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
            <a href="{{ url('secretariahome') }}" class="btn btn-default">Volver a home</a>
     </div>
</div>



{!! $tesistas->render() !!}
@endsection

  
