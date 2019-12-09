@extends('layouts.app')

@section('content')
 <link href="{{asset('css/bootstrap-datepicker.standalone.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Recopilacion de informacion') }}</div>

                <div class="card-body">
                    <form action="{{route('recopilacion.update', $recopilacion->id)}}" method="POST">
                        @csrf

                       
                                   <input id="id_pk" type="hidden" class="form-control" name="id_pk" value="{{$tes->id_pk}}">
                         

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre completo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$tes->nombre_completo}}}" required disabled>

                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{$tes->rut}}}" required autocomplete="rut" autofocus disabled>

                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('Fecha_nacimiento') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control" name="fecha_nac" value="{{$recopilacion->fecha_nac}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>
                            <div class="col-md-6">
                               <select name="titulo" id="titulo" type="text" class="form-control" required="required">
                                <option value="Ingeniero">Ingeniero</option>
                                 <option value="Magister">Magister</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('N°Celular') }}</label>
                            <div class="col-md-6">
                               <input id="telefono_celular" type="text" class="form-control" name="telefono_celular" value="{{$recopilacion->telefono_celular}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('N°Telefono') }}</label>
                            <div class="col-md-6">
                               <input id="telefono_fijo" type="text" class="form-control" name="telefono_fijo" value="{{$recopilacion->telefono_fijo}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook(opcional)') }}</label>
                            <div class="col-md-6">
                               <input id="facebook" type="text" class="form-control" name="facebook" value="{{$recopilacion->facebook}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion Actual') }}</label>
                            <div class="col-md-6">
                               <input id="direccion_actual" type="text" class="form-control" name="direccion_actual" value="{{$recopilacion->direccion_actual}}" required="required">
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="ano_ingreso" class="col-md-4 col-form-label text-md-right">{{ __('Año ingreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_ingreso" type="text" class="form-control" name="ano_ingreso" value="{{$tes->ano_ingreso}}" disabled> La fecha de Ingreso se considera desde Marzo del año de ingreso*
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="ano_egreso" class="col-md-4 col-form-label text-md-right">{{ __('Año egreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_egreso" type="date" class="form-control"  name="ano_egreso" value="{{$recopilacion->ano_egreso}}" required>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo Tesis o Memoria') }}</label>
                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{$tes->tipo}}" disabled>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor_guia" class="col-md-4 col-form-label text-md-right">{{ __('Profesor_guia') }}</label>
                            <div class="col-md-6">
                                <input id="profesor_guia" type="text" class="form-control" name="profesor_guia" value="{{$tes->profesor_guia}}" disabled>
                            </div>
                        </div>

                        @if($tes->nombre_completo2!=null)

                        <div class="card-header">{{ __('Recopilacion de informacion titulados segundo integrante Tesis') }}</div>

                       <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre completo alumno 2') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$tes->nombre_completo}}}" required disabled>

                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{$tes->rut}}}" required autocomplete="rut" autofocus disabled>

                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('Fecha_nacimiento') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_nac2" type="date" class="form-control" name="fecha_nac2" value="{{$recopilacion->fecha_nac}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>
                            <div class="col-md-6">
                               <select name="titulo2" id="titulo2" type="text" class="form-control" required="required">
                                <option value="Ingeniero">Ingeniero</option>
                                 <option value="Magister">Magister</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('N°Celular') }}</label>
                            <div class="col-md-6">
                               <input id="telefono_celular2" type="text" class="form-control" name="telefono_celular2" value="{{$recopilacion->telefono_celular2}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('N°Telefono') }}</label>
                            <div class="col-md-6">
                               <input id="telefono_fijo2" type="text" class="form-control" name="telefono_fijo2" value="{{$recopilacion->telefono_fijo2}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook(opcional)') }}</label>
                            <div class="col-md-6">
                               <input id="facebook2" type="text" class="form-control" name="facebook2" value="{{$recopilacion->facebook2}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion Actual') }}</label>
                            <div class="col-md-6">
                               <input id="direccion_actual2" type="text" class="form-control" name="direccion_actual2" value="{{$recopilacion->direccion_actual2}}" required="required">
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="ano_ingreso" class="col-md-4 col-form-label text-md-right">{{ __('Año ingreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_ingreso" type="text" class="form-control" name="ano_ingreso" value="{{$tes->ano_ingreso}}" disabled> La fecha de Ingreso se considera desde Marzo del año de ingreso*
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="ano_egreso" class="col-md-4 col-form-label text-md-right">{{ __('Año egreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_egreso2" type="date" class="form-control"  name="ano_egreso2" value="{{$recopilacion->ano_egreso2}}" required>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo Tesis o Memoria') }}</label>
                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{$tes->tipo}}" disabled>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor_guia" class="col-md-4 col-form-label text-md-right">{{ __('Profesor_guia') }}</label>
                            <div class="col-md-6">
                                <input id="profesor_guia" type="text" class="form-control" name="profesor_guia" value="{{$tes->profesor_guia}}" disabled>
                            </div>
                        </div>
                        @endif

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                <a href="/alumnohome" class="btn">{{ __('Cancelar') }}</a>
                                    
                            </div>

                                
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    $('#fecha', '#fecha_nac', '#fecha_nac2').datepicker({
        language: 'es',
        format: 'yyyy-mm-dd',
    });

</script>
@endsection
