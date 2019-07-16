@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear comision') }}</div>

                <div class="card-body">
                    <form action="{{route('comision.store')}}" method="POST">
                        @csrf

                         <div class="form-group row">
                            <label for="id_profesor_guia" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Profesor Guia') }}</label>
                            <div class="col-md-6">
                                 <select name="id_profesor_guia" id="id_profesor_guia" class="form-control" required>
                                    @foreach($profesor_guia as $profe)
                                    <option value="{{$profe->id}}">{{$profe->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="nombre_alumno" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Alumno') }}</label>
                            <div class="col-md-6">
                                <input id="nombre_alumno" type="text" placeholder="nombre_alumno" class="form-control" name="nombre_alumno" required="required">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor1_comision" class="col-md-4 col-form-label text-md-right">{{ __('Primer profesor comision') }}</label>
                            <div class="col-md-6">
                                <input id="profesor1_comision" type="text" placeholder="profesor1 comision" class="form-control" name="profesor1_comision" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profesor2_comision" class="col-md-4 col-form-label text-md-right">{{ __('Segundo Profesor comision') }}</label>
                            <div class="col-md-6">
                                <input id="profesor2_comision" type="text" placeholder="profesor2 comision" class="form-control" name="profesor2_comision" required="required">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profesor3_comision" class="col-md-4 col-form-label text-md-right">{{ __('Tercer Profesor comision') }}</label>
                            <div class="col-md-6">
                                <input id="profesor3_comision" type="text" placeholder="profesor3 comision" class="form-control" name="profesor3_comision" required="required">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Primer profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="profesor1_externo" type="text" placeholder="Primer profesor externo" class="form-control" name="profesor1_externo" required="required">
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="correo_profe1_externo" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="correo_profe1_externo" type="email" class="form-control @error('correo_profe1_externo') is-invalid @enderror" name="correo_profe1_externo" value="{{ old('correo_profe1_externo') }}" required autocomplete="email">

                                @error('correo_profe1_externo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Institucion Primer Profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="institicion1" type="text" placeholder="Institucion profesor externo" class="form-control" name="institicion1" required="required">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="profesor2_externo" class="col-md-4 col-form-label text-md-right">{{ __('Segundo profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="profesor2_externo" type="text" placeholder="Segundo profesor externo" class="form-control" name="profesor2_externo" required="required">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="correo_profe2_externo" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                            <div class="col-md-6">
                                <input id="correo_profe2_externo" type="email" class="form-control @error('email') is-invalid @enderror" name="correo_profe2_externo" value="{{ old('correo_profe2_externo') }}" required autocomplete="email">

                                @error('correo_profe2_externo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Institucion Segundo Profesor externo') }}</label>
                            <div class="col-md-6">
                              <input id="institicion2" type="text" placeholder="Institucion profesor externo" class="form-control" name="institicion2" required="required">
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                <a href="/tesis" class="btn">{{ __('Cancelar') }}</a>
                                    
                            </div>

        
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
