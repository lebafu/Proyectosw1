@extends('layouts.app')

@section('content')


<link href="{{asset('css/bootstrap-datepicker.standalone.css')}}" rel="stylesheet">
<script src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}"></script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Aceptar nota prorroga') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.prorroga_director_update', $tesis->id)}}" method="POST">
                        @csrf

                       
						<div class="form-group row">
                            <label for="nota_prorroga" class="col-md-4 col-form-label text-md-right">{{ __('Nota_prorroga') }}</label>
                            <div class="col-md-6">
                                <input id="nota_prorroga" type="text" placeholder="Nota Prorroga" class="form-control" name="nota_prorroga" value="{{$tesis->nota_prorroga}}"required="required">
                            </div>
                        </div>

                         

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aceptar') }}
                                </button>

                                <a href="/home" class="btn">{{ __('Cancelar') }}</a>
                                    
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

<script>
    
    $('#nota_prorroga').datepicker({
        language: 'es',
        format: 'yyyy-mm-dd'
    });

</script>
@endsection
