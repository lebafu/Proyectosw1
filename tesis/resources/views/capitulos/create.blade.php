@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                  <div class="card-header">{{ __('Crear Comentario nuevo') }}</div>

                <div class="card-body">
                    <form action="{{route('capitulos.store')}}" method="POST">
                        @csrf


                         <!--<div class="form-group row">
                            <label for="id_tesis" class="col-md-4 col-form-label text-md-right">{{ __('ID TESIS') }}</label>
                            <div class="col-md-6">-->
                                <input id="id_tesis" type="hidden" placeholder="Id Tesis" class="form-control" name="id_tesis" value="{{$id}}" required="required">
                          


                         <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap1 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap1" type="text" rows="10" cols="40" placeholder="Nombre cap1 tesis" class="form-control" name="cap1" required="required">Nombre Capitulo 1 Tesis</textarea>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="cap2" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap2 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap2" type="text" rows="10" cols="40" placeholder="Nombre cap2 tesis" class="form-control" name="cap2" required="required">Nombre Capitulo 2 Tesis</textarea>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="cap3" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap3 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap3" type="text" rows="10" cols="40" placeholder="Nombre cap3 tesis" class="form-control" name="cap3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cap4" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap4 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap4" type="text" rows="10" cols="40" placeholder="Nombre cap4 tesis" class="form-control" name="cap4"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cap5" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap5 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap5" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap5"></textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cap6" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap6 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap6" type="text" rows="10" cols="40" placeholder="Nombre cap6 tesis" class="form-control" name="cap6 tesis"></textarea>
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
