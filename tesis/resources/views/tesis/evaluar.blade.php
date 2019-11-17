@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Evaluar peticion de tesis') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.update3', $tes->id)}}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre_completo" class="col-md-4 col-form-label text-md-right">{{ __('Nombre completo') }}</label>

                            <div class="col-md-6">
                              <input id="nombre_completo" type="text" placeholder="" class="form-control" name="nombre_completo" value="{{$tes->nombre_completo}}" required="required" disabled>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>
                            <div class="col-md-6">
                                <input id="rut" type="text" placeholder="rut" class="form-control" name="rut" value="{{$tes->rut}}" required="required" disabled>
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="ano_ingreso" class="col-md-4 col-form-label text-md-right">{{ __('Ano Ingreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_ingreso" type="text" placeholder="ano_ingreso" class="form-control" name="ano_ingreso" value="{{$tes->ano_ingreso}}" required="required" disabled>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="telefono1" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono1" type="text" class="form-control" name="telefono1" value="{{$tes->telefono1}}"required="required" disabled>
                            </div>
                        </div>


                        @if($tes->nombre_completo2!=null)

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Segundo Alumno') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_completo2" type="text" class="form-control @error('nombre_completo2') is-invalid @enderror" name="nombre_completo2" value="{{ $tes->nombre_completo2}}" required autocomplete="nombre_completo2" autofocus disabled>

                                @error('nombre_completo2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="rut2" class="col-md-4 col-form-label text-md-right">{{ __('Rut Segundo Alumno') }}</label>
                            <div class="col-md-6">
                                <input id="rut2" type="text" placeholder="rut2" class="form-control" name="rut" value="{{$tes->rut2}}"required="required" disabled>
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="ano_ingreso2" class="col-md-4 col-form-label text-md-right">{{ __('Ano Ingreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_ingreso2" type="text" placeholder="año ingreso" class="form-control" name="ano_ingreso2" value="{{$tes->ano_ingreso2}}" required="required" disabled>
                            </div>
                        </div>

                           <div class="form-group row">
                            <label for="telefono2" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono2" type="text" class="form-control" name="telefono2" value="{{$tes->telefono1}}"required="required" disabled>
                            </div>
                        </div>

                      @endif

                         <div class="form-group row">
                            <label for="profesor_guia" class="col-md-4 col-form-label text-md-right">{{ __('Profesor guia') }}</label>
                                <div class="col-md-6">
                                <input id="profesor_guia" type="text" placeholder="profesor_guia" class="form-control" name="profesor_guia" value="{{$tes->profesor_guia}}" required="required" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre_tesis" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Tesis') }}</label>
                            <div class="col-md-6">
                                <input id="nombre_tesis" type="text" placeholder="nombre_tesis" class="form-control" name="nombre_tesis" value="{{$tes->nombre_tesis}}" required="required" disabled>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="area_tesis" class="col-md-4 col-form-label text-md-right">{{ __('Area Tesis') }}</label>
                            <div class="col-md-6">
                                <input id="area_tesis" type="text" class="form-control" name="area_tesis" value="{{$tes->area_tesis}}" required="required" disabled>
                            </div>
                        </div>
 
                          <div class="form-group row">
                            <label for="carrera" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>
                            <div class="col-md-6">
                               <input id="carrera" type="text" class="form-control" name="carrera" value="{{$tes->carrera}}" required="required" disabled>
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="tipo_vinculacion" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Vinculacion') }}</label>
                            <div class="col-md-6">
                               <input id="tipo_vinculacion" type="text" class="form-control" name="tipo_vinculacion" value="{{$tes->tipo_vinculacion}}" required="required" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre_vinculacion" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Vinculacion') }}</label>
                            <div class="col-md-6">
                              <input id="nombre_vinculacion" type="text" placeholder="nombre_vinculacion" class="form-control" name="nombre_vinculacion" value="{{$tes->nombre_vinculacion}}" required="required" disabled>
                               </div>
                        </div>

                         <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de trabajo') }}</label>
                            <div class="col-md-6">
                              <input id="tipo" type="text" class="form-control" name="tipo" value="{{$tes->tipo}}" required="required" disabled>
                            </div>
                        </div>

                       
 
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                            <div class="col-md-6">
                                <textarea id="descripcion" type="text" rows="10" cols="40" placeholder="Breve descripcion del tema" class="form-control" name="descripcion" value="{{$tes->descripcion}}" required="required" disabled>{{$tes->descripcion}}</textarea>
                            </div>
                        </div>
 
                       <div class="form-group row">
                            <label for="objetivos" class="col-md-4 col-form-label text-md-right">{{ __('Objetivos') }}</label>
                            <div class="col-md-6">
                                <textarea id="objetivos" type="text" rows="10" cols="40" placeholder="Objetivos del tema" class="form-control" name="objetivos" value="{{$tes->objetivos}}" required="required" disabled>{{$tes->objetivos}}</textarea>
                            </div>
                        </div>

  

 
                       <div class="form-group row">
                            <label for="contribucion" class="col-md-4 col-form-label text-md-right">{{ __('Contribucion esperada') }}</label>
                            <div class="col-md-6">
                                <textarea id="contribucion" type="text" rows="10" cols="40" placeholder="contribucion" class="form-control" name="contribucion" value="{{$tes->contribucion}}" required="required" disabled>{{$tes->contribucion}}</textarea>
                            </div>
                        </div>

                        
                         <div class="form-group row">
                            <label for="profesor1_comision" class="col-md-4 col-form-label text-md-right">{{ __('Primer profesor comision') }}</label>
                           <div class="col-md-6">
                                 <input id="profesor1_comision" type="text" class="form-control" name="profesor1_comision" value="{{$comision->profesor1_comision}}" required="required" disabled>
                                    @if($comision->coguia==1)
                                    
                                          <p>El profesor {{$comision->profesor1_comision}} es Coguia</p>
                                       
                                    @endif
                            </div>
                        </div>

                     



                        <div class="form-group row">
                            <label for="profesor2_comision" class="col-md-4 col-form-label text-md-right">{{ __('Segundo Profesor comision') }}</label>
                            <div class="col-md-6">
                             <input id="profesor2_comision" type="text" class="form-control" name="profesor2_comision" value="{{$comision->profesor2_comision}}" required="required" disabled>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profesor3_comision" class="col-md-4 col-form-label text-md-right">{{ __('Tercer Profesor comision') }}</label>
                            <div class="col-md-6">
                                 <input id="profesor3_comision" type="text" class="form-control" name="profesor3_comision" value="{{$comision->profesor3_comision}}" disabled>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profesor1_externo" class="col-md-4 col-form-label text-md-right">{{ __('Primer profesor externo') }}</label>
                               <div class="col-md-6">
                                 <input id="profesor1_externo" type="text" class="form-control" name="profesor1_externo" value="{{$comision->profesor1_externo}}" disabled>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor1_grado_academico" class="col-md-4 col-form-label text-md-right">{{ __('Grado Academico Primer Profesor externo') }}</label>
                           <div class="col-md-6">
                                 <input id="profesor1_comision" type="text" class="form-control" name="profesor1_comision" value="{{$comision->profesor1_grado_academico}}" required="required" disabled>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="correo_profe1_externo" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <div class="col-md-6">
                                 <input id="correo_profe1_externo" type="email" class="form-control" name="correo_profe1_externo" value="{{$comision->correo_profe1_externo}}"  disabled >
                            </div>
                        </div>  

                         <div class="form-group row">
                            <label for="institucion1" class="col-md-4 col-form-label text-md-right">{{ __('Institucion Primer Profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="institucion1" type="text" placeholder="Institucion profesor externo" class="form-control"  value="{{$comision->institucion1}}"  disabled>
                            </div>
                        
                        </div>

                         <div class="form-group row">
                            <label for="profesor2_externo" class="col-md-4 col-form-label text-md-right">{{ __('Segundo profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="profesor2_externo" type="text" class="form-control" value="{{$comision->profe2_externo}}" name="profesor2_externo" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profesor1_grado_academico" class="col-md-4 col-form-label text-md-right">{{ __('Grado Academico Segundo Profesor externo') }}</label>
                           <div class="col-md-6">
                                 <input id="profe2_grado_academico" type="text" class="form-control" name="profesor2_grado_academico" value="{{$comision->profe2_grado_academico}}" required="required" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="correo_profe2_externo" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                            <div class="col-md-6">
                                 <input id="correo_profe2_externo" type="email" class="form-control" name="correo_profe2_externo" value="{{$comision->correo_profe2_externo}}"  disabled >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                               <label for="institucion2" class="col-md-4 col-form-label text-md-right">{{ __('Institucion') }}</label>
                             <div class="col-md-6">
                              <input id="institucion2" type="text"  class="form-control" name="institucion2" value="{{$comision->institucion2}}" disabled >
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Accion a realizar') }}</label>
                            <div class="col-md-6">
                                <select name="estado" id="estado" type="text" class="form-control" required="required">
                                <option value="Enviar a Director">Enviar a Director</option>
                                 <option value="Rechazar">Rechazar</option>
                                 </select>
                            </div>
                        </div>

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                                  
                             <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a> 
                                
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
