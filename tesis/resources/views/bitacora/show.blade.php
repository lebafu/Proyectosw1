@extends('layouts.app')



@section('content')

<div class="container">
	<div class="container">
 	 	<div class="row justify-content-center">
    		<div class="col-md-8">
      			<div class="card">
       				<div class="card-header">{{ __('Informacion detallada de Bitacora') }}</div>
          				<div class="card-body">

    <table class="table table-bordered">
    		<tr>
    				<b>ID Tesis</b>
    				<p>{{$bitacora->id_tesis}}</p>
    				<b>ID Bitacora</b>
    				<p>{{$bitacora->id}}</p>
					<b>Nombre Alumno(s)</b>
					<p>{{$tesis->nombre_completo}}</p>
					<p>{{$tesis->nombre_completo2}}</p>
					<b>Nombre Tesis</b>
					<p>{{$tesis->nombre_tesis}}</p>
					<b>Fecha de acuerdo:</b>
					<p>{{$bitacora->created_at}}</p>
					<b>Acuerdo</b>
					<p>{{$bitacora->acuerdo}}</p>
					<b>Comentario</b>
					<p>{{$bitacora->comentario}}</p>
					</tr>
    				</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<a href="{{ url()->previous() }}" class="btn btn-default">Volver atrás</a>
@endsection