@extends('layouts.app')

@section('content')
    <meta charset="utf-8">
    <title>Create Word File in Laravel</title>
    <link href="{{asset('css/bootstrap-datepicker.standalone.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}"></script>
  <body>
    <div class="container">
      <h2>Crear archivo Word con Lista de Tesis</h2><br/>
      <form method="post" action="{{url('store')}}">
        @csrf

        <div class="form-group row">
                <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Fecha inicio') }}</label>
             <div class="col-md-6">
             <input id="fecha_inicio" type="date" placeholder="Fecha inicio" class="form-control" name="fecha inicio" required="required">
             </div>
        </div>
        
        <div class="form-group row">
            <label for="fecha_fin" class="col-md-4 col-form-label text-md-right">{{ __('Fecha fin') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_fin" type="date" placeholder="Fecha fin" class="form-control" name="fecha fin" required="required">
                            </div>
                        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </form>
   </div>
  </body>
</html>

<script>
    
    $('#fecha_inicio,#fecha_fin').datepicker({
        language: 'es',
        format: 'yyyy-mm-dd',
    });

</script>

 <a href="{{ url()->previous() }}" class="btn btn-default">Volver atras</a>
@endsection


