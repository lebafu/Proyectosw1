<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<style type="text/css"> 
	.cuadrado{
     width: 80px; 
     height: 40px; 
     border: 3px solid #555;
     background: #428bca;
}</style>
  	 @foreach ($tesis as $tes)
	<div class="container">
		<img= align="left" src="{{asset('/images/logoucm.png')}}">
		<h4 align="center" style="margin-botton:  30px">FACULTAD DE CIENCIAS DE LA INGENIERÍA</h4>
		<h4 align="center" style="margin-botton:  30px">ESCUELA INGENIERÍA CIVIL INFORMÁTICA</h4>


		<h2 align="center" style="margin-bottom: 30px; margin-top: 30px"> ACTA EXAMEN DE TÍTULO</h2>
		<h2 align="center" style="margin-bottom: 30px; margin-top: 30px"> {{$tes->carrera}} </h2>


		<h4 style="margin-bottom: 40px; margin-top: 30px">		En Talca  el dia  , se constituyó la comision Evaluadora compuesta por los señores academicos:</h4>
		<h4></h4>
		
		@if($tes->profesor1_comision=="Marco Toranzo" or $tes->profesor1_comision=="Sergio Hernandez" or 	$tes->profesor1_comision=="Paulo Gonzalez" or $tes->profesor1_comision=="Ricardo Barrientos" or $tes->profesor1_comision=="Marco Mora")
		<h4>Dr.{{$tes->profesor1_comision}}</h4>
		@elseif($tes->profesor1_comision=="Xaviera Lopez" or $tes->profesor1_comision=="Angelica Urrutia")
		<h4>Dra.{{$tes->profesor1_comision}}</h4>
		@elseif($tes->profesor1_comision=="Hugo Araya" or $tes->profesor1_comision=="Wladimir Soto")
		<h4>Mg.{{$tes->profesor1_comision}}</h4>
		@endif
		@if($tes->profesor2_comision=="Marco Toranzo" or $tes->profesor2_comision=="Sergio Hernandez" or $tes->profesor2_comision=="Paulo Gonzalez" or $tes->profesor2_comision=="Ricardo Barrientos" or $tes->profesor2_comision=="Marco Mora")
		<h4 style="margin-bottom: 20px; margin-top: 10px">Dr.{{$tes->profesor2_comision}}</h4>
		@elseif($tes->profesor2_comision=="Xaviera Lopez" or $tes->profesor2_comision=="Angelica Urrutia")
		<h4 style="margin-bottom: 20px; margin-top: 10px">Dra.{{$tes->profesor2_comision}}</h4>
		@elseif($tes->profesor2_comision=="Hugo Araya" or $tes->profesor2_comision=="Wladimir Soto")
		<h4 style="margin-bottom: 20px; margin-top: 10px">Dra.{{$tes->profesor2_comision}}</h4>
		@endif
		@if($tes->profesor3_comision=="Ninguno")

		@else	
			 @if($tes->profesor3_comision=="Marco Toranzo" or $tes->profesor3_comision=="Sergio Hernandez" or $tes->profesor3_comision=="Paulo Gonzalez" or $tes->profesor3_comision=="Ricardo Barrientos" or $tes->profesor3_comision=="Marco Mora")
			<h4 style="margin-bottom: 20px; margin-top: 10px">Dr.{{$tes->profesor3_comision}}</h4>
			@elseif($tes->profesor3_comision=="Xaviera Lopez" or $tes->profesor3_comision=="Angelica Urrutia")
			<h4 style="margin-bottom: 20px; margin-top: 10px">Dra.{{$tes->profesor3_comision}}</h4>
			@elseif($tes->profesor3_comision=="Hugo Araya" or $tes->profesor3_comision=="Wladimir Soto")
			<h4 style="margin-bottom: 20px; margin-top: 10px">Mg.{{$tes->profesor3_comision}}</h4>
			@endif
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
			@if($tes->profesor_guia=="Marco Toranzo" or $tes->profesor_guia=="Sergio Hernandez" or $tes->profesor_guia="Paulo Gonzalez" or $tes->profesor_guia="Ricardo Barrientos" or $tes->profesor_guia="Marco Mora")
			<h4 style="margin-bottom: 20px; margin-top: 10px">Dr.{{$tes->profesor_guia}}</h4>
			@elseif($tes->profesor_guia="Xaviera Lopez" or $tes->profesor_guia=="Angelica Urrutia")
			<h4 style="margin-bottom: 20px; margin-top: 10px">Dra.{{$tes->profesor_guia}}</h4>
			@elseif($tes->profesor_guia=="Hugo Araya" or $tes->profesor_guia="Wladimir Soto")
			<h4 style="margin-bottom: 20px; margin-top: 10px">Mg.{{$tes->profesor_guia}}</h4>
			@endif
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

		   
	<div class="row">
		<h4>Realizada la exposición se concluye que la nota final de la exposicion es:</h4>
		<div class="cuadrado"></div>
	</div>

		<div class="row" style="margin-top:50px" align="center">
			<div class="col-4">
				@if($tes->profesor_guia=="Marco Toranzo" or $tes->profesor_guia=="Sergio Hernandez" or $tes->profesor_guia="Paulo Gonzalez" or $tes->profesor_guia="Ricardo Barrientos" or $tes->profesor_guia="Marco Mora")
				<h4>....................................</h4>
				<h4>Dr. {{$tes->profesor_guia}}</h4>  
				<h6>Profesor Guia</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@elseif($tes->profesor_guia="Xaviera Lopez" or $tes->profesor_guia=="Angelica Urrutia")
				<h4>....................................</h4>
				<h4>Dra. {{$tes->profesor_guia}}</h4>  
				<h6>Profesor Guia</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@elseif($tes->profesor_guia=="Hugo Araya" or $tes->profesor_guia="Wladimir Soto")
				<h4>....................................</h4>
				<h4>Mg.{{$tes->profesor_guia}}</h4>  
				<h6>Profesor Guia</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>)
				@endif
			</div>
			<div class="col-4">
				@if($tes->profesor1_comision=="Marco Toranzo" or $tes->profesor1_comision=="Sergio Hernandez" or 	$tes->profesor1_comision=="Paulo Gonzalez" or $tes->profesor1_comision=="Ricardo Barrientos" or $tes->profesor1_comision=="Marco Mora")
				<h4>....................................</h4>
				<h4>{{$tes->profesor1_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@elseif($tes->profesor1_comision=="Xaviera Lopez" or $tes->profesor1_comision=="Angelica Urrutia")
				<h4>....................................</h4>
				<h4>Dra.{{$tes->profesor1_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@elseif($tes->profesor1_comision=="Hugo Araya" or $tes->profesor1_comision=="Wladimir Soto")
				<h4>....................................</h4>
				<h4>Mg.{{$tes->profesor1_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@endif
			</div>
			<div class="col-4">
				@if($tes->profesor2_comision=="Marco Toranzo" or $tes->profesor2_comision=="Sergio Hernandez" or $tes->profesor2_comision=="Paulo Gonzalez" or $tes->profesor2_comision=="Ricardo Barrientos" or $tes->profesor2_comision=="Marco Mora")
				<h4>....................................</h4>
				<h4>Dr.{{$tes->profesor2_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@elseif($tes->profesor2_comision=="Xaviera Lopez" or $tes->profesor2_comision=="Angelica Urrutia")
				<h4>....................................</h4>
				<h4>Dra.{{$tes->profesor2_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@elseif($tes->profesor2_comision=="Hugo Araya" or $tes->profesor2_comision=="Wladimir Soto")
				<h4>....................................</h4>
				<h4>Mg.{{$tes->profesor2_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@endif
			</div>			
		</div>

		<div class="row" style="margin-top:50px" align="center">
			<div class="col-4">
			@if($tes->profesor3_comision=="Marco Toranzo" or $tes->profesor3_comision=="Sergio Hernandez" or $tes->profesor3_comision=="Paulo Gonzalez" or $tes->profesor3_comision=="Ricardo Barrientos" or $tes->profesor3_comision=="Marco Mora")
				<h4>....................................</h4>
				<h4>Dr.{{$tes->profesor3_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@elseif($tes->profesor3_comision=="Xaviera Lopez" or $tes->profesor3_comision=="Angelica Urrutia")
				<h4>....................................</h4>
				<h4>Dra.{{$tes->profesor3_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@elseif($tes->profesor3_comision=="Hugo Araya" or $tes->profesor3_comision=="Wladimir Soto")
				<h4>....................................</h4>
				<h4>Mg.{{$tes->profesor3_comision}}</h4>
				<h6>Profesor Comision</h6>
				<h5 style="margin-top: 30px">Nota: ....... </h5>
				@endif
			</div>
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