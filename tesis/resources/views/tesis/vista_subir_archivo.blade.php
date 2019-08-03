@extends('layouts.app')

@section('content')

@if(session()->has('msj'))
    <div class="alert alert-success", role="alert">{{ session('msj')}}</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subir archivo constancia examen de titulo') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.update_archivo_ex', $tes->id)}}" method="POST" 
                        enctype="multipart/form-data">

                        @csrf

            @if($tes->constancia_ex==null)
                       <div class="form-group row">
                            <label for="constancia_ex" class="col-md-4 col-form-label text-md-right">{{ __('Subir archivo de constancia de examen de titulo') }}</label>
                            <div class="col-md-6">
                                <input id="constancia_ex" type="file" class="form-control" name="constancia_ex" value="{{$tes->constancia_ex}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="abstract" class="col-md-4 col-form-label text-md-right">{{ __('Abstract') }}</label>
                             <div class="col-md-6">
                                <textarea id="abstract" name="abstract" type="text" rows="10" cols="40" class="form-control" required="required" >Copie aqui su abstract o resumen.</textarea>
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="publicar" class="col-md-4 col-form-label text-md-right">{{ __('Publicar') }}</label>
                            <div class="col-md-6">
                               <input type="checkbox" name="publicar" value="1"><br>
                            </div>
                        </div>
            @else

                     <div class="form-group row">
                            <label for="constancia_ex" class="col-md-4 col-form-label text-md-right">{{ __('Subir archivo de constancia de examen de titulo') }}</label>
                            <div class="col-md-6"> 
                                <input id="constancia_ex" type="file" class="form-control" name="constancia_ex" value="{{$tes->constancia_ex}}">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="abstract" class="col-md-4 col-form-label text-md-right">{{ __('Abstract') }}</label>
                            <div class="col-md-6">
                                <textarea id="abstract" name="abstract" type="text" rows="10" cols="40" class="form-control" required="required" >{{$tes->abstract}}</textarea>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="publicar" class="col-md-4 col-form-label text-md-right">{{ __('Publicar') }}</label>
                            <div class="col-md-6">
                               <input type="checkbox" name="publicar" value="1">Permitir descarga de repositorio de Tesis<br>
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
