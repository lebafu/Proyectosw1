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

		@if($tes->profesor1_externo==null)

		@else	
			<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->profesor1_externo}}</h4>
		@endif

		@if($tes->profe2_externo==null)

		@else	
			<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->profe2_externo}}</h4>
		@endif


			
			

			<h4>Profesor Guia:</h4>
			<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->profesor_guia}}</h4>

		<h4 style="margin-bottom: 40px; margin-top: 30px" >Para evaluar la Exposición y Defensa del examen de titulo denominado:</h4>
		
		<h4 style="margin-bottom: 40px; margin-top: 30px">Tema:"{{$tes->nombre_tesis}}"</h4>

		<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->nombre_completo}}   {{$tes->rut}}<h4>

		<h4>Realizada la exposición se concluye que la nota final de la exposicion es:</h4>


		<h4>......................................................................... Nota: </h4>
		<h4>{{$tes->profesor_guia}}</h4>  

		<h4  style="margin-bottom: 40px; margin-top: 30px"></h4>
		<h4>..........................................................................Nota:</h4>
		<h4>{{$tes->profesor1_comision}}</h4>

		<h4  style="margin-bottom: 40px; margin-top: 30px"></h4>
		<h4>..........................................................................Nota:</h4>
		<h4>{{$tes->profesor2_comision}}</h4>

		@if($tes->profesor3_comision!="Ninguno")
		<h4  style="margin-bottom: 40px; margin-top: 30px"></h4>
		<h4>..........................................................................Nota:</h4>
		@endif

		@if($tes->profesor1_externo!=null)
		<h4  style="margin-bottom: 40px; margin-top: 30px"></h4>
		<h4>..........................................................................Nota:</h4>
		<h4>{{$tes->profesor1_externo}}</h4>
		@endif
		
		@if($tes->profe2_externo!=null)
		<h4  style="margin-bottom: 40px; margin-top: 30px"></h4>
		<h4>..........................................................................Nota:</h4>
		<h4>{{$tes->profe2_externo}}</h4>
		@endif
	@endforeach
	<script>
		
		$(document).ready(function(){
			window.print();
		})
	</script>

</body>
</html>