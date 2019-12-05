@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Perfil Profesor') }}</div>

                <div class="card-body">
                    <form action="{{route('users.update_profesor', $profesor->id)}}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre completo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $profesor->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $profesor->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> 

                         <div class="form-group row">
                            <label for="tipo_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                @if($profesor->tipo_usuario==2)
                                <input id="tipo_usuario" type="text" class="form-control" name="tipo_usuario" value="Profesor" required disabled>
                                @endif
                            </div>
                        </div> 

                         <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>
                            <div class="col-md-6">
                                  <select name="sexo" id="sexo" type="text" class="form-control" required="required">
                                <option value="{{$profesor->sexo}}">{{$profesor->sexo}}</option>
                                <option value="Masculino">Masculino</option>
                                 <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>


                          <div class="form-group row">
                            <label for="grado_academico" class="col-md-4 col-form-label text-md-right">{{ __('Grado academico') }}</label>
                            <div class="col-md-6">
                                <select name="grado_academico" id="grado_academico" type="text" class="form-control" required="required">
                                <option value="{{$profesor_grado_academico->grado_academico}}">{{$profesor_grado_academico->grado_academico}}</option>
                                <option value="Ing.">Ingeniero</option>
                                 <option value="Mg.">Magister</option>
                                 <option value="Dr.">Doctor</option>
                                 <option value="Dra.">Doctora</option>
                                </select>
                            </div>
                        </div>

                        


                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                <a href="/profesorhome" class="btn">{{ __('Cancelar') }}</a>
                                    
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
