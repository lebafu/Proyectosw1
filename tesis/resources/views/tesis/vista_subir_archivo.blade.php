@extends('layouts.app')

@section('content')
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
            @else

                     <div class="form-group row">
                            <label for="constancia_ex" class="col-md-4 col-form-label text-md-right">{{ __('Subir archivo de constancia de examen de titulo') }}</label>
                            <div class="col-md-6"> 
                                <input id="constancia_ex" type="file" class="form-control" name="constancia_ex" value="{{$tes->constancia_ex}}">
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
