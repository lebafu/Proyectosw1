@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"></script>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingrese fecha de presentacion') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.update_fecha_presentacion', $tesis->id_pk)}}" method="POST">
                        @csrf

                        <div class="row">
                            

                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Presentacion Tesis') }}</label>
                            <div class='col-md-6'>
                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                    <input type='text' name='fecha_presentacion_tesis' id='fecha_presentacion_tesis' class="form-control datetimepicker-input" data-target="#datetimepicker2" />
                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                           <!-- <div class='input-group date' >
                            <input />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>-->
                </div>
            </div>

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

<!-- Con format se escoge el formate de datetimepicker, ademas con enable hours se seleccionan las horas disponibles, con dayofweekdisabled se desabilita el dia domingo, y con stepping se define la distancia entre los minutos del calendario en este caso 60 minutos -->
<script>
$(function () {
    $('#datetimepicker2').datetimepicker({
        locale: 'es',
        format: 'YYYY-MM-DD HH:mm',   
        enabledHours: [15, 16, 17, 18, 19, 20],
        daysOfWeekDisabled: [0],
        stepping:60

    });
});
</script>
@endsection

   