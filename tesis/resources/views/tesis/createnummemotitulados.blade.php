@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Numero memorandum') }}</div>

                <div class="card-body">
                    <form action="{{route('memorandum.memorandum_titulados',$tesis->id_pk)}}" method="POST">
                        @csrf

                    <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Nº Memorandum') }}</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control" name="numero" required autocomplete="numero" requeired>
                            </div>
                        </div>

                            <div class="col-md-6">
                                <input id="id_tesis" type="hidden" class="form-control" name="id_tesis" value="{{$tesis->id_pk}}" required autocomplete="numero" required>
                            </div>
                        </div>

                        <!--Tipe hidden permite ocultar campo que se pasa a controlador memorandum_titulados -->




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                <a href="/secretariahome" class="btn">{{ __('Cancelar') }}</a>
                                    
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