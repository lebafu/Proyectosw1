@extends('layouts.app')



@section('content')
<head>
  <title>TESIS CON NOTAS PRORROGAS VENCIDAS SIN INTERVALOS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>


<div class="container">
 <h4 align="center" style="margin-bottom: 40px; margin-top: 30px">Notas prorrogas vencidas sin intervalos</h4>
    <th>A dia de hoy</th>

    <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Fecha Peticion</th>
          <th>Nota prorroga</th>
        </tr>
        @foreach ($notas_prorrogas_vencidas as $tesis)
        <tr>
          <td>{{$tesis->id}}</td>
          <td>{{$tesis->nombre_completo}}</td>
          <td>{{$tesis->profesor_guia}}</td>
          <td>{{$tesis->tipo}}</td>
          <td>{{$tesis->fecha_peticion}}}</td>
          <td>{{$tesis->nota_prorroga}}</td>
          <td>

          
              </div>
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


 
 <script>
    
    $(document).ready(function(){
      window.print();
    })
  </script>


@endsection