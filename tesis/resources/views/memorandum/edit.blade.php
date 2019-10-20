@extends('layouts.app')

@section('content')
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Editar Memorandum') }}</div>

                <div class="card-body">
                    <form action="{{route('memorandum.update', $memo->id)}}" method="POST">
                        @csrf

                          <div class="form-group row">
                            <label for="nombre_memorandum" class="col-md-4 col-form-label text-md-right">{{ __('Nombre_memorandum') }}</label>
                            <div class="col-md-6">
                                <input id="nombre_memorandum" type="text" placeholder="INGENIERÍA CIVIL INFORMÁTICA" class="form-control" name="nombre_memorandum" value="{{$memo->nombre_memorandum}}" required="required">
                            </div>
                        </div>


                      <div class="form-group row">
                            <label for="escuela" class="col-md-4 col-form-label text-md-right">{{ __('Escuela') }}</label>
                            <div class="col-md-6">
                                <input id="escuela" type="text" placeholder="INGENIERÍA CIVIL INFORMÁTICA" value="{{$memo->escuela}}" class="form-control" name="escuela" required="required">
                            </div>
                        </div>

                      <div class="form-group row">
                                <label for="texto1" class="col-md-4 col-form-label text-md-right">{{ __('Texto1') }}</label>
                                 <div class="col-md-6">
                                <textarea name="texto1" type="text" rows="10" cols="40" class="form-control" value="{{$memo->texto1}}"  required="required" >{{$memo->texto1}}</textarea>
                             </div>
                        </div>


                         <div class="form-group row">
                                <label for="texto2" class="col-md-4 col-form-label text-md-right">{{ __('Texto2') }}</label><div class="col-md-6">
                                <textarea name="texto2" type="text" rows="10" cols="40" class="form-control" value="{{$memo->texto2}}" required="required" >{{$memo->texto2}}</textarea>
                             </div>
                        </div>
 


                      <div class="form-group row">
                                <label for="texto3" class="col-md-4 col-form-label text-md-right">{{ __('Texto3') }}</label>
                                <div class="col-md-6">
                                <textarea name="texto3" type="text" rows="10" cols="40" class="form-control" value="{{$memo->texto3}}" required="required" >{{$memo->texto3}}</textarea>
                             </div>
                        </div>

                         <div class="form-group row">
                                <label for="texto4" class="col-md-4 col-form-label text-md-right">{{ __('Texto4') }}</label>
                                <div class="col-md-6">
                                <textarea name="texto4" type="text" rows="10" cols="40" class="form-control" value="{{$memo->texto4}}" >{{$memo->texto4}}</textarea>
                             </div>
                        </div>

                               <div class="form-group row">
                                <label for="texto5" class="col-md-4 col-form-label text-md-right">{{ __('Texto5') }}</label><div class="col-md-6">
                                <textarea name="texto5" type="text" rows="10" cols="40" class="form-control" value="{{$memo->texto5}}" >{{$memo->texto5}}</textarea>
                             </div>
                        </div>
 


                      <div class="form-group row">
                                <label for="texto6" class="col-md-4 col-form-label text-md-right">{{ __('Texto6') }}</label>
                                <div class="col-md-6">
                                <textarea name="texto6" type="text" rows="10" cols="40" class="form-control" value="{{$memo->texto6}}" >{{$memo->texto6}}</textarea>
                             </div>
                        </div>

                         <div class="form-group row">
                                <label for="texto7" class="col-md-4 col-form-label text-md-right">{{ __('Texto7') }}</label>
                                <div class="col-md-6">
                                <textarea name="texto7" type="text" rows="10" cols="40" class="form-control" value="{{$memo->texto7}}"  >{{$memo->texto7}}</textarea>
                             </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>

                                <a href="/diretorhome" class="btn">{{ __('Cancelar') }}</a>
                                    
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
