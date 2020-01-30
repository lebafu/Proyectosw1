@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-16">
      <div class="card">
        <div class="card-header">{{ __('Tesis inscritas') }}</div>
          <div class="card-body">
             {{ Form::open(['route' => 'tesis.index_al_sec', 'method'=>'GET','class'=>'form-inline pull-right'])}}
            <div class="form-group">
            {{Form::text('nombre_completo',null,['class'=>'form-control','placeholder' => 'Autor'])}}
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
 <table class="table table-bordered">
        <tr>
         
          <th>ID</th>
          <th>Estudiante(s)</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Constancia ex</th>
          <th>Revision</th>
          <th>Fecha Ex</th>
          <th>Acta examen</th>
          <th>Subir acta</th>
          <th>Nota</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id_pk}}</td>
          @if($tesis->nombre_completo2!=null)
          <td>{{$tesis->nombre_completo}} y {{$tesis->nombre_completo2}}</td>
          @else
          <td>{{$tesis->nombre_completo}}</td>
          @endif
          <td>{{$tesis->profesor_guia}}</td>
           <td>{{$tesis->tipo}}</td>
            @if($tesis->constancia_ex!=null)
           <td><a href="{{ route('verPDF', ['id' => $tesis->id_pk]) }}" class="btn btn-simple btn-primary btn-sm"><span class="far fa-eye fa-sm"></span></a></a></td>
           <td><a href="{{url('tesis/create_num_memo'.$tesis->id_pk) }}" class="btn btn-simple btn-primary btn-sm">Memo</a></td>
           <td><a href="{{url('/fecha_presentacion/'.$tesis->id_pk)}}" class="btn btn-primary btn-sm">Presentación
           </a></td>
           @else
             <td></td>
            @endif
            @if($tesis->constancia_ex==null)
            <td></td>
            <td></td>
            <td></td>
            @else
              <td><a class="btn btn-primary btn-sm" href="{{url('/acta_examen/'.$tesis->id_pk)}}" id="#descargaPDF" ><span class="fa fa-print"> </span>Acta</a></td>
           @endif
               @if($tesis->acta_ex==null and $tesis->fecha_inscripcion!=null)
              <td><a class="btn btn-primary btn-sm" href="{{url('/vista_subir_acta/'.$tesis->id_pk)}}">Subir acta</a></td>
            @elseif($tesis->acta_ex!=null)
                <td><a href="{{ route('verPDF_acta', ['id' => $tesis->id_pk]) }}" class="btn btn-primary btn-sm"><span class="far fa-eye fa-sm"></span></a></a></td>
                @else
                <td>Faltan pasos por completar.</td>
            @endif
           @if($tesis->constancia_ex!=null and $tesis->acta_ex!=null and $tesis->nota_tesis==null)
                <td><a class="btn btn-primary btn-sm" href="{{url('/ingresar_nota_tesis/'.$tesis->id_pk)}}" target="_blank">Ingresar nota</a></td>
            @elseif($tesis->nota_tesis!=null)
            <td>{{$tesis->nota_tesis}}</td>
            @else      
              <td></td>
           @endif
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

  

