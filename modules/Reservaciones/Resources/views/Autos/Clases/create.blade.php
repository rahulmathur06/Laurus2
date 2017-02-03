@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> Autos <small>Nueva Clase</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('clases')}}">Autos</a></li>
        <li><a href="{{url('clases')}}">Clases</a></li>
        <li class="active">Nuevo</li>
    </ol>
@endsection
@section('content')
    @include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-header with-border">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#information" data-toggle="tab"><i class="fa fa-info"></i> Información</a></li>
                <li><a href="#contenido" data-toggle="tab"><i class="fa fa-building"></i> Contenido </a></li>
            </ul>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'clases.store','method'=>'POST','id'=>'form_clases','parsley-validate novalidate','class'=> 'form-horizontal']) !!}
            <div class="tab-content">
                <div class="tab-pane active" id="information">
                    @include('reservaciones::Autos.Clases.partials.translate')
                    <input type="hidden" value="es-MX" name="idioma">
                </div>
                <div class="tab-pane" id="contenido">
                    @include('reservaciones::Autos.Clases.partials.basic')
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('clases')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $(".select2").select2();
        });
    </script>
@endsection
