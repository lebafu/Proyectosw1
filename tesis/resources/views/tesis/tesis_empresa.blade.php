@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Tesis relacionadas a empresa')}}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Nombre Tesis</th>
          <th>Tipo Vinculacion</th>
        </tr>
        @foreach ($tes_empresas as $tesis)
        <tr>
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->nombre_tesis}}</td>
          <td>{{$tesis->tipo_vinculacion}}</td>
          <td>
           </form>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>
     <a href="{{route('descargar_te')}}">Descargar PDF</a>
     </div>
     </div>
</div>

  {!! $tes_empresas->render() !!}
@endsection