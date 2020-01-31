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
                <div class="card-header">{{ __('Ingrese fecha para nota Pendiente') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.save_nota_pendiente',$tes->id)}}" method="POST">
                        @csrf


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

<script type="text/javascript">
    var date =new Date();
    $('#nota_pendiente').datepicker({
        startDate:date,
        language: 'es',
        format: 'yyyy-mm-dd',
    });

</script>

<a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
@endsection