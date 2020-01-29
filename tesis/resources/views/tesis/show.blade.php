@extends('layouts.app')



@section('content')

<div class="container">
	<div class="container">
 	 	<div class="row justify-content-center">
    		<div class="col-md-8">
      			<div class="card">
       				<div class="card-header">{{ __('Informacion detallada de Tesis') }}</div>
          				<div class="card-body">

    <table class="table table-bordered">
        <tr>
@if($comision!=null)
	<b>Nombre alumno</b>
	<p>{{$tesis->nombre_completo}}</p>
	<p>{{$tesis->nombre_completo2}}</p>
	<b>Rut</b>
	<p>{{$tesis->rut}}</p>
	<p>{{$tesis->rut2}}</p>
	<b>Año Ingreso</b>
	<p>{{$tesis->ano_ingreso}}</p>
	<p>{{$tesis->ano_ingreso2}}</p>
	<b>Profesor Guía</b>
	<p>{{$tesis->profesor_guia}}</p>
	<b>Carrera</b>
	<p>{{$tesis->carrera}}</p>
	<b>Fecha Peticion</b>
	<p>{{$tesis->fecha_peticion}}</p>
	<b>Tipo de trabajo</b>
	<p>{{$tesis->tipo}}</p>
	<b>Nombre vinculación</b>
	<p>{{$tesis->nombre_vinculacion}}</p>
	<b>Tipo de vinculación</b>
	<p>{{$tesis->tipo_vinculacion}}</p>
	<b>Titulo Tesis</b>
	<p>{{$tesis->nombre_tesis}}</p>
	<b>Área Tesis</b>
	<p>{{$tesis->area_tesis}}</p>
	<b align="justify">Descripción</b>
	<p>{{$tesis->descripcion}}</p>
	<b align="justify">Objetivos</b>
	<p>{{$tesis->objetivos}}</p>
	<b align="justify">Contribución</b>
	<p>{{$tesis->contribucion}}</p>
	<b>Primer Profesor Comisión</b>
	<p>{{$comision->profesor1_comision}}</p>
	<b>Segundo Profesor Comisión</b>
	<p>{{$comision->profesor2_comision}}</p>
	@if($comision->profesor3_comision!=null)
	<b>Tercer Profesor Comisión</b>
	<p>{{$comision->profesor3_comision}}</p>
	@endif
	@if($comision->profesor1_externo)
	<b>Primer Profesor Externo</b>
	<p>{{$comision->profesor1_externo}}</p>
	<b>Grado Académico</b>
	<p>{{$comision->profesor1_grado_academico}}</p>
	<b>Correo electrónico Primer Profesor Externo</b>
	<p>{{$comision->correo_profe1_externo}}</p>
	<b>Institución Primer Profesor Externo</b>
	<p>{{$comision->institucion1}}</p>
	@endif
	@if($comision->profe2_externo)
	<b>Segundo Profesor Externo</b>
	<p>{{$comision->profe2_externo}}</p>
	<b>Grado Academico</b>
	<p>{{$comision->profe2_grado_academico}}</p>
	<b>Correo electrónico Segundo Profesor Externo</b>
	<p>{{$comision->correo_profe2_externo}}</p>
	<b>Institución Segundo Profesor Externo</b>
	<p>{{$comision->institucion2}}</p>
	@endif
</tr>
</table>
@else
	<b>Nombre alumno</b>
	<p>{{$tesis->nombre_completo}}</p>
	<p>{{$tesis->nombre_completo2}}</p>
	<b>Rut</b>
	<p>{{$tesis->rut}}</p>
	<p>{{$tesis->rut2}}</p>
	<b>Año Ingreso</b>
	<p>{{$tesis->ano_ingreso}}</p>
	<p>{{$tesis->ano_ingreso2}}</p>
	<b>Profesor Guía</b>
	<p>{{$tesis->profesor_guia}}</p>
	<b>Carrera</b>
	<p>{{$tesis->carrera}}</p>
	<b>Tipo trabajo</b>
	<p>{{$tesis->tipo}}</p>
	<b>Fecha Peticion</b>
	<p>{{$tesis->fecha_peticion}}</p>
	<b>Nombre Vinculación</b>
	<p>{{$tesis->nombre_vinculacion}}</p>
	<b>Tipo de Vinculación</b>
	<p>{{$tesis->tipo_vinculacion}}</p>
	<b>Titulo Tesis</b>
	<p>{{$tesis->nombre_tesis}}</p>
	<b>Área Tesis</b>
	<p>{{$tesis->area_tesis}}</p>
	<b align="justify">Descripción</b>
	<p>{{$tesis->descripcion}}</p>
	<b align="justify">Objetivos</b>
	<p>{{$tesis->objetivos}}</p>
	<b align="justify">Contribución</b>
	<p>{{$tesis->contribucion}}</p>
	</tr>
	</table>

@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<a href="{{ url()->previous() }}" class="btn btn-default">Volver atrás</a>
@endsection