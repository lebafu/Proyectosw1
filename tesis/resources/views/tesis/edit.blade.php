@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar tesis alumnos') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.update', $tes->id_pk)}}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre completo') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_completo" type="text" class="form-control @error('nombre_completo') is-invalid @enderror" name="nombre_completo" value="{{ $tes->nombre_completo}}" required autocomplete="nombre_completo" autofocus>

                                @error('nombre_completo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>
                            <div class="col-md-6">
                                <input id="rut" type="text" placeholder="rut" class="form-control" name="rut" value="{{$tes->rut}}"required="required">
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="ano_ingreso" class="col-md-4 col-form-label text-md-right">{{ __('Ano Ingreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_ingreso" type="text" placeholder="ano_ingreso" class="form-control" name="ano_ingreso" value="{{$tes->ano_ingreso}}" required="required">
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="telefono1" class="col-md-4 col-form-label text-md-right">{{ __('Telefono Alumno') }}</label>
                            <div class="col-md-6">
                                <input id="telefono1" type="text" class="form-control" value="{{$tes->telefono1}}" name="telefono1" required>
                            </div>
                        </div>


                        @if($tes->nombre_completo2!=null)

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Segundo Alumno') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_completo2" type="text" class="form-control @error('nombre_completo2') is-invalid @enderror" name="nombre_completo2" value="{{ $tes->nombre_completo2}}" required autocomplete="nombre_completo2" autofocus>

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
                                <input id="rut2" type="text" placeholder="rut2" class="form-control" name="rut2" value="{{$tes->rut2}}"required="required">
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="ano_ingreso2" class="col-md-4 col-form-label text-md-right">{{ __('Ano Ingreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_ingreso2" type="text" placeholder="año ingreso" class="form-control" name="ano_ingreso2" value="{{$tes->ano_ingreso2}}" required="required">
                            </div>
                        </div>

                             <div class="form-group row">
                            <label for="telefono2" class="col-md-4 col-form-label text-md-right">{{ __('Telefono Alumno 2') }}</label>
                            <div class="col-md-6">
                                <input id="telefono2" type="text" class="form-control" value="{{$tes->telefono2}}" name="telefono2" required>
                            </div>
                        </div>

                      @endif

                         <div class="form-group row">
                            <label for="profesor_guia" class="col-md-4 col-form-label text-md-right">{{ __('Profesor guia') }}</label>
                            <div class="col-md-6">
                             <select name="profesor_guia" id="profesor_guia" class="form-control" required>
                                    <option value="{{$tes->profesor_guia}}">{{$tes->profesor_guia}}</option>
                                    @foreach($profes as $profe)
                                    <option value="{{$profe->id}}">{{$profe->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="nombre_tesis" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Tesis') }}</label>
                           <div class="col-md-6">
                                 <input id="nombre_tesis" type="text" placeholder="nombre_tesis" class="form-control" name="nombre_tesis" value="{{$tes->nombre_tesis}}" required="required">
                               </div>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="area_tesis" class="col-md-4 col-form-label text-md-right">{{ __('Area Tesis') }}</label>
                            <div class="col-md-6">
                                <select name="area_tesis" id="area_tesis" type="text" class="form-control" required="required">
                                  <option value="{{$tes->area_tesis}}">{{$tes->area_tesis}}</option>
                                @foreach($area_tesis as $area_tes)
                                        @if($area_tes=="BI")
                                         <option value="BI">Inteligencia de negocios</option>
                                        @elseif($area_tes=="IA")
                                        <option value="IA">Inteligencia Artificial </option>
                                        @else
                                        <option value="{{$area_tes->area_tesis}}">{{$area_tes->area_tesis}}</option>
                                        @endif 
                                 @endforeach
                                 </select>
                            </div>
                        </div>
 
                          <div class="form-group row">
                            <label for="carrera" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>
                            <div class="col-md-6">
                                <select name="carrera" id="carrera" type="text" class="form-control" required="required">
                                <option value="Ingenieria Civil Informatica">Ingenieria Civil Informatica</option>
                                 <option value="Ingenieria en Informatica">Ingenieria en Informatica </option>
                                 <option value="Ingenieria en Ejecucion e Informatica">Ingenieria en Ejecucion e Informatica</option>
                                 </select>
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Vinculacion') }}</label>
                            <div class="col-md-6">
                                <select name="tipo_vinculacion" id="tipo_vinculacion" type="text" class="form-control" required="required">
                                <option value="{{$tes->tipo_vinculacion}}">{{$tes->tipo_vinculacion}}</option>
                                <option value="Empresa"> Empresa </option>
                                 <option value="Proyecto">Proyecto </option>
                                 <option value="Fondo concursable"> Fondo concursable</option>
                                 <option value="Comunidad">Comunidad</option>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Vinculacion') }}</label>
                            <div class="col-md-6">
                            <select name="nombre_vinculacion" id="nombre_vinculacion" class="form-control" required>
                              <option value="{{$tes->nombre_vinculacion}}">{{$tes->nombre_vinculacion}}</option>
                                  @foreach($empresas as $emp)
                                    <option value="{{$emp->nombre}}">{{$emp->nombre}}</option>
                                    @endforeach
                                     @foreach($comunidads as $comunidad)
                                    <option value="{{$comunidad->nombre}}">{{$comunidad->nombre}}</option>
                                    @endforeach
                                    @foreach($proyectos as $proyecto)
                                    <option value="{{$proyecto->nombre}}">{{$proyecto->nombre}}</option>
                                    @endforeach
                                     @foreach($fcs as $fc)
                                    <option value="{{$fc->nombre}}">{{$fc->nombre}}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>

                         <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de trabajo') }}</label>
                            <div class="col-md-6">
                                <select name="tipo" id="tipo" type="text" class="form-control" required="required">
                                <option value="{{$tes->tipo}}">{{$tes->tipo}}</option>
                                <option value="Tesis"> Tesis </option>
                                 <option value="Memoria">Memoria </option>
                                 </select>
                            </div>
                        </div>

                       
 
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                            <div class="col-md-6">
                                <textarea id="descripcion" type="text" rows="10" cols="40" placeholder="Breve descripcion del tema" class="form-control" name="descripcion" value="{{$tes->descripcion}}" required="required">{{$tes->descripcion}}</textarea>
                            </div>
                        </div>
 
                       <div class="form-group row">
                            <label for="objetivos" class="col-md-4 col-form-label text-md-right">{{ __('Objetivos') }}</label>
                            <div class="col-md-6">
                                <textarea id="objetivos" type="text" rows="10" cols="40" placeholder="Objetivos del tema" class="form-control" name="objetivos" value="{{$tes->objetivos}}" required="required">{{$tes->objetivos}}</textarea>
                            </div>
                        </div>

  

 
                       <div class="form-group row">
                            <label for="contribucion" class="col-md-4 col-form-label text-md-right">{{ __('Contribucion esperada') }}</label>
                            <div class="col-md-6">
                                <textarea id="contribucion" type="text" rows="10" cols="40" placeholder="contribucion" class="form-control" name="contribucion" value="{{$tes->contribucion}}" required="required">{{$tes->contribucion}}</textarea>
                            </div>
                        </div>

                        @if($tes->estado1==1 and $tes->estado2==null and $tes->estado3==1)
                        <div class="form-group row">
                           <label for="observacion" class="col-md-4 col-form-label text-md-right">{{ __('Observacion') }}</label>
                            <div class="col-md-6">
                                <textarea name="observacion" type="text" rows="10" cols="40" class="form-control", value="{{ old('observacion')}}" disabled>{{$tes->observacion}}</textarea>
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
@endsection
