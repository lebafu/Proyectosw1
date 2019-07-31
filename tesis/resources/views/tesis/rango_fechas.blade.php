@extends('layouts.app')

@section('content')

<link href="{{asset('css/bootstrap-datepicker.standalone.css')}}" rel="stylesheet">
<script
  src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingrese rango de  fechas para obtener notas prorrogas vencidas') }}</div>

                <div class="card-body">
                    <form action="{{route('tesis.informes_rangos_fechas')}}" method="POST">
                        @csrf


                        <div class="form-group row">
                            <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Fecha inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_inicio" type="text" placeholder="Fecha inicio" class="form-control" name="fecha inicio" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_fin" class="col-md-4 col-form-label text-md-right">{{ __('Fecha fin') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_fin" type="text" placeholder="Fecha fin" class="form-control" name="fecha fin" required="required">
                            </div>
                        </div>

                 <!--
                        <input type="checkbox" name="Empresas" value="Empresas">Tesis relacionadas a empresas<br>
                        <input type="checkbox" name="Proyecto" value="Proyecto">Tesis relacionadas a proyectos<br>
                        <input type="checkbox" name="Comunidad" value="Comunidad">Tesis relacionadas a comunidad<br>
                        <input type="checkbox" name="Fondo concursable" value="Fondo concursable">Tesis relacionadas a fondo concursable<br>
                        <input type="checkbox" name="Pendientes" value="Pendientes">Conocer notas pendientes<br>
                        <input type="checkbox" name="Prorroga" value="Prorroga">Conocer notas de prorroga<br>
                        <input type="checkbox" name="Pendientes y Prorroga" value="Pendientes y Prorroga">Conocer notas pendientes y de prorroga<br>-->



                          <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Realizar consulta') }}
                                </button>

                                <a href="directorhome" class="btn">{{ __('Cancelar') }}</a>
                                    
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
</div>

<script>
    
    $('#fecha_inicio,#fecha_fin').datepicker({
        language: 'es',
        format: 'yyyy-mm-dd'
    });

</script>

 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
@endsection