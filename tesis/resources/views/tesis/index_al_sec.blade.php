@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
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
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Constancia_ex</th>
          <th>Acta examen</th>
          <th>Subir acta</th>
          <th>Nota</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
           <td>{{$tesis->tipo}}</td>
            @if($tesis->constancia_ex!=null)
           <td><a href="{{ route('verPDF', ['id' => $tesis->id]) }}" class="btn btn-simple btn-primary btn-icon edit"><i class="material-icons">Ver constancia de examen</i></a></td>
           @else
             <td>Debe subir informe</td>
            @endif
            @if($tesis->constancia_ex==null)
            <td>Operacion no disponible</td>
            @else
              <td><a class="btn btn-primary" href="{{url('/acta_examen/'.$tesis->id)}}" id="descargaPDF" ><span class="fa fa-print"> </span>Generar Acta</a></td>
           @endif
               @if($tesis->acta_ex==null and $tesis->fecha_inscripcion!=null)
              <td><a class="btn btn-primary" href="{{url('/vista_subir_acta/'.$tesis->id)}}">Subir acta alumno</a></td>
            @elseif($tesis->acta_ex!=null)
                <td><a href="{{ route('verPDF_acta', ['id' => $tesis->id]) }}" class="btn btn-simple btn-primary btn-icon edit"><i class="material-icons">Ver acta</i></a></td>
                @else
                <td>Faltan pasos por completar.</td>
            @endif
           @if($tesis->constancia_ex!=null and $tesis->acta_ex!=null and $tesis->nota_tesis==null)
                <td><a class="btn btn-primary" href="{{url('/ingresar_nota_tesis/'.$tesis->id)}}">Ingresar nota</a></td>
            @elseif($tesis->nota_tesis!=null)
            <td>{{$tesis->nota_tesis}}</td>
            @else      
              <td>Aun no expone</td>
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

  

