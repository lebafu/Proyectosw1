@extends('layouts.app')



@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Repositorio de Tesis') }}</div>
          <div class="card-body">
          {{ Form::open(['route' => 'repositorio_tesis', 'method'=>'GET','class'=>'form-inline pull-right'])}}
          <div class="form-group">
            {{Form::text('nombre_completo',null,['class'=>'form-control','placeholder' => 'Autor'])}}
          </div>
          {{ Form::open(['route' => 'repositorio_tesis', 'method'=>'GET','class'=>'form-inline pull-right'])}}
          <div class="form-group">
            {{Form::text('nombre_tesis',null,['class'=>'form-control','placeholder' => 'Titulo'])}}
          </div>
            {{ Form::open(['route' => 'repositorio_tesis', 'method'=>'GET','class'=>'form-inline pull-right'])}}
             <div class="form-group">
            {{Form::text('abstract',null,['class'=>'form-control','placeholder' => 'Abstract'])}}
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
          {{Form::close()}}
    <table class="table table-bordered">
        @foreach($tesis as $tes)
        <tr>
           <p><a href="{{url('/mostrar_tesis/' .$tes->id)}}">{{$tes->nombre_tesis}}</a></p>
           <p>{{$tes->nombre_completo}}</p>
           <p>{{$tes->abstract_res}}</p>
           <p><a href="{{ route('verPDF', ['id' => $tes->id]) }}" class="btn btn-simple btn-primary btn-icon edit">Ver PDF</a></p>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     </div>
</div>

    
 


{!! $tesis->render() !!}
@endsection