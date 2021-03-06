@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear grado academico profesor') }}</div>

                <div class="card-body">
                    <form action="{{route('users.store_grado_academico', $profesor->id)}}" method="POST">
                        @csrf



                       
                          <div class="form-group row">
                            <label for="grado_academico" class="col-md-4 col-form-label text-md-right">{{ __('Grado academico') }}</label>
                            <div class="col-md-6">
                                <select name="grado_academico" id="grado_academico" type="text" class="form-control" required="required">
                                <option value="Ing.">Ingeniero</option>
                                 <option value="Mg.">Magister</option>
                                 <option value="Dr.">Doctor</option>
                                 <option value="Dra.">Doctora</option>
                                </select>
                            </div>
                        </div>


                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                
                                    
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
