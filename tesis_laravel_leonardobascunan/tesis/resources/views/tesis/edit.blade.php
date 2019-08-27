@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar tesis alumno') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.update', $tes->id)}}" method="POST">
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
                                 <option value="Fondo concusable"> Fondo concursable</option>
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

                                <a href="/home" class="btn">{{ __('Cancelar') }}</a>
                                    
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
