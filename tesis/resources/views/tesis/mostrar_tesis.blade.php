@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Informacion detalladaa de Tesis') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
           <b>Autor:</b>
           <p>{{$tes->nombre_completo}}</p>
           <b>Profesor Guia:</b>
           <p>{{$tes->profesor_guia}}</p>
           <b>Abstract:</b>
           <p>{{$tes->abstract}}</p>
           <b>Documento PDF</b>
           <p><a href="{{ route('verPDF', ['id' => $tes->id]) }}" class="btn btn-simple btn-primary btn-icon edit">Ver PDF</a></p>
        </tr>
     </table>
     </div>
     </div>
     </div>
     </div>
     </div>
</div>




@endsection