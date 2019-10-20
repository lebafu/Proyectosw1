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
     border: 3px solid #000000;
     background: #FFFFFF;
}</style>
 
	<div class="container">
		<div class="row">
			<div>
				<img align="left" src="{{asset('/images/logoucm.png')}}" width="300" height="125">
			</div>
			<div>
				<div align="center" style="margin-top:100px">FACULTAD DE CIENCIAS DE LA INGENIERÍA</div>
				<u align="center" style="">ESCUELA {{$revision->escuela1}}</u>
			</div>
			<div align="right" style="margin-bottom: 100px; margin-top: 20px">
			<b> MEMORÁNDUM {{$revision->nombre_memorandum}} DE TESIS N°{{$num_memo}}/{{$year}}</b>
			<div>
		</div>

		<!--Para cada uno de los siguientes textos se hará una fila-->
		<div class="container">
			<div class="row">
				<b> A            </b>
				<div align="center" style="margin-left: 100px">
						<b> :</b>
				</div>
			</div>
		</div>
	
		<div class="container">
			<div class="row">
				<b> DE            </b>
				<div align="center" style="margin-left: 90px">
						<b> :</b>
				</div>
				<div align="center" style="margin-left: 65px">
						<div>{{$nombre_coordinador}}</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row" >
				<b > REF           </b>
				<div align="center" style="margin-left: 85px">
						<b> :</b>
				</div>
				<div align="center" style="margin-left: 63px">
						<div>Envia Tesis a revisión
						@if($tesis->nombre_completo!=null)
								@if($sexo1=="Masculino")
									del Sr.
								@endif
								@if($sexo1=="Femenino")
									de la Srta.
								@endif		
								{{$tesis->nombre_completo}}				
						@endif
						@if($tesis->nombre_completo2!=null)
								@if($sexo2=="Masculino")
								y del Sr.
								@endif
								@if($sexo2=="Femenino")
								y de la	Srta.
								@endif
								{{$tesis->nombre_completo2}}	
						@endif
						 </div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<b>FECHA</b>
				<div align="center" style="margin-left: 63px">
						<b> :</b>
				</div>
				<div align="center" style="margin-left: 63px;margin-bottom: 100px">
						<div>TALCA,{{$dia_fecha}} {{$mes_fecha}} del {{$year}}</div>
				</div>
			</div>
		</div>

		<div align="left">
			
			<div align=justify style="margin-bottom: 100px">
			<p align="left">{{$revision->texto1}}<b>"{{$tesis->nombre_tesis}}"</b>.
				@if($tesis->nombre_completo!=null and $tesis->nombre_completo2!=null)
					De los alumnos
					@if($tesis->nombre_completo!=null)
								@if($sexo1=="Masculino")
								  el Sr.
								@endif
								@if($sexo1=="Femenino")
								 De la Srta.
								@endif		
								{{$tesis->nombre_completo}}
								Rut:{{$tesis->rut}}.								
						@endif
						@if($tesis->nombre_completo2!=null)
								@if($sexo2=="Masculino")
								 y el Sr.
								@endif
								@if($sexo2=="Femenino")
								 y la Srta.
								@endif
								{{$tesis->nombre_completo2}}
								Rut:{{$tesis->rut2}}.			
						@endif
			@endif
			@if($tesis->nombre_completo!=null and $tesis->nombre_completo2==null)
						Del alumno
								@if($sexo1=="Masculino")
								  el Sr.
								@endif
								@if($sexo1=="Femenino")
								 de la Srta.
								@endif		
								{{$tesis->nombre_completo}}
								Rut:{{$tesis->rut}}.									
						

			@endif
			{{$revision->texto2}}(fecha){{$revision->texto3}}{{$tesis->profesor_guia}}.
			</p>
			</div>
			<div align="left" style="margin-bottom: 30px; margin-top: 30px">{{$revision->texto4}}</div>



			<!--@if($tesis->nombre_completo!=null and $tesis->nombre_completo2!=null)
					<div>De los alumnos
					@if($tesis->nombre_completo!=null)
								@if($sexo1=="Masculino")
								  el Sr.
								@endif
								@if($sexo1=="Femenino")
								 De la Srta.
								@endif		
								{{$tesis->nombre_completo}}								
						@endif
						@if($tesis->nombre_completo2!=null)
								@if($sexo2=="Masculino")
								 y el Sr.
								@endif
								@if($sexo2=="Femenino")
								 y la Srta.
								@endif
								{{$tesis->nombre_completo2}}	
						@endif
			@endif-->
				

			</div>


		
			<div class="row" style="margin-top:60px">
				<div class="col-12">
					<h6 align="right">{{$nombre_coordinador}}<h6>
				</div>
				<div class="col-12">
					<h6 align="right">Coordinador Tesis y Memorias<h6>
				</div>
				<div class="col-12">
					<h6 align="right">Escuela {{$revision->escuela}}<h6>
				</div>
			</div>


	<script>
		
		$(document).ready(function(){
			window.print();
		})
	</script>

</body>
</html>