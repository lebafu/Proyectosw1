@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar bitacora') }}</div>

                <div class="card-body">
                    <form action="{{route('bitacora.update', $id)}}" method="POST">
                        @csrf

                        <div class="form-group row">
                                <label for="comentario" class="col-md-4 col-form-label text-md-right">{{ __('comentario') }}</label>
                                 <div class="col-md-6">
                                <textarea name="comentario" type="text" rows="10" cols="40" class="form-control" required="required" value="{{$bitacora->comentario}}">{{$bitacora->comentario}}</textarea>
                             </div>
                        </div>


                         <div class="form-group row">
                                <label for="acuerdo" class="col-md-4 col-form-label text-md-right">{{ __('acuerdo') }}</label><div class="col-md-6">
                                <textarea name="acuerdo" type="text" rows="10" cols="40" class="form-control" required="required" value="{{$bitacora->acuerdo}}">{{$bitacora->acuerdo}}</textarea>
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
