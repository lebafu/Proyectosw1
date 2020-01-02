<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                  <div class="card-header">{{ __('ESTADO DE ALERTA') }}</div>

                <div class="card-body">             	
<div>Hola coordinador de Tesis!!! te informamos que </div>
<b>profesor guía:</b> 
<p>{{$profesor_guia}} a cambiado el estado de reunion a "no hay reunion".</p>
<b>Tesis:</b>
<p>{{$nombre_tesis}}</p>
<b>Alumno:</b>
<p>{{$nombre_completo}}</p>
<b>Rut:</b> 
<p>{{$rut}}</p>
<b>Email:</b>
<p>{{$email_alumno1}}</p>
@if($nombre_completo2!=null)
<b>Alumno:</b> 
<p>{{$nombre_completo2}}</p>
<b>Rut:</b>
<p>{{$rut2}}</p>
<b>Email:</b>
<p>{{$email_alumno2}}</p>
@endif
Ya que no ha habido conversaciones de avance de {{$tipo_trabajo}} en más de un mes

</div>
</div>
</div>
</div>
</div>
