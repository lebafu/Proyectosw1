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
                            </div>
                        </div>


                         <div class="form-group row">
                                <label for="comentario" class="col-md-4 col-form-label text-md-right">{{ __('comentario') }}</label>
                                 <div class="col-md-6">
                                <textarea name="comentario" type="text" rows="10" cols="40" class="form-control" required="required" >Escriba aqui el comentario</textarea>
                             </div>
                        </div>


                         <div class="form-group row">
                                <label for="acuerdo" class="col-md-4 col-form-label text-md-right">{{ __('acuerdo') }}</label><div class="col-md-6">
                                <textarea name="acuerdo" type="text" rows="10" cols="40" class="form-control" required="required" >Escriba aqui el acuerdo</textarea>
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
