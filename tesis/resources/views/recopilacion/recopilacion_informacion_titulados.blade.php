@extends('layouts.app')

@section('content')
 <link href="{{asset('css/bootstrap-datepicker.standalone.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recopilacion de informacion titulados') }}</div>

                <div class="card-body">
                    <form action="{{route('recopilacion.recopilacion_store')}}" method="POST">
                        @csrf

                        @foreach($al as $alumno)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre completo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$alumno->name}}}" required disabled>

                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{$alumno->rut}}}" required autocomplete="rut" autofocus disabled>

                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('Fecha_nacimiento') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control" name="fecha_nac" required>
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$alumno->email}}" required autocomplete="email" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('N°Celular') }}</label>
                            <div class="col-md-6">
                               <input id="celular" type="text" class="form-control" name="celular" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('N°Telefono') }}</label>
                            <div class="col-md-6">
                               <input id="telefono" type="text" class="form-control" name="telefono" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook(opcional)') }}</label>
                            <div class="col-md-6">
                               <input id="facebook" type="text" class="form-control" name="facebook">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion Actual') }}</label>
                            <div class="col-md-6">
                               <input id="direccion" type="text" class="form-control" name="direccion" required="required">
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="ano_ingreso" class="col-md-4 col-form-label text-md-right">{{ __('Año ingreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_ingreso" type="text" class="form-control" name="ano_ingreso" value="{{$alumno->ano_ingreso}}" disabled> La fecha de Ingreso se considera desde Marzo del año de ingreso*
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="ano_egreso" class="col-md-4 col-form-label text-md-right">{{ __('Año egreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_egreso" type="date" class="form-control" value={{$fecha}} name="ano_egreso" required>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo Tesis o Memoria') }}</label>
                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{$alumno->tipo}}" disabled>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor_guia" class="col-md-4 col-form-label text-md-right">{{ __('Profesor_guia') }}</label>
                            <div class="col-md-6">
                                <input id="profesor_guia" type="text" class="form-control" name="profesor_guia" value="{{$alumno->profesor_guia}}" disabled>
                            </div>
                        </div>

                        @if($alumno->nombre_completo2!=null)

                        <div class="card-header">{{ __('Recopilacion de informacion titulados segundo integrante Tesis') }}</div>

                        <div class="form-group row">
                            <label for="nombre_completo2" class="col-md-4 col-form-label text-md-right">{{ __('Nombre completo') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_completo2" type="text" class="form-control" name="nombre_completo2" value="{{$alumno->nombre_completo2}}}" required disabled>

                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="rut2" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

                            <div class="col-md-6">
                                <input id="rut2" type="text" class="form-control" name="rut2" value="{{$alumno->rut2}}}" required autocomplete="rut2" autofocus disabled>

                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="fecha_nac2" class="col-md-4 col-form-label text-md-right">{{ __('Fecha_nacimiento') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_nac2" type="date" class="form-control" name="fecha_nac2" required>
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
                            <label for="celular2" class="col-md-4 col-form-label text-md-right">{{ __('N°Celular') }}</label>
                            <div class="col-md-6">
                               <input id="celular2" type="text" class="form-control" name="celular2" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono2" class="col-md-4 col-form-label text-md-right">{{ __('N°Telefono') }}</label>
                            <div class="col-md-6">
                               <input id="telefono2" type="text" class="form-control" name="telefono2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="facebook2" class="col-md-4 col-form-label text-md-right">{{ __('Facebook(opcional)') }}</label>
                            <div class="col-md-6">
                               <input id="facebook" type="text" class="form-control" name="facebook2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion2" class="col-md-4 col-form-label text-md-right">{{ __('Direccion Actual') }}</label>
                            <div class="col-md-6">
                               <input id="direccion2" type="text" class="form-control" name="direccion2" required="required">
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="ano_ingreso2" class="col-md-4 col-form-label text-md-right">{{ __('Año ingreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_ingreso2" type="text" class="form-control" name="ano_ingreso2" value="{{$alumno->ano_ingreso2}}" disabled> La fecha de Ingreso se considera desde Marzo del año de ingreso*
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="ano_egreso2" class="col-md-4 col-form-label text-md-right">{{ __('Año egreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_egreso2" type="date" class="form-control" value={{$fecha}} name="ano_egreso2" required>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo Tesis o Memoria') }}</label>
                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{$alumno->tipo}}" disabled>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor_guia" class="col-md-4 col-form-label text-md-right">{{ __('Profesor_guia') }}</label>
                            <div class="col-md-6">
                                <input id="profesor_guia" type="text" class="form-control" name="profesor_guia" value="{{$alumno->profesor_guia}}" disabled>
                            </div>
                        </div>

                        @endif
                        @endforeach
                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                <a href="/recopilacion_informacion" class="btn">{{ __('Cancelar') }}</a>
                                    
                            </div>

        
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    $('#fecha', '#fecha_nac').datepicker({
        language: 'es',
        format: 'yyyy-mm-dd',
    });

</script>
@endsection
