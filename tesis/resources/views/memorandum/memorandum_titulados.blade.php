<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body> 
	<div class="container">
		<div class="row">
			<div>
				<img align="left" src="{{asset('/images/logoucm.png')}}" width="300" height="125">
			</div>
			<h3>
				<div align="center" style="margin-top:100px">FACULTAD DE CIENCIAS DE LA INGENIERÍA</div>
				<u align="center" style="">ESCUELA {{$revision->escuela1}}</u>
				</div>
			</h3>
			<h3>
			<div align="right" style="margin-bottom: 100px; margin-top: 20px">
			<b> MEMORÁNDUM {{$memo->nombre_memorandum}} DE TESIS N°{{$num_memo}}/{{$year}}</b>
			<div>
			</h3>
		</div>

		<!--Para cada uno de los siguientes textos se hará una fila-->
		<h4>
		<div class="container">
			<div class="row">
				<b> A            </b>
				<div align="center" style="margin-left: 100px">
						<b> :</b>
				</div>
				<div align="center" style="margin-left: 65px">
						@if($grado_director_tesis=="Dr." and $coordinador->sexo=="Femenino")
							<b>{{Dra. $grado_director_tesis}}</b>
						@endif
						<b>{{$profe_comision->grado_academico}}{{$profe_comision->name}}</b>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div align="center" style="margin-left: 87px">
				</div>
				<div align="center" style="margin-left: 100px">
					<h5>Profesor Comisión</h5>
				</div>
			</div>
		</div>
	
		<div class="container">
			<div class="row">
				<b> DE            </b>
				<div align="center" style="margin-left: 87px">
						<b> :</b>
				</div>
				<div align="center" style="margin-left: 65px">
						@if($grado_director_tesis=="Dr." and $coordinador->sexo=="Femenino")
							<b>{{Dra. $grado_director_tesis}}</b>
						@endif
						<b>{{$grado_director_tesis->grado_academico}}{{$nombre_coordinador}}</b>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div align="center" style="margin-left: 87px">
				</div>
				<div align="center" style="margin-left: 100px">
					<h5>Coordinador de Tesis y Memorias</h5>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row" >
				<b > REF           </b>
				<div align="center" style="margin-left: 78px">
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
				<div align="center" style="margin-left: 45px">
						<b> :</b>
				</div>
				<div align="center" style="margin-left: 63px">
						<div>TALCA,{{$dia_fecha}} {{$mes_fecha}} del {{$year}}</div>
				</div>
			</div>
		</div>
	</h4>