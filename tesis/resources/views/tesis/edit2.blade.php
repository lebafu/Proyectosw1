@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profesor editando tesis de alumno') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.update2', $tes->id_pk)}}" method="POST">
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
                            <label for="telefono1" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono1" type="text" placeholder="12345678" class="form-control" name="telefono1" value="{{$tes->telefono1}}"required="required">
                            </div>
                        </div>


                        <!--En caso de que se deje el nombre completo 2 en nulo significa que la tesis es individual y entonces lo de este if no iría en la vista del profesor -->
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
                            <label for="ano_ingreso2" class="col-md-4 col-form-label text-md-right">{{ __('Año Ingreso') }}</label>
                            <div class="col-md-6">
                                <input id="ano_ingreso2" type="text" placeholder="año ingreso" class="form-control" name="ano_ingreso2" value="{{$tes->ano_ingreso2}}" required="required">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="telefono2" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono2" type="text" class="form-control" name="telefono2" value="{{$tes->telefono2}}"required="required">
                            </div>
                        </div>


                      @endif


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
                                <option value="{{ $tes->area_tesis}}">{{$tes->area_tesis}}</option>
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
                                 <option value="Fondo concursable">Fondo concursable</option>
                                 <option value="Comunidad">Comunidad</option>
                                 </select>
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Vinculacion') }}</label>
                            <div class="col-md-6">
                            <select name="nombre_vinculacion" id="nombre_vinculacion" class="form-control" required>
                              <option value="{{$tes->nombre_vinculacion}}">{{$tes->nombre_vinculacion}}</option>
                                  @if($tes->tipo_vinculacion=="Empresa")
                                    @foreach($empresas as $emp)
                                    <option value="{{$emp->nombre}}">{{$emp->nombre}}</option>
                                    @endforeach
                                  @elseif($tes->tipo_vinculacion=="Comunidad")
                                     @foreach($comunidads as $comunidad)
                                    <option value="{{$comunidad->nombre}}">{{$comunidad->nombre}}</option>
                                    @endforeach
                                  @elseif($tes->tipo_vinculacion=="Proyecto")
                                    @foreach($proyectos as $proyecto)
                                    <option value="{{$proyecto->nombre}}">{{$proyecto->nombre}}</option>
                                    @endforeach
                                  @else
                                     @foreach($fcs as $fc)
                                    <option value="{{$fc->nombre}}">{{$fc->nombre}}</option>
                                    @endforeach
                                  @endif
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


                <!--En caso de que la comision no se haya creado entonces mostrara los select list a los que puede acceder el profesor y los demás campos en blanco-->
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
                            <label for="coguia" class="col-md-4 col-form-label text-md-right">{{ __('Coguia') }}</label>
                            <div class="col-md-6">
                                <select name="coguia" id="coguia" class="form-control">
                                   @if($com->coguia==1)
                                    <option value="{{$com->coguia}}">Si</option>
                                  @endif
                                    @if($com->coguia==0)
                                    <option value="{{$com->coguia}}">No</option>
                                  @endif
                                    <option value=1>Si</option>
                                    <option value=0>No</option>
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
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Grado Academico') }}</label>
                            <div class="col-md-6">
                                <select name="profesor1_grado_academico" id="profesor1_grado_academico" type="text" class="form-control">
                                <option value="{{$com->profesor1_grado_academico}}">{{$com->profesor1_grado_academico}}</option>
                                 <option value="Ing.">Ing.</option>
                                 <option value="Mg.">Mg.</option>
                                 <option value="Dr.">Dr.</option>
                                 </select>
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
                            <label for="codigo_postal1" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Postal') }}</label>
                            <div class="col-md-6">
                                <input id="codigo_postal1" type="text" placeholder="codigo_postal" class="form-control" name="codigo_postal1" value="{{$com->codigo_postal1}}">
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="sexo1" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>
                            <div class="col-md-6">
                                 <select name="sexo1" id="sexo1" type="text" class="form-control" required="required">
                                <option value="{{$com->sexo1}}">{{$com->sexo1}}</option>
                                <option value="Masculino">Masculino</option>
                                 <option value="Femenino">Femenino</option>
                                 </select>
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
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Grado Academico') }}</label>
                            <div class="col-md-6">
                                <select name="profe2_grado_academico" id="profe2_grado_academico" type="text" class="form-control">
                                <option value="{{$com->profe2_grado_academico}}">{{$com->profe2_grado_academico}}</option>
                                <option value=""></option>
                                 <option value="Ing.">Ing.</option>
                                 <option value="Mg.">Mg.</option>
                                 <option value="Dr.">Dr.</option>
                                 </select>
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
                            <label for="sexo2" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>
                            <div class="col-md-6">
                                 <select name="sexo2" id="sexo2" type="text" class="form-control" required="required">
                                <option value="{{$com->sexo2}}">{{$com->sexo2}}</option>
                                <option value="Masculino">Masculino</option>
                                 <option value="Femenino">Femenino</option>
                                 </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="codigo_postal2" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Postal') }}</label>
                            <div class="col-md-6">
                                <input id="codigo_postal2" type="text" placeholder="codigo_postal2" class="form-control" name="codigo_postal2" value="{{$com->codigo_postal2}}">
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="institucion2" class="col-md-4 col-form-label text-md-right">{{ __('Institucion Segundo Profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="institucion2" type="text" class="form-control" name="institucion2" value="{{ $com->institucion2}}">
                            </div>
                        </div>

                        @if($cap==null)
                        <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap1 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap1" type="text" rows="10" cols="40" placeholder="Nombre cap1 tesis" class="form-control" name="cap1" required="required">Nombre Capitulo 1 Tesis</textarea>
                            </div>
                        </div>
                        @elseif($cap->cap1==null)
                        <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap1 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap1" type="text" rows="10" cols="40" placeholder="Nombre cap1 tesis" class="form-control" name="cap1" required="required">Nombre Capitulo 1 Tesis</textarea>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap1 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap1" type="text" rows="10" cols="40" placeholder="Nombre cap1 tesis" class="form-control" name="cap1" required="required" value="{{old('cap1')}}">{{$cap->cap1}}</textarea>
                            </div>
                        </div>
                        @endif

                        @if($cap==null)
                        <div class="form-group row">
                            <label for="cap2" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap2 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap2" type="text" rows="10" cols="40" placeholder="Nombre cap2 tesis" class="form-control" name="cap2" required="required">Nombre Capitulo 2 Tesis</textarea>
                            </div>
                        </div>
                        @elseif($cap->cap2==null)
                         <div class="form-group row">
                            <label for="cap2" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap2 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap2" type="text" rows="10" cols="40" placeholder="Nombre cap2 tesis" class="form-control" name="cap2" required="required">Nombre Capitulo 2 Tesis</textarea>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="cap2" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap2 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap2" type="text" rows="10" cols="40" placeholder="Nombre cap2 tesis" class="form-control" name="cap2" required="required" value="{{old('cap2')}}">{{$cap->cap2}}</textarea>
                            </div>
                        </div>
                        @endif
                            @if($cap==null)
                               <div class="form-group row">
                            <label for="cap3" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap3 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap3" type="text" rows="10" cols="40" placeholder="Nombre cap3 tesis" class="form-control" name="cap3"></textarea>
                            </div>
                        </div>
                           @elseif($cap->cap3==null)
                         <div class="form-group row">
                            <label for="cap3" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap3 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap3" type="text" rows="10" cols="40" placeholder="Nombre cap3 tesis" class="form-control" name="cap3"></textarea>
                            </div>
                        </div>
                          @else
                          <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap3 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap3" type="text" rows="10" cols="40" placeholder="Nombre cap3 tesis" class="form-control" name="cap3" required="required" value="{{old('cap3')}}">{{$cap->cap3}}</textarea>
                            </div>
                        </div>
                          @endif

                            @if($cap==null)
                             <div class="form-group row">
                            <label for="cap4" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap4 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap4" type="text" rows="10" cols="40" placeholder="Nombre cap4 tesis" class="form-control" name="cap4"></textarea>
                            </div>
                        </div>
                           @elseif($cap->cap4==null)
                        <div class="form-group row">
                            <label for="cap4" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap4 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap4" type="text" rows="10" cols="40" placeholder="Nombre cap4 tesis" class="form-control" name="cap4"></textarea>
                            </div>
                        </div>
                          @else
                          <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap4 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap4" type="text" rows="10" cols="40" placeholder="Nombre cap4 tesis" class="form-control" name="cap4" required="required" value="{{old('cap4')}}">{{$cap->cap4}}</textarea>
                            </div>
                        </div>
                          @endif
                        @if($cap==null)
                         <div class="form-group row">
                            <label for="cap5" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap5 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap5" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap5"></textarea>
                            </div>
                        </div>

                        @elseif($cap->cap5==null)
                        <div class="form-group row">
                            <label for="cap5" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap5 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap5" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap5"></textarea>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap5 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap5" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap5" required="required" value="{{old('cap5')}}">{{$cap->cap5}}</textarea>
                            </div>
                        </div>
                        @endif
                        @if($cap==null)
                           <div class="form-group row">
                            <label for="cap6" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap6 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap6" type="text" rows="10" cols="40" placeholder="Nombre cap6 tesis" class="form-control" name="cap6"></textarea>
                            </div>
                        </div>
                        @elseif($cap->cap6==null)
                        <div class="form-group row">
                            <label for="cap6" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap6 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap6" type="text" rows="10" cols="40" placeholder="Nombre cap6 tesis" class="form-control" name="cap6"></textarea>
                            </div>
                        </div>
                        @else 
                        <div class="form-group row">
                            <label for="cap6" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap6 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap6" type="text" rows="10" cols="40" placeholder="Nombre cap6 tesis" class="form-control" name="cap6" required="required" value="{{old('cap6')}}">{{$cap->cap6}}</textarea>
                            </div>
                        </div>
                        @endif
               <!--En caso contrario si el profesor ya ha ingresado a los miembros de la comisión y desea editar, se le mostrarán los campos que el haya seleccionado previamente-->
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
                            <label for="coguia" class="col-md-4 col-form-label text-md-right">{{ __('Coguia') }}</label>
                            <div class="col-md-6">
                                <select name="coguia" id="coguia" class="form-control">
                                    <option value=1>Si</option>
                                    <option value=0>No</option>
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
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Grado Academico') }}</label>
                            <div class="col-md-6">
                                <select name="profesor1_grado_academico" id="profesor1_grado_academico" type="text" class="form-control" required>
                                 <option value="Ing.">Ing.</option>
                                 <option value="Mg.">Mg.</option>
                                 <option value="Dr.">Dr.</option>
                                 </select>
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
                            <label for="sexo1" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>
                            <div class="col-md-6">
                                 <select name="sexo1" id="sexo1" type="text" class="form-control" required="required">
                                <option value="Masculino">Masculino</option>
                                 <option value="Femenino">Femenino</option>
                                 </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="codigo_postal1" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Postal') }}</label>
                            <div class="col-md-6">
                                <input id="codigo_postal1" type="text" placeholder="codigo postal" class="form-control" name="codigo_postal1" value="{{old('codigo_postal1')}}">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor2_externo" class="col-md-4 col-form-label text-md-right">{{ __('Segundo profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="profesor2_externo" type="text" placeholder="Segundo profesor externo" class="form-control" name="profesor2_externo" value="{{ old('profesor2_externo') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Grado Academico') }}</label>
                            <div class="col-md-6">
                                <select name="profe2_grado_academico" id="profe2_grado_academico" type="text" class="form-control" required>
                                 <option value="Ing.">Ing.</option>
                                 <option value="Mg.">Mg.</option>
                                 <option value="Dr.">Dr.</option>
                                 </select>
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


                         <div class="form-group row">
                            <label for="sexo2" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>
                            <div class="col-md-6">
                                 <select name="sexo2" id="sexo2" type="text" class="form-control" required="required">
                                <option value="Masculino">Masculino</option>
                                 <option value="Femenino">Femenino</option>
                                 </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="codigo_postal2" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Postal') }}</label>
                            <div class="col-md-6">
                                <input id="codigo_postal2" type="text" placeholder="codigo_postal" class="form-control" name="codigo_postal2" value="{{old('codigo_postal2')}}">
                            </div>
                        </div>

                                       @if($cap==null)
                        <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap1 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap1" type="text" rows="10" cols="40" placeholder="Nombre cap1 tesis" class="form-control" name="cap1" required="required">Nombre Capitulo 1 Tesis</textarea>
                            </div>
                        </div>
                        @elseif($cap->cap1==null)
                        <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap1 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap1" type="text" rows="10" cols="40" placeholder="Nombre cap1 tesis" class="form-control" name="cap1" required="required">Nombre Capitulo 1 Tesis</textarea>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap1 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap1" type="text" rows="10" cols="40" placeholder="Nombre cap1 tesis" class="form-control" name="cap1" required="required" value="{{old('cap1')}}">{{$cap->cap1}}</textarea>
                            </div>
                        </div>
                        @endif

                        @if($cap==null)
                        <div class="form-group row">
                            <label for="cap2" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap2 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap2" type="text" rows="10" cols="40" placeholder="Nombre cap2 tesis" class="form-control" name="cap2" required="required">Nombre Capitulo 2 Tesis</textarea>
                            </div>
                        </div>
                        @elseif($cap->cap2==null)
                         <div class="form-group row">
                            <label for="cap2" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap2 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap2" type="text" rows="10" cols="40" placeholder="Nombre cap2 tesis" class="form-control" name="cap2" required="required">Nombre Capitulo 2 Tesis</textarea>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="cap2" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap2 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap2" type="text" rows="10" cols="40" placeholder="Nombre cap2 tesis" class="form-control" name="cap2" required="required" value="{{old('cap2')}}">{{$cap->cap2}}</textarea>
                            </div>
                        </div>
                        @endif
                            @if($cap==null)
                               <div class="form-group row">
                            <label for="cap3" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap3 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap3" type="text" rows="10" cols="40" placeholder="Nombre cap3 tesis" class="form-control" name="cap3"></textarea>
                            </div>
                        </div>
                           @elseif($cap->cap3==null)
                         <div class="form-group row">
                            <label for="cap3" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap3 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap3" type="text" rows="10" cols="40" placeholder="Nombre cap3 tesis" class="form-control" name="cap3"></textarea>
                            </div>
                        </div>
                          @else
                          <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap3 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap3" type="text" rows="10" cols="40" placeholder="Nombre cap3 tesis" class="form-control" name="cap3" required="required" value="{{old('cap3')}}">{{$cap->cap3}}</textarea>
                            </div>
                        </div>
                          @endif

                            @if($cap==null)
                             <div class="form-group row">
                            <label for="cap4" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap4 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap4" type="text" rows="10" cols="40" placeholder="Nombre cap4 tesis" class="form-control" name="cap4"></textarea>
                            </div>
                        </div>
                           @elseif($cap->cap4==null)
                        <div class="form-group row">
                            <label for="cap4" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap4 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap4" type="text" rows="10" cols="40" placeholder="Nombre cap4 tesis" class="form-control" name="cap4"></textarea>
                            </div>
                        </div>
                          @else
                          <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap4 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap4" type="text" rows="10" cols="40" placeholder="Nombre cap4 tesis" class="form-control" name="cap4" required="required" value="{{old('cap4')}}">{{$cap->cap4}}</textarea>
                            </div>
                        </div>
                          @endif
                        @if($cap==null)
                         <div class="form-group row">
                            <label for="cap5" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap5 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap5" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap5"></textarea>
                            </div>
                        </div>

                        @elseif($cap->cap5==null)
                        <div class="form-group row">
                            <label for="cap5" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap5 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap5" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap5"></textarea>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap5 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap5" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap5" required="required" value="{{old('cap5')}}">{{$cap->cap5}}</textarea>
                            </div>
                        </div>
                        @endif
                        @if($cap==null)
                           <div class="form-group row">
                            <label for="cap6" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap6 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap6" type="text" rows="10" cols="40" placeholder="Nombre cap6 tesis" class="form-control" name="cap6"></textarea>
                            </div>
                        </div>
                        @elseif($cap->cap6==null)
                        <div class="form-group row">
                            <label for="cap6" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap6 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap6" type="text" rows="10" cols="40" placeholder="Nombre cap6 tesis" class="form-control" name="cap6"></textarea>
                            </div>
                        </div>
                        @else 
                        <div class="form-group row">
                            <label for="cap6" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap6 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap6" type="text" rows="10" cols="40" placeholder="Nombre cap6 tesis" class="form-control" name="cap6" required="required" value="{{old('cap6')}}">{{$cap->cap6}}</textarea>
                            </div>
                        </div>
                        @endif

                @endif

                        @if($tes->estado3==1)
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

                                <a href="/profesorhome" class="btn">{{ __('Cancelar') }}</a>
                                    
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
