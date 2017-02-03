@extends('layout.master')
@section('css')
 <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa  fa-building-o"></i> Locaciones <small>Actualizar oficina</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('locacion')}}">Locaciones</a></li>
        <li><a href="{{url('locacion')}}">Oficinas</a></li>
        <li class="active">Actualizar</li>
    </ol>
@endsection

@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-sucess">
        <div class="box-header">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#information" data-toggle="tab"><i class="fa fa-info"></i> Información</a></li>
                <li ><a href="#localization" data-toggle="tab"><i class="fa fa-map-marker"></i> Localización</a></li>
                <li><a href="#configuration" data-toggle="tab"><i class="fa fa-gear"></i> Configuración</a></li>
            </ul>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::model($locacion,['route' => ['locacion.update', $locacion->id],'method'=>'PUT','id'=>'form_locacion','files'=>'true','parsley-validate novalidate','class'=>'form-horizontal']) !!}
            <div class="tab-content">
                <div class="tab-pane active" id="information">
                    @include('reservaciones::Locaciones.partials.editAddress')
                </div>
                <div class="tab-pane" id="localization">
                    @include('reservaciones::Locaciones.partials.location')
                </div>
                <div class="tab-pane" id="configuration">
                    @include('reservaciones::Locaciones.partials.basic')
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('locacion')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
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
