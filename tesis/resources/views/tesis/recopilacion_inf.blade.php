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
				<img align="center" src="{{asset('/images/logoucm.png')}}" width="300" height="125">
			</div>
			<div>
				<h1 align="left" style="margin-bottom: 10px; margin-top:140px">Recopilación Información Titulados</h1>
			</div>
		</div>
		
		<h4 style="margin-bottom: 40px; margin-top: 30px">El presente formulario,tiene por objetivo recopilar información para mantener contacto con sus ex-alumnos y orientar así las politicas y beneficios de acuerdo a sus necesidades. </h4>

		<h4 style="margin-top:40px">Nombre: {{$tes->nombre_completo}} </h4>
		<h4 style="margin-top:40px">RUT: {{$tes->rut}} </h4>
		<h4 style="margin-top:40px">Titulo:{{$tes->titulo}}</h4>
		<h4 style="margin-top:40px">Email Personal:{{$tes->email}}</h4>
		<h4 style="margin-top:40px">N°Telefono Celular: {{$tes->telefono_celular}}</h4>
		<h4 style="margin-top:40px">N°Telefono Fijo: {{$tes->telefono_fijo}}</h4>
		<h4 style="margin-top:40px">Facebook:{{$tes->facebook}}</h4>
		<h4 style="margin-top:40px">Direccion Actual:{{$tes->direccion_actual}}</h4>
		<h4 style="margin-top:40px">Año Ingreso:{{$tes->ano_ingreso}}</h4>
		<h4>**Se considera la fecha de ingreso a partir de Marzo del año ingresado.**<h4>
		<h4 style="margin-top:40px">Año Egreso:{{$tes->ano_egreso}}</h4>
		<h4 style="margin-top:40px">Fecha Examen Titulo:{{$tes->fecha_presentacion_tesis}}</h4>
		<h4 style="margin-top:40px">Titulo Tesis o Memoria:{{$tes->tipo}}</h4>
		<h4 style="margin-top:40px">Profesor Guia:{{$tes->profesor_guia}}</h4>
		@endforeach		

	
	<script>
		
		$(document).ready(function(){
			window.print();
		})
	</script>

</body>
</html>