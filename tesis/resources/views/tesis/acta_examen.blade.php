<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  	 @foreach ($tesis as $tes)
	<div class="container">

		<h1 align="center" style="margin-bottom: 40px; margin-top: 30px"> ACTA EXAMEN DE TITULO</h1>
		<h2 align="center" style="margin-bottom: 40px; margin-top: 30px"> {{$tes->carrera}} </h2>


		<h4 style="margin-bottom: 40px; margin-top: 30px">En Talca  el dia  , se constituyó la comision Evaluadora compuesta por los señores academicos:</h4>
		<h4></h4>
		
		<h4>{{$tes->profesor1_comision}}</h4>
		<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->profesor2_comision}}</h4>
		@if($tes->profesor3_comision=="Ninguno")

		@else	
			<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->profesor3_comision}}</h4>
		@endif

			
			

			<h4>Profesor Guia:</h4>
			<h4>{{$tes->profesor_guia}}</h4>
		<h4>Para evaluar la Exposición y Defensa del examen de titulo denominado:</h4>
		
		<h4>Tema:"{{$tes->nombre_tesis}}"</h4>


		<table class="table table-bordered">
        <tr>
         
          <th>ID</th>
          <th>Nombre Estudiante</th>
          <th>Profesor Guia</th>
          <th>Tipo Trabajo</th>
          <th>Carrera<th>
        </tr>
      
        <tr>
          <td>{{$tes->id}}</td>
          <td>{{$tes->nombre_completo}}</td>
          <td>{{$tes->profesor_guia}}</td>
         <td>{{$tes->tipo}}</td>
         <td>{{$tes->carrera}}</td>
          </tr>

        
     </table>
	@endforeach
	<script>
		
		$(document).ready(function(){
			window.print();
		})
	</script>

</body>
</html>