@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                  <div class="card-header">{{ __('Crear Comentario nuevo') }}</div>

                <div class="card-body">
                    <form action="{{route('bitacora.store')}}" method="POST">
                        @csrf


                         <!--<div class="form-group row">
                            <label for="id_tesis" class="col-md-4 col-form-label text-md-right">{{ __('ID TESIS') }}</label>
                            <div class="col-md-6">-->
                                <input id="id_tesis" type="hidden" placeholder="Id Tesis" class="form-control" name="id_tesis" value="{{$id}}" required="required">
                          


            

                            <!--Para efectos de vista-->
                        <div class="form-group row">
                                <label for="comentario" class="col-md-4 col-form-label text-md-right">{{ __('comentario') }}</label>
                                 <div class="col-md-6">
                                <textarea name="comentario" type="text" rows="10" cols="40" class="form-control" required="required" disabled >No hay comentarios</textarea>
                             </div>
                        </div>


                            <!--Para enviar información de no hay comentarios al controlador BitacoraControllerr-->
                            <div class="col-md-6">
                                <textarea name="comentario" type="hide" style="display:none;">No hay comentarios</textarea>
                             </div>
                
                                <!--Para efectos de vista-->
                              <div class="form-group row">
                                <label for="acuerdo" class="col-md-4 col-form-label text-md-right">{{ __('acuerdo') }}</label><div class="col-md-6">
                                <textarea name="acuerdo" type="text" rows="10" cols="40" class="form-control" required="required" disabled>No hay acuerdos</textarea>
                             </div>
                        </div>

                                <!--Para enviar información de no hay acuerdos al controlador BitacoraControllerr-->
                         <div class="col-md-6">
                                <textarea name="acuerdo" type="hide" style="display:none;">No hay acuerdos</textarea>
                             </div>
                


                         <div class="form-group row">
                                <label for="reunion" class="col-md-4 col-form-label text-md-right">{{ __('Reunion') }}</label><div class="col-md-6">
                                 <select name="reunion" id="reunion" class="form-control" required>
                                    <option value=1>Permanente:Al menos una vez cada 2 semanas></option>
                                    <option value=2>Parcial:Al menos una vez al mes</option>
                                    <option value=3>No se reunion: Ni siquiera una vez al mes</option>
                                </select>
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
