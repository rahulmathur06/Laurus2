@extends('layout.master')
@section('css')
@endsection
@section('content-header')
    <h1><i class="fa fa-medkit"></i> Seguros <small>Nuevo catálogo</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('catalogo')}}">Seguros</a></li>
        <li><a href="{{url('catalogo')}}">Catálogos</a></li>
        <li class="active">Nuevo</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-body">
            {!! Form::open(['route' => 'catalogo.store','method'=>'POST','id'=>'form_catalogo','parsley-validate novalidate','class'=>'form-horizontal']) !!}
            @include('reservaciones::Seguros.Catalogo.partials.basic')
            @include('reservaciones::Seguros.Catalogo.partials.translate')
            <input type="hidden" value="es-MX" name="idioma">
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('catalogo')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
@endsection
