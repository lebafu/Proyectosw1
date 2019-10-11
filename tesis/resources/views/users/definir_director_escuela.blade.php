@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar usuarios') }}</div>

                <div class="card-body">
                        <form action="{{route('users.guardar_director_escuela')}}" method="POST">
                        @csrf


                         <div class="form-group row">
                            <label for="profesor" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
                            <div class="col-md-6">
                                <select name="profesor" id="profesor" type="text" class="form-control" required="required">
                                @foreach($profes as $profe)
                                <option value="{{$profe->id}}">{{$profe->name}}</option>
                                @endforeach
                                 </select>
                            </div>
                        </div>
                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                <a href="/users" class="btn">{{ __('Cancelar') }}</a>
                                    
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
