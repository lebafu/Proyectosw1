@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Informacion detallada de Tesis') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
           <b>Autor:</b> <!--Con <b></b> se pone la letra en negrita en html-->
           <p>{{$tes->nombre_completo}}</p>
           <b>Profesor Guia:</b>
           <p>{{$tes->profesor_guia}}</p>
           <b>Abstract:</b>
           <p>{{$tes->abstract}}</p>
           @if($tes->publicar==1)
           <b>Documento PDF</b>
           <p><a href="{{ route('verPDF', ['id' => $tes->id]) }}" class="btn btn-info"><span class="fa fa-print"></span>Ver PDF</a></p>
           @else
            <b>Documento PDF sin permisos para descargar</b>
           @endif
        </tr>
     </table>
     </div>
     </div>
     </div>
    </div>
     </div>
</div>

 <a href="{{ url('/home') }}" class="btn btn-default">Volver a repositorio</a> 


@endsection