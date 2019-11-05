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
				<u align="center" style="">ESCUELA {{$memo->escuela1}}</u>
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
						@if($memo->sexo_jefe_titulos=="Masculino")
							<b>SR.{{$memo->nombre_jefe_titulo}}</b>
						@else
							<b>SRA.{{$memo->nombre_jefe_titulo}}</b>
						@endif
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div align="center" style="margin-left: 87px">
				</div>
				<div align="center" style="margin-left: 100px">
					<h5>Jefe de Títulos y Grados</h5>
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
						@if($grado_academico_director_escuela->grado_academico=="Dr." and $coordinador->sexo=="Femenino")
							<b>Dra. {{$director_escuela->name}}</b>
						@endif
						<b>{{$grado_academico_director_escuela->grado_academico}}{{$director_escuela->name}}</b>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div align="center" style="margin-left: 87px">
				</div>
				<div align="center" style="margin-left: 100px">
					<h5>Director Escuela {{$memo->escuela}}</h5>
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
						<div>Envia Acta de titulación 
						@if($tesis->nombre_completo!=null and $tesis->nombre_completo2==null)
								@if($sexo1=="Masculino")
									del alumno Sr.
								@endif
								@if($sexo1=="Femenino")
									de la alumna Srta.
								@endif		
								{{$tesis->nombre_completo}}				
						@endif
						@if($tesis->nombre_completo2!=null and $tesis->nombre_completo!=null)
							de los alumnos
						@endif
						 </div>
				</div>
			</div>
			<div class="row">
				<div align="left" style="margin-left: 190px">
				@if($tesis->nombre_completo2!=null and $tesis->nombre_completo!=null)
								@if($sexo1=="Masculino")
									 Sr.
								@endif
								@if($sexo1=="Femenino")
									Srta.
								@endif		
								{{$tesis->nombre_completo}}	
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
	    <h4>
		<div align="left">
		{{$memo->texto0}}
			</div></h4>

			<div align=justify style="margin-bottom: 100px; margin-top:100px">
			<h4><p align="left">{{$memo->texto1}}{{$dia_presentacion}}/{{$mes_presentacion}}/{{$year_presentacion}} a las {{$hora_presentacion}} Hrs. {{$memo->texto2}}
					@if($tesis->carrera=="Ingenieria en Ejecucion e Informatica")
					{{$memo->texto3}} {{$tesis->carrera}}
					@elseif($tesis->carrera=="Ingenieria Informatica")
					{{$memo->texto3}} {{$tesis->carrera}}	
					@else				
					@endif
				{{$memo->texto4}}
				@if($tesis->nombre_completo!=null and $tesis->nombre_completo2!=null)
					De los alumnos
					@if($tesis->nombre_completo!=null)
								@if($sexo1=="Masculino")
								  el <b>SR. </b>
								@endif
								@if($sexo1=="Femenino")
								  la <b>SRTA.</b>
								@endif		
								<b>{{$nombre1}}
								Rut:{{$tesis->rut}}</b>							
						@endif
						@if($tesis->nombre_completo2!=null)
								@if($sexo2=="Masculino")
								 y el <b>SR.</b>
								@endif
								@if($sexo2=="Femenino")
								 y la <b>SRTA.</b> 
								@endif
								<b>{{$nombre2}}
								RUT:{{$tesis->rut2}}.</b>	
								{{$memo->texto7}} {{$tesis->nota_tesis}}.		
						@endif
			@endif
			@if($tesis->nombre_completo!=null and $tesis->nombre_completo2==null)	
								@if($sexo1=="Masculino")
								al alumno
								  el <b>SR.</b>
								@endif
								@if($sexo1=="Femenino")
								a la alumna
								la Srta.
								@endif		
								<b>{{$nombre1}}
								RUT:{{$tesis->rut}}</b>,									
								{{$memo->texto5}} {{$tesis->nota_tesis}}.
			@endif
			
					
			</h4></p>
			</div>

			<h4>
			<div align="left" style="margin-bottom: 300px; margin-top: 30px">{{$memo->texto6}}</div>
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
					<b>{{$grado_academico_director_escuela->grado_academico}}{{$director_escuela->name}}</b>
					</div>
				</div>
			</div>

			<div class="row" style="margin-top:0px">
			<div class="col-12">
					<div style="margin-left:0px">Recepción Prof. Comisión</div>
					<div style="margin-left:900px">
					<b>Director</b>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div style="margin-left:900px">
						<b>Escuela {{$memo->escuela}}</b>
					</div>
					<div style="margin-left:0px">{{$iniciales_director_escuela[0]}}{{$iniciales_director_escuela[1]}}/bcsm
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