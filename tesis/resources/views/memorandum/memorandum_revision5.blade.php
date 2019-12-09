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
			<b> MEMORÁNDUM {{$revision->nombre_memorandum}} DE TESIS N°{{$num_memo}}/{{$year}}</b>
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
						@if($comision->profe2_grado_academico=="Dr." and $comision->sexo2=="Femenino")
							<b>{{Dra. $comision_profe2_externo}}</b>
						@endif
						<b>{{$comision->profe2_grado_academico}}{{$comision->profe2_externo}}</b>
				</div>
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
						<div align="left" style="margin-left:0px">
						@if($tesis->nombre_completo2!=null)
								@if($sexo2=="Masculino")
								y del Sr.
								@endif
								@if($sexo2=="Femenino")
								y de la	Srta.
								@endif
								{{$tesis->nombre_completo2}}.
						@endif
				</div>
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

		<div align="left">__________________________________________________________________________________________________________________________________________________________________________________________</div>

		<div align="left">
		@if($comision->sexo2=="Masculino")
		    <h4 style="margin-bottom: 100px; margin-top:30px">Estimado Docente:</h4>
		@endif	
		@if($comision->sexo2=="Femenino")
				<h4 style="margin-bottom: 100px; margin-top:30px">Estimada Docente:</h4>
		@endif
			</div>

			<div align=justify style="margin-bottom: 100px; margin-top:100px">
			<h4><p align="left">{{$revision->texto1}}<b>"{{$tesis->nombre_tesis}}"</b>.
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
			{{$revision->texto2}}({{$fecha->day}}/{{$fecha->month}}/{{$fecha->year}}){{$revision->texto3}}
					@if($sexo_profe_guia=="Femenino" and $profesor_guia->grado_academico=="Dr.")
					Dra.{{$tesis->profesor_guia}}.
					@else
					Dr.{{$tesis->profesor_guia}}.
					@endif
			</h4></p>
			</div>

			<h4>
			<div align="left" style="margin-bottom: 300px; margin-top: 30px">{{$revision->texto4}}</div>
			</h4>

			

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
				

			


			<div class="row" style="margin-top:60px">
				<div class="col-12">
					<h6 align="left">____________________________________</h6>
					<div style="margin-left:900px">
					<b>{{$grado_director_tesis->grado_academico}}{{$nombre_coordinador}}</b>
					</div>
				</div>
			</div>

			<div class="row" style="margin-top:0px">
			<div class="col-12">
					<div style="margin-left:0px">Recepción Prof. Comisión</div>
					<div style="margin-left:900px">
					<b>Coordinador de Tesis y Memorias</b>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div style="margin-left:900px">
						<b>Escuela {{$revision->escuela}}</b>
					</div>
					<div style="margin-left:0px">{{$iniciales_coordinador[0]}}{{$iniciales_coordinador[1]}}{{$iniciales_coordinador[2]}}{{$iniciales_coordinador[3]}}/bcsm
				  </div>
				 </div>
			</div>

			<div class="row">
				<div class="col-12">
					<div align="left">c.c.:-Archivo<div>
					
				</div>
			</div>
				


	<script>
		$(document).ready(function(){
			window.print();
		})
		
	</script>

</body>
</html>