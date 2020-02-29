@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Nombres de Capitulos de Tesis') }}</div>

                <div class="card-body">
                    <form action="{{route('capitulos.update_nombres', $id)}}" method="POST">
                        @csrf

                         <div class="form-group row">
                            <label for="cap1" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap1 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap1" type="text" rows="10" cols="40" placeholder="Nombre cap1 tesis" class="form-control" name="cap1" required="required" value="{{$capitulo->cap1}}">{{$capitulo->cap1}}</textarea>
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="cap2" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap2 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap2" type="text" rows="10" cols="40" placeholder="Nombre cap2 tesis" class="form-control" name="cap2" required="required" value="{{$capitulo->cap2}}">{{$capitulo->cap2}}</textarea>
                            </div>
                        </div>


                        @if($capitulo->cap3==null)
                         <div class="form-group row">
                            <label for="cap3" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap3 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap3" type="text" rows="10" cols="40" placeholder="Nombre cap3 tesis" class="form-control" name="cap3"></textarea>
                            </div>
                        </div>
                        @else
                             <div class="form-group row">
                            <label for="cap3" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap3 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap3" type="text" rows="10" cols="40" placeholder="Nombre cap3 tesis" class="form-control" name="cap3"value="{{$capitulo->cap3}}">{{$capitulo->cap3}}</textarea>
                            </div>
                        </div>
                        @endif

                         @if($capitulo->cap4==null)
                         <div class="form-group row">
                            <label for="cap4" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap4 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap4" type="text" rows="10" cols="40" placeholder="Nombre cap4 tesis" class="form-control" name="cap4"></textarea>
                            </div>
                        </div>
                        @else
                             <div class="form-group row">
                            <label for="cap4" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap4 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap4" type="text" rows="10" cols="40" placeholder="Nombre cap4 tesis" class="form-control" name="cap4"value="{{$capitulo->cap4}}">{{$capitulo->cap4}}</textarea>
                            </div>
                        </div>
                        @endif
                        

                          @if($capitulo->cap5==null)
                         <div class="form-group row">
                            <label for="cap5" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap5 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap5" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap5"></textarea>
                            </div>
                        </div>
                        @else
                             <div class="form-group row">
                            <label for="cap5" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap5 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap5" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap5"value="{{$capitulo->cap5}}">{{$capitulo->cap5}}</textarea>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="avance_cap5" class="col-md-4 col-form-label text-md-right">{{ __('Avance Capitulo 5') }}</label>
                        </div>
                        @endif

                         @if($capitulo->cap6==null)
                         <div class="form-group row">
                            <label for="cap6" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap6 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap6" type="text" rows="10" cols="40" placeholder="Nombre cap6 tesis" class="form-control" name="cap6"></textarea>
                            </div>
                        </div>
                        @else
                             <div class="form-group row">
                            <label for="cap6" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cap6 de Tesis') }}</label>
                            <div class="col-md-6">
                                <textarea id="cap6" type="text" rows="10" cols="40" placeholder="Nombre cap5 tesis" class="form-control" name="cap6"value="{{$capitulo->cap6}}">{{$capitulo->cap6}}</textarea>
                            </div>
                        </div>
                        @endif
                        

                         
                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                <a href="/profesorhome" class="btn">{{ __('Cancelar') }}</a>
                                    
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
