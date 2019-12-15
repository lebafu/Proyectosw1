@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12"> <!--Con 12 se ocupa todo el ancho de la pantalla-->
      <div class="card">
        <div class="card-header">{{ __('Capitulos') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
      @foreach ($tesistas as $tesis)
        <tr>
          <th>cap1</th>
          <th>cap2</th>
           @if($tesis->cap3!=null)
         <th>cap3</th>
         @endif
          @if($tesis->cap4!=null)
         <th>cap4</th>
         @endif
         @if($tesis->cap5!=null)
          <th>cap5</th>
          @endif
          @if($tesis->cap6!=null)
         <th>cap6</th>
         @endif
         <th>Fecha</th>
        </tr>
      @endforeach
        @foreach ($tesistas as $tesis)
        <tr>
          <td>{{$tesis->cap1}}</td>
          <td>{{$tesis->cap2}}</td>
          @if($tesis->cap3!=null)
          <td>{{$tesis->cap3}}</td>
          @endif
          @if($tesis->cap4!=null){
          <td>{{$tesis->cap4}}</td>
          @endif
          @if($tesis->cap5!=null){
          <td>{{$tesis->cap5}}</td>
          @endif
          @if($tesis->cap6!=null){
          <td>{{$tesis->cap6}}</td>
          @endif
          <td>{{$tesis->fecha}}</td>
            @if($user->tipo_usuario==2)
         <td><a href="{{URL::action('BitacoraController@edit', $tesis->id)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
         <form action="{{ route('bitacora.destroy', $tesis->id)}}" method="POST">
          <button type="submit" class="btn btn-danger"><span class="fas fa-trash"></span>
          
           {{ method_field('DELETE') }}
           {{ csrf_field() }}

            </button>
           </form>
         </td>
         @endif
        </tr>
        @endforeach
      </table>
</div>
</div>
@if($user->tipo_usuario==2)
<td><a href="{{url('/capitulos_tesis/create'.$id)}}" class="fas fa-plus"></a></td>
@endif
</div>
</div>
</div>
{!! $tesistas->render() !!}
@endsection