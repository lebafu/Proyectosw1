@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Tesis') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.store')}}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="nota_pendiente" class="col-md-4 col-form-label text-md-right">{{ __('Nota Pendiente') }}</label>

                            <div class="form-group row">
                            <label for="nota_pendiente" class="col-md-4 col-form-label text-md-right">{{ __('Nota_pendiente') }}</label>
                            <div class="col-md-6">
                                <input id="nota_pendiente" type="text" placeholder="Nota Pendiente" class="form-control" name="nota_pendiente" required="required">
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