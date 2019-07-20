@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Tesis') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.save_nota_prorroga', $tes->id)}}" method="POST">
                        @csrf


                            <div class="form-group row">
                            <label for="nota_prorroga" class="col-md-4 col-form-label text-md-right">{{ __('Nota_pendiente') }}</label>
                            <div class="col-md-6">
                                <input id="nota_prorroga" type="text" placeholder="Nota Prorroga" class="form-control" name="nota_prorroga" required="required">
                            </div>
                        </div>


                          <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                <a href="/tesis_alumno_solicitud" class="btn">{{ __('Cancelar') }}</a>
                                    
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