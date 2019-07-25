@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Tesis del alumno') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
          <th>Estado</th>
          <th>Nota Pendiente</th>
          <th>Nota Prorroga</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          @if($tesis->nombre_completo==$user->name)
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}}</td>
           <td>
          @if($tesis->estado1!=4 and $tesis->estado1!=5)
              En espera
          @endif
          @if($tesis->estado1==4)
              Inscrita
           @endif  
           @if($tesis->estado1==5)
                Rechazada
           @endif
           @if($tesis->nota_pendiente!=null and $tesis->nota_prorroga==null)
           <td>{{$tesis->nota_pendiente}}</td>
           <td><a href="{{url('/pedir_nota_prorroga/'.$tesis->id)}}">Pedir nota Prorroga</a></td>
         @endif
          @if($tesis->nota_pendiente==null and $tesis->estado1==4 and $tesis->nota_prorroga==null)
          <td>
            <a href="{{url('/pedir_nota_pendiente/'.$tesis->id)}}">Pedir nota Pendiente</a>
          </td>
          <td> </td>
          @endif
          @if($tesis->nota_pendiente==null and $tesis->estado1!=4 and $tesis->nota_prorroga==null)
          <td>  </td>
          <td>  </td>
          @endif
          @if($tesis->nota_prorroga!=null and $tesis->nota_pendiente!=null)
         <td>{{$tesis->nota_pendiente}}</td>
          <td>{{$tesis->nota_prorroga}}</td>
          <td><a href="{{url('/pedir_nota_prorroga/'.$tesis->id)}}">Pedir nueva nota de Prorroga</a></td>
         @endif
      <td>
            <a href="{{url('/tesismostrar/'.$tesis->id)}}"  type= button class="btn-btn-info"><span class="glyphicon glyphicon-eye-open"></span>Ver detalles</a> 
            <br> 
            <a href="{{URL::action('TesisController@edit', $tesis->id)}}" class="btn btn-primary"><span class="far fa-edit"></span>Editar</a>
            <br>
           <form action="{{ route('tesis.destroy', $tesis->id)}}" method="POST">
          <button type="submit" class="btn btn-danger"><span class="fas fa-trash">Eliminar</span>
            
            <br>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}


           </form>
      </td>
        </tr>
        @endif
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     </div>
</div>

  

@endsection