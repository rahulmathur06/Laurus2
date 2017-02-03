@extends('layout.master')
@section('css')
@endsection
@section('content-header')
    <h1><i class="fa fa-medkit"></i> Seguros <small>Nueva tarifa</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('seguros-tarifa')}}">Seguros</a></li>
        <li><a href="{{url('seguros-tarifa')}}">Tarifas</a></li>
        <li class="active">Nuevo</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-success">

        <div class="box-body">
            {!! Form::open(['route' => 'seguros-tarifa.store','method'=>'POST','id'=>'form_seguros-tarifa','parsley-validate novalidate']) !!}
            @include('reservaciones::Seguros.Tarifas.partials.basic')
            @include('reservaciones::Seguros.Tarifas.partials.price')
        </div><!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('seguros-tarifa')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
                </div>
            </div>
        </div><!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
@endsection
