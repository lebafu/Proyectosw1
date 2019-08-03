<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  	 @foreach ($tesis as $tes)
	<div class="container">

		<h4 align="center" style="margin-botton:  30px">FACULTAD DE CIENCIAS DE LA INGENIERÍA</h4>
		<h4 align="center" style="margin-botton:  30px">ESCUELA INGENIERÍA CIVIL INFORMÁTICA</h4>


		<h2 align="center" style="margin-bottom: 30px; margin-top: 30px"> ACTA EXAMEN DE TÍTULO</h2>
		<h2 align="center" style="margin-bottom: 30px; margin-top: 30px"> {{$tes->carrera}} </h2>


		<h4 style="margin-bottom: 40px; margin-top: 30px">		En Talca  el dia  , se constituyó la comision Evaluadora compuesta por los señores academicos:</h4>
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

		<h4>Para evaluar la Exposición y Defensa del examen de titulo denominado:</h4>
		
		<h4 style="margin-bottom: 40px; margin-top: 30px">Tema:"{{$tes->nombre_tesis}}"</h4>

		<div class="row">
			<div class="col-8">
				<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->nombre_completo}} </h4>
			</div>
			<div class="col-4">
				<h4 style="margin-bottom: 20px; margin-top: 10px"> {{$tes->rut}}<h4>
			</div>
		</div>	

		   

		<h4>Realizada la exposición se concluye que la nota final de la exposicion es:</h4>

		<div class="row" style="margin-top:50px" align="center">
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$tes->profesor_guia}}</h4>  
				<h6>Profesor Guia</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$tes->profesor1_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$tes->profesor2_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>			
		</div>

		<div class="row" style="margin-top:50px" align="center">
			@if($tes->profesor3_comision!="Ninguno")
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$tes->profesor3_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			@endif
			@if($tes->profesor1_externo!=null)
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$tes->profesor1_externo}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			@endif
			@if($tes->profe2_externo!=null)
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$tes->profe2_externo}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			@endif	
		</div>
		@endforeach		

			<div class="row" style="margin-top:80px">
				<div class="col-12">
					<h4 align="right">DR. PAULO GONZALEZ GUTIERREZ<h4>
				</div>
				<div class="col-11">
					<h4 align="right">Director<h4>
				</div>
				<div class="col-12">
					<h4 align="right">Escuela Ingenieria Civil Informatica<h4>
				</div>
			</div>	
	<script>
		
		$(document).ready(function(){
			window.print();
		})
	</script>

</body>
</html>