@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Area de Tesis') }}</div>

                <div class="card-body">
                    <form action="{{route('area_tesis.store')}}" method="POST">
                        @csrf

                       

                         <div class="form-group row">
                            <label for="area_tesis" class="col-md-4 col-form-label text-md-right">{{ __('Crear Area de Tesis') }}</label>
                            <div class="col-md-6">
                                <input id="area_tesis" type="text" placeholder="nombre de area de tesis" class="form-control" name="area_tesis" required="required">
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
