@extends('layouts.app')



@section('content')

<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('capitulos.update_avances', $id)}}" method="POST">
                        @csrf

    <table class="table table-bordered">
        <tr>
    <b>Nombre Tesis</b>
    <p>{{$tes->nombre_tesis}}</p>
    <b>Nombre alumno</b>
    <p>{{$tes->nombre_completo}}</p>
    <p>{{$tes->nombre_completo2}}</p>
    <b>Rut</b>
    <p>{{$tes->rut}}</p>
    <p>{{$tes->rut2}}</p>
    <b>Año Ingreso</b>
    <p>{{$tes->ano_ingreso}}</p>
    <p>{{$tes->ano_ingreso2}}</p>
    <b>Profesor Guía</b>
    <p>{{$tes->profesor_guia}}</p>
    <b>Carrera</b>
    <p>{{$tes->carrera}}</p>
    <div>
    <b>Capitulos de la Tesis</b>
    </div>
    <b>Capitulo 1:</b>
    <p>{{$capitulo->cap1}}</p>
     <div class="form-group row">
                            <label for="avance_cap1" class="col-md-4 col-form-label text-md-right">{{ __('Avance Capitulo 1') }}</label>
                            <div class="col-md-6">
                                <select name="avance_cap1" id="avance_cap1" type="text" class="form-control" required="required">
                                <option value="{{$capitulo->avance_cap1}}">{{$capitulo->avance_cap1}}%</option>
                                <option value="5">5%</option>
                                 <option value="10">10%</option>
                                 <option value="15">15%</option>
                                   <option value="20">20%</option>
                                 <option value="25">25%</option>
                                 <option value="30">30%</option>
                                   <option value="35">35%</option>
                                 <option value="40">40%</option>
                                 <option value="45">45%</option>
                                   <option value="50">50%</option>
                                 <option value="55">55%</option>
                                 <option value="60">60%</option>
                                 <option value="65">65%</option>
                                 <option value="70">60%</option>
                                   <option value="75">75%</option>
                                 <option value="80">80%</option>
                                 <option value="85">85%</option>
                                  <option value="90">90%</option>
                                 <option value="95">95%</option>
                                 <option value="100">100%</option>
                                 </select>
                            </div>
                        </div>

    <b>Capitulo 2:</b>
    <p>{{$capitulo->cap2}}</p>
    <div class="form-group row">
                            <label for="avance_cap2" class="col-md-4 col-form-label text-md-right">{{ __('Avance Capitulo 2') }}</label>
                            <div class="col-md-6">
                                <select name="avance_cap2" id="avance_cap2" type="text" class="form-control" required="required">
                                <option value="{{$capitulo->avance_cap2}}">{{$capitulo->avance_cap2}}%</option>
                                  <option value="5">5 %</option>
                                 <option value="10">10%</option>
                                 <option value="15">15%</option>
                                   <option value="20">20%</option>
                                 <option value="25">25%</option>
                                 <option value="30">30%</option>
                                   <option value="35">35%</option>
                                 <option value="40">40%</option>
                                 <option value="45">45%</option>
                                   <option value="50">50%</option>
                                 <option value="55">55%</option>
                                 <option value="60">60%</option>
                                 <option value="65">65%</option>
                                 <option value="70">60%</option>
                                   <option value="75">75%</option>
                                 <option value="80">80%</option>
                                 <option value="85">85%</option>
                                  <option value="90">90%</option>
                                 <option value="95">95%</option>
                                 <option value="100">100%</option>
                                 </select>
                            </div>
                        </div>
    @if($capitulo->cap3!=null)
    <b>Capitulo 3:</b>

    <p>{{$capitulo->cap3}}</p>
     <div class="form-group row">
                            <label for="avance_cap3" class="col-md-4 col-form-label text-md-right">{{ __('Avance Capitulo 3') }}</label>
                            <div class="col-md-6">
                                <select name="avance_cap3" id="avance_cap3" type="text" class="form-control" required="required">
                                <option value="{{$capitulo->avance_cap3}}">{{$capitulo->avance_cap3}}%</option>
                                 <option value="5">5%</option>
                                 <option value="10">10%</option>
                                 <option value="15">15%</option>
                                   <option value="20">20%</option>
                                 <option value="25">25%</option>
                                 <option value="30">30%</option>
                                   <option value="35">35%</option>
                                 <option value="40">40%</option>
                                 <option value="45">45%</option>
                                   <option value="50">50%</option>
                                 <option value="55">55%</option>
                                 <option value="60">60%</option>
                                 <option value="65">65%</option>
                                 <option value="70">60%</option>
                                   <option value="75">75%</option>
                                 <option value="80">80%</option>
                                 <option value="85">85%</option>
                                  <option value="90">90%</option>
                                 <option value="95">95%</option>
                                 <option value="100">100%</option>
                                 </select>
                            </div>
                        </div>
    @endif
    @if($capitulo->cap4!=null)
    <b>Capitulo 4:</b>

    <p>{{$capitulo->cap4}}</p>
    <div class="form-group row">
                            <label for="avance_cap4" class="col-md-4 col-form-label text-md-right">{{ __('Avance Capitulo 4') }}</label>
                            <div class="col-md-6">
                                <select name="avance_cap4" id="avance_cap3" type="text" class="form-control" required="required">
                                <option value="{{$capitulo->avance_cap4}}">{{$capitulo->avance_cap4}}%></option>
                                <option value="5">5 %</option>
                                 <option value="10">10%</option>
                                 <option value="15">15%</option>
                                   <option value="20">20%</option>
                                 <option value="25">25%</option>
                                 <option value="30">30%</option>
                                   <option value="35">35%</option>
                                 <option value="40">40%</option>
                                 <option value="45">45%</option>
                                   <option value="50">50%</option>
                                 <option value="55">55%</option>
                                 <option value="60">60%</option>
                                 <option value="65">65%</option>
                                 <option value="70">60%</option>
                                   <option value="75">75%</option>
                                 <option value="80">80%</option>
                                 <option value="85">85%</option>
                                  <option value="90">90%</option>
                                 <option value="95">95%</option>
                                 <option value="100">100%</option>
                                 </select>
                            </div>
                        </div>
    @endif
    @if($capitulo->cap5!=null)
    <b>Capitulo 5:</b>

    <p>{{$capitulo->cap5}}</p>
    <div class="form-group row">
                            <label for="avance_cap5" class="col-md-4 col-form-label text-md-right">{{ __('Avance Capitulo 5') }}</label>
                            <div class="col-md-6">
                                <select name="avance_cap5" id="avance_cap5" type="text" class="form-control" required="required">
                                <option value="{{$capitulo->avance_cap5}}">{{$capitulo->avance_cap5}}%</option>
                                <option value="5">5 %</option>
                                 <option value="10">10%</option>
                                 <option value="15">15%</option>
                                   <option value="20">20%</option>
                                 <option value="25">25%</option>
                                 <option value="30">30%</option>
                                   <option value="35">35%</option>
                                 <option value="40">40%</option>
                                 <option value="45">45%</option>
                                   <option value="50">50%</option>
                                 <option value="55">55%</option>
                                 <option value="60">60%</option>
                                 <option value="65">65%</option>
                                 <option value="70">60%</option>
                                   <option value="75">75%</option>
                                 <option value="80">80%</option>
                                 <option value="85">85%</option>
                                  <option value="90">90%</option>
                                 <option value="95">95%</option>
                                 <option value="100">100%</option>
                                 </select>
                            </div>
                        </div>
    @endif
    @if($capitulo->cap6!=null)
    <b>Capitulo 6:</b>

    <p>{{$capitulo->cap6}}</p>
     <div class="form-group row">
                            <label for="avance_cap4" class="col-md-4 col-form-label text-md-right">{{ __('Avance Capitulo 6') }}</label>
                            <div class="col-md-6">
                                <select name="avance_cap6" id="avance_cap6" type="text" class="form-control" required="required">
                                <option value="{{$capitulo->avance_cap6}}">{{$capitulo->avance_cap6}}%</option>
                                  <option value="5">5 %</option>
                                 <option value="10">10%</option>
                                 <option value="15">15%</option>
                                   <option value="20">20%</option>
                                 <option value="25">25%</option>
                                 <option value="30">30%</option>
                                   <option value="35">35%</option>
                                 <option value="40">40%</option>
                                 <option value="45">45%</option>
                                   <option value="50">50%</option>
                                 <option value="55">55%</option>
                                 <option value="60">60%</option>
                                 <option value="65">65%</option>
                                 <option value="70">60%</option>
                                   <option value="75">75%</option>
                                 <option value="80">80%</option>
                                 <option value="85">85%</option>
                                  <option value="90">90%</option>
                                 <option value="95">95%</option>
                                 <option value="100">100%</option>
                                 </select>
                            </div>
                        </div>
        @endif

     <b>Avance General</b>
     <div class="form-group row">
                            <label for="avance_cap3" class="col-md-4 col-form-label text-md-right">{{ __('Avance General') }}</label>
                            <div class="col-md-6">
                                <select name="avance_general" id="avance_general" type="text" class="form-control" required="required">
                                <option value="{{$tes->avance_general}}">{{$tes->avance_general}}%</option>
                                 <option value="5">5%</option>
                                 <option value="10">10%</option>
                                 <option value="15">15%</option>
                                   <option value="20">20%</option>
                                 <option value="25">25%</option>
                                 <option value="30">30%</option>
                                   <option value="35">35%</option>
                                 <option value="40">40%</option>
                                 <option value="45">45%</option>
                                   <option value="50">50%</option>
                                 <option value="55">55%</option>
                                 <option value="60">60%</option>
                                 <option value="65">65%</option>
                                 <option value="70">60%</option>
                                   <option value="75">75%</option>
                                 <option value="80">80%</option>
                                 <option value="85">85%</option>
                                  <option value="90">90%</option>
                                 <option value="95">95%</option>
                                 <option value="100">100%</option>
                                 </select>
                            </div>
                        </div>
</tr>
</table>

 






                       

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
    <a href="{{ url()->previous() }}" class="btn btn-default">Volver atrás</a>
</div>
@endsection
