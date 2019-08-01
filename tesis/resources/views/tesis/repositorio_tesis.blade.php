@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Repositorio de Tesis') }}</div>
          <div class="card-body">

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

  <script>
    
    $(document).ready(function(){
      window.print();
    })
  </script>

{!! $tesis->render() !!}
@endsection