@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingrese nota de tesis del alumno') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.update_nota_tesis', $tesis->id_pk)}}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nota Tesis') }}</label>
                            <div class="col-md-6">
                              <input id="nota_tesis" type="text" class="form-control" name="nota_tesis" required="required">
                               </div>
                        </div>



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

