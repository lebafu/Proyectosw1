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
          <th>Nombre</th>
        </tr>
        @foreach ($areaT as $area_tesis)
        <tr>
          <td>{{$area_tesis->area_tesis}}</td>
          <td>

            <a href="{{url('/area_tesismostrar/'.$area_tesis->area_tesis)}}" class="btn btn-info"><span class="far fa-eye"></span></a> 
            <br>
            <a href="{{URL::action('Area_tesisController@edit', $area_tesis->area_tesis)}}" class="btn btn-primary"><span class="far fa-edit"></span></a>
             <br>
           <form action="{{ route('area_tesis.destroy', $area_tesis->area_tesis)}}" method="POST">
          <button type="submit" class="btn btn-danger"><span class="fas fa-trash"></span>
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
     </div>
     </div>
     </div>
</div>

   {!! $areaT->render() !!}

@endsection