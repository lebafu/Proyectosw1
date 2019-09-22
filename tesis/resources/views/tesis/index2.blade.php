@extends("theme.$theme.layout")



@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Solicitudes de tesis')}}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
        </tr>
        @foreach ($tesistas as $tesis)
        <tr>
          @if($tesis->profesor_guia==$user->name and ($tesis->estado1==1 or $tesis->estado1==2 or ($tesis->estado1==3 and $tesis->estado2==1)) or $tesis->estado1==5)
          <td>{{$tesis->id}}</td>
          <td>1-{{$tesis->nombre_completo}}  {{$tesis->nombre_completo2}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}</td>
          <td>

           <div class="row">
            <a href="{{url('/tesismostrar/'.$tesis->id)}}" class="btn btn-info"><span class="far fa-eye"></span></a>
            <a href="{{url('/tesis_profesor/'.$tesis->id)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
    
            <a href="{{url('/tesis_profesor_evaluar/'.$tesis->id)}}" class="btn btn-info"><span class="fas fa-check"></span></a> 
           <form action="{{ route('tesis.destroy', $tesis->id)}}" method="POST">
          <button type="submit" class="btn btn-danger"><span class="fas fa-trash"></span>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
          </button>
        </div>
      </td>
        </tr>
        @endif
        @endforeach
     </table>
     </div>
     </div>
     </div>
     </div>
     <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
     </div>
</div>

   
{!! $tesistas->render() !!}
@endsection