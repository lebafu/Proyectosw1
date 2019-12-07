<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body> <!-- Rectangulo nota final-->
	<style type="text/css"> 
	.cuadrado{
     width: 80px;      
     height: 40px; 
     border: 3px solid #000000;
     background: #FFFFFF;
}</style>
  	 @foreach ($tesis as $tes)
	<div class="container">
		<div class="row">
			<div>
				<img align="left" src="{{asset('/images/logoucm.png')}}" width="300" height="125">
			</div>
			<div>
				<h5 align="center" style="margin-top:100px">FACULTAD DE CIENCIAS DE LA INGENIERÍA</h5>
				<h5 align="center" style="">ESCUELA INGENIERÍA CIVIL INFORMÁTICA</h5>
			</div>
		</div>
		<h3 align="center" style="margin-bottom: 20px; margin-top: 30px"> ACTA EXÁMEN DE TÍTULO</h3>
		<h3 align="center" style="margin-bottom: 20px; margin-top: 20px"> {{$tes->carrera}} </h3>
		<h4 style="margin-bottom: 40px; margin-top: 30px">		En Talca, a las {{$hora_presentacion_tesis}} horas del dia {{$nombre_dia}} {{$dia_fecha}} de {{$mes_fecha}} de {{$year_fecha}} ,se constituyó la comision Evaluadora compuesta por los Sres. Académicos:</h4>
		<h4></h4>
		
		<!--Se añaden en columna hacia abajo los profesores que participan de la comision -->
		<h4>{{$grado_profe1_com}}{{$tes->profesor1_comision}}</h4>
		<h4 style="margin-bottom: 20px; margin-top: 10px">{{$grado_profe2_com}}{{$tes->profesor2_comision}}</h4>

		<!--Debemos recordar que la comision cuenta con el profesor guia, profe1_comision, y profe2_comision como fijos, el resto pueden ser nulos o no existir-->
		@if($tes->profesor3_comision=="Ninguno")

		@else	
			<h4 style="margin-bottom: 20px; margin-top: 10px">{{$grado_profe3_com}}{{$tes->profesor3_comision}}</h4>
		@endif

		@if($tes->profesor1_externo==null)

		@else	
			<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->profesor1_grado_academico}}{{$tes->profesor1_externo}}</h4>
		@endif

		@if($tes->profe2_externo==null)

		@else	
			<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->profe2_grado_academico}}{{$tes->profe2_externo}}</h4>
		@endif


			
			

			<h4>Profesor Guia:</h4>
			<h4 style="margin-bottom: 20px; margin-top: 10px">{{$grado_profe_guia}}{{$tes->profesor_guia}}</h4>

		<!--Margin Bottom nos hace cuidar el espacio en horizontal que se deja, y margin top el espacio en vertical -->
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

 		@if($tes->nombre_completo2!=null)
		<div class="row">
			<div class="col-8">
				<h4 style="margin-bottom: 20px; margin-top: 10px">{{$tes->nombre_completo2}} </h4>
			</div>
			<div class="col-4">
				<h4 style="margin-bottom: 20px; margin-top: 10px"> {{$tes->rut2}}<h4>
			</div>
		</div>	
	    @endif
		   <!--Se usa la clase creada en la linea 9 para generar el cuadrado de texto donde se pondra la nota-->
	<div class="row">
		<h4>Realizada la exposición se concluye que la nota final de la exposición es:</h4>
		<div class="cuadrado"></div>
	</div>

		<div class="row" style="margin-top:50px" align="center">
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$grado_profe_guia}}{{$tes->profesor_guia}}</h4>  
				<h6>Profesor Guia</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$grado_profe1_com}}{{$tes->profesor1_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$grado_profe2_com}}{{$tes->profesor2_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>			
		</div>

		<div class="row" style="margin-top:50px" align="center">
			@if($grado_profe3_com!="Ninguno")
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$grado_profe3_com}}{{$tes->profesor3_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			@endif
			@if($tes->profesor1_externo!=null)
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$tes->profesor1_grado_academico}}{{$tes->profesor1_externo}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			@endif
			@if($tes->profe2_externo!=null)
			<div class="col-4">
				<h4>....................................</h4>
				<h4>{{$tes->profe2_grado_academico}}{{$tes->profe2_externo}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
			</div>
			@endif	
		</div>
		@endforeach		

			<div class="row" style="margin-top:60px">
				<div class="col-12">
					<h6 align="right">{{$director_escuela}}<h6>
				</div>
				<div class="col-11">
					<h6 align="right">Director<h6>
				</div>
				<div class="col-12">
					<h6 align="right">Escuela Ingenieria Civil Informatica<h6>
				</div>
			</div>	
	<script>
		
		$(document).ready(function(){
			window.print();
		})
	</script>

</body>
</html>