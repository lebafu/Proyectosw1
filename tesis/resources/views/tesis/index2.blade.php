@extends("layouts.app")



@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">-->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Solicitudes de tesis')}}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <!--<th>Profesor Guia</th>-->
          <th>Tipo</th>
          <th>Fecha Peticion</th>
          <th>Acción</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          @if($tesis->profesor_guia==$user->name and ($tesis->estado1==1 or $tesis->estado1==2 or ($tesis->estado1==3 and $tesis->estado2==1)) or $tesis->estado1==5)
          <td>{{$tesis->id_pk}}</td>
          @if($tesis->nombre_completo2!=null)
          <td>{{$tesis->nombre_completo}} y {{$tesis->nombre_completo2}}</td>
          @else
            <td>{{$tesis->nombre_completo}}</td>
          @endif
          <!--<td>{{$tesis->profesor_guia}}</td>-->
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}</td>
          <td>
              <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST" class="form-inline">
         <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info" style="width:25px; height:25px"><span class="far fa-eye  fa-xs" style="float:left;margin-left:-8px"></span></a>
            <a href="{{url('/tesis_profesor/'.$tesis->id_pk)}}" class="btn btn-primary" style="width:25px; height:25px"><span class="far fa-edit fa-xs" style="float:left;margin-left:-8px"></span></a>
    
            <a href="{{url('/tesis_profesor_evaluar/'.$tesis->id_pk)}}" class="btn btn-info" style="width:25px; height:25px"><span class="fas fa-check fa-xs" style="float:left;margin-left:-8px"></span></a> 
           
          <button type="submit" class="btn btn-danger"><span class="fas fa-trash" style="float:left;margin-left:-8px"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button>
        </div>

          <!--<div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">remove_red_eye
</i></a>
            <a href="{{url('/tesis_profesor/'.$tesis->id_pk)}}" class="btn btn-primary"><i class="material-icons">create</i></a>
    
            <a href="{{url('/tesis_profesor_evaluar/'.$tesis->id_pk)}}" class="btn btn-info"><i class="material-icons">done</i></a> 
           <form action="{{ route('tesis.destroy', $tesis->id_pk)}}" method="POST">
          <button type="submit" class="btn btn-danger"><i class="material-icons">delete_outline</i>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button>
        </div>-->
      </td>
        </tr>
        @endif
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     @if($user->director_escuela==1)
     <a href="/director_escuelahome" class="btn btn-default">Volver a home</a>
     @endif
     @if($user->director_escuela==0)
     <a href="/profesorhome" class="btn btn-default">Volver a home</a>
     @endif
     </div>
</div>

   
{!! $tesistas->render() !!}
@endsection