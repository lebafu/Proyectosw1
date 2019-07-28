@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profesor editando tesis de alumno') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.update2', $tes->id)}}" method="POST">
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
                            <label for="profesor_guia" class="col-md-4 col-form-label text-md-right">{{ __('Profesor guia') }}</label>
                             <div class="col-md-6">
                                 <select name="profesor_guia" id="profesor_guia" class="form-control"  required>
                                    <option value="{{$tes->profesor_guia}}">{{$tes->profesor_guia}}</option>
                                    @foreach($profes as $profe)
                                    @if($profe->name != $tes->profesor_guia)
                                    <option value="{{$profe->name}}">{{$profe->name}}</option>
                                    @endif
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

                         <div class="form-group row">
                            <label for="area_tesis" class="col-md-4 col-form-label text-md-right">{{ __('Area Tesis') }}</label>
                            <div class="col-md-6">
                                <select name="area_tesis" id="area_tesis" type="text" class="form-control" required="required">
                                <option value="{{ $tes->area_tesis}}">{{ $tes->area_tesis}}</option>
                                <option value="Ingenieria de Software">Ingenieria de Software</option>
                                 <option value="IA">Inteligencia Artificial </option>
                                 <option value="BI">Inteligencia de negocios</option>
                                 <option value="Imagenes">Imagenes</option>
                                 </select>
                            </div>
                        </div>
 
                          <div class="form-group row">
                            <label for="carrera" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>
                            <div class="col-md-6">
                                <select name="carrera" id="carrera" type="text" class="form-control"  required="required">
                                <option value="{{ $tes->carrera}}">{{$tes->carrera}}</option>
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
                                 <option value="Fondo concusable">Fondo concursable</option>
                                 <option value="Comunidad">Comunidad</option>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Vinculacion') }}</label>
                            <div class="col-md-6">
                              <input id="nombre_vinculacion" type="text" placeholder="nombre_vinculacion" class="form-control" name="nombre_vinculacion" value="{{$tes->nombre_vinculacion}}" required="required">
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
                                <input id="descripcion" type="text" placeholder="Breve descripcion del tema" class="form-control" name="descripcion" value="{{$tes->descripcion}}" required="required">
                            </div>
                        </div>
 
                       <div class="form-group row">
                            <label for="objetivos" class="col-md-4 col-form-label text-md-right">{{ __('Objetivos') }}</label>
                            <div class="col-md-6">
                                <input id="objetivos" type="text" placeholder="Objetivos del tema" class="form-control" name="objetivos" value="{{$tes->objetivos}}" required="required">
                            </div>
                        </div>
 
                       <div class="form-group row">
                            <label for="contribucion" class="col-md-4 col-form-label text-md-right">{{ __('Contribucion esperada') }}</label>
                            <div class="col-md-6">
                                <input id="contribucion" type="text" placeholder="contribucion" class="form-control" name="contribucion" value="{{$tes->contribucion}}" required="required">
                            </div>
                        </div>

                @if($com!=null)  

            
                         <div class="form-group row">
                            <label for="profesor1_comision" class="col-md-4 col-form-label text-md-right">{{ __('Primer profesor comision') }}</label>
                           <div class="col-md-6">
                                 
                                 <select name="profesor1_comision" id="profesor1_comision" class="form-control"  required>
                                    <option value="{{$com->profesor1_comision}}">{{$com->profesor1_comision}}</option>
                                    @foreach($profes as $profe)
                                    <option value="{{$profe->name}}">{{$profe->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profesor2_comision" class="col-md-4 col-form-label text-md-right">{{ __('Segundo Profesor comision') }}</label>
                            <div class="col-md-6">
                                 <select name="profesor2_comision" id="profesor2_comision" class="form-control" required>
                                    <option value="{{$com->profesor2_comision}}">{{$com->profesor2_comision}}</option>
                                    @foreach($profes as $profe)
                                    <option value="{{$profe->name}}">{{$profe->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profesor3_comision" class="col-md-4 col-form-label text-md-right">{{ __('Tercer Profesor comision') }}</label>
                            <div class="col-md-6">
                                 <select name="profesor3_comision" id="profesor3_comision" class="form-control">
                                    <option value="{{$com->profesor3_comision}}">{{$com->profesor3_comision}}</option>
                                    <option value="Ninguno">Ninguno</option>
                                    @foreach($profes as $profe)
                                    <option value="{{$profe->name}}">{{$profe->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profesor1_externo" class="col-md-4 col-form-label text-md-right">{{ __('Primer profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="profesor1_externo" type="text" class="form-control" name="profesor1_externo" value="{{$com->profesor1_externo}}">
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="correo_profe1_externo" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="correo_profe1_externo" type="email" class="form-control @error('email') is-invalid @enderror" name="correo_profe1_externo" value="{{ $com->correo_profe1_externo}}" autocomplete="email">

                                @error('correo_profe1_externo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="institucion1" class="col-md-4 col-form-label text-md-right">{{ __('Institucion Primer Profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="institucion1" type="text" class="form-control" name="institucion1" value="{{$com->institucion1}}">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor2_externo" class="col-md-4 col-form-label text-md-right">{{ __('Segundo profesor externo')}}</label>
                            <div class="col-md-6">
                              <input id="profesor2_externo" type="text" class="form-control" name="profesor2_externo" value="{{$com->profe2_externo}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="correo_profe2_externo" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                            <div class="col-md-6">
                                <input id="correo_profe2_externo" type="email" class="form-control @error('email') is-invalid @enderror" name="correo_profe2_externo" value="{{ $com->correo_profe2_externo }}" autocomplete="email">

                                @error('correo_profe2_externo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="institucion2" class="col-md-4 col-form-label text-md-right">{{ __('Institucion Segundo Profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="institucion2" type="text" class="form-control" name="institucion2" value="{{ $com->institucion2}}">
                            </div>
                        </div>

                @else
                                <div class="form-group row">
                            <label for="profesor1_comision" class="col-md-4 col-form-label text-md-right">{{ __('Primer profesor comision') }}</label>
                           <div class="col-md-6">
                                 <select name="profesor1_comision" id="profesor1_comision" class="form-control"  required>
                                    @foreach($profes as $profe)
                                    <option value="{{$profe->name}}">{{$profe->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profesor2_comision" class="col-md-4 col-form-label text-md-right">{{ __('Segundo Profesor comision') }}</label>
                            <div class="col-md-6">
                                 <select name="profesor2_comision" id="profesor2_comision" class="form-control" required>
                                    @foreach($profes as $profe)
                                    <option value="{{$profe->name}}">{{$profe->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profesor3_comision" class="col-md-4 col-form-label text-md-right">{{ __('Tercer Profesor comision') }}</label>
                            <div class="col-md-6">
                                 <select name="profesor3_comision" id="profesor3_comision" class="form-control">
                                    <option value="{{$tes->profesor_guia}}">{{$tes->profesor_guia}}</option>
                                    <option value="Ninguno">Ninguno</option>
                                    @foreach($profes as $profe)
                                    <option value="{{$profe->name}}">{{$profe->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profesor1_externo" class="col-md-4 col-form-label text-md-right">{{ __('Primer profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="profesor1_externo" type="text" placeholder="Primer profesor externo" class="form-control" name="profesor1_externo" value="{{ old('profesor1_externo') }}">
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="correo_profe1_externo" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="correo_profe1_externo" type="email" class="form-control @error('email') is-invalid @enderror" name="correo_profe1_externo" value="{{ old('correo_profe1_externo') }}" autocomplete="email">

                                @error('correo_profe1_externo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="institucion1" class="col-md-4 col-form-label text-md-right">{{ __('Institucion Primer Profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="institucion1" type="text" placeholder="Institucion profesor externo" class="form-control" name="institucion1" value="{{ old('institucion1') }}">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor2_externo" class="col-md-4 col-form-label text-md-right">{{ __('Segundo profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="profesor2_externo" type="text" placeholder="Segundo profesor externo" class="form-control" name="profesor2_externo" value="{{ old('profesor2_externo') }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="correo_profe2_externo" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                            <div class="col-md-6">
                                <input id="correo_profe2_externo" type="email" class="form-control @error('email') is-invalid @enderror" name="correo_profe2_externo" value="{{ old('correo_profe2_externo') }}" autocomplete="email">

                                @error('correo_profe2_externo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="institucion2" class="col-md-4 col-form-label text-md-right">{{ __('Institucion Segundo Profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="institucion2" type="text" placeholder="Institucion profesor externo" class="form-control" name="institucion2" value="{{ old('institucion2') }}">
                            </div>
                        </div>


                @endif

                        @if($tes->estado3==1)
                        <div class="form-group row">
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

                                <a href="/tesis" class="btn">{{ __('Cancelar') }}</a>
                                    
                            </div>

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
