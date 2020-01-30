@extends('layouts.app')



@section('content')

<!--link para usar gliphycons de bootstrap-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Lista de areas de Tesis') }}</div>
          <div class="card-body">

    <table class="table table-bordered">
        <tr>
          <th>Id</th>
          <th>Nombre</th>
        </tr>
        @foreach ($areaT as $area_tesis)
        <tr>
          <td>{{$area_tesis->id}}</td>
          <td>{{$area_tesis->area_tesis}}</td>
          <td>
               <form action="{{ route('area_tesis.destroy', $area_tesis->id)}}" method="POST" class="form-inline">
              <a href="{{URL::action('Area_tesisController@edit', $area_tesis->id)}}" class="btn btn-primary" style="width:25px;height:25px;margin:1px"><span class="far fa-edit fa-sm" style="float:left;margin-left:-8px"></span></a>
             <br>
          <button type="submit" class="btn btn-danger" style="width:25px;height:25px"><span class="fas fa-trash fa-sm" style="float:left;margin-left:-8px"></span>
          <br>
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           </form>
      </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     <a href="{{URL::action('Area_tesisController@create')}}" class="btn btn-primary btn-sm">Crear Area de Tesis</a>
     
     </div>
     </div>
     </div>
</div>
   <div class="row justify-content-center">
    <div class="col-md-6">
      <a href="adminhome">Volver a Home</a>
    </div>
    </div>  

   {!! $areaT->render() !!}

@endsection