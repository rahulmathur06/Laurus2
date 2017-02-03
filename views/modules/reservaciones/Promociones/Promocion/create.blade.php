@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/bootstrap-datatimepicker/css/bootstrap-datetimepicker.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa  fa-ticket"></i> Promociones <small>Nueva promoción</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('promociones')}}">Promociones</a></li>
        <li class="active">Nuevo</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-header">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#contenido" data-toggle="tab"><i class="fa fa-building"></i> Contenido</a></li>
                <li><a href="#information" data-toggle="tab"><i class="fa fa-info"></i> Información</a></li>
                <li><a href="#configuration" data-toggle="tab"><i class="fa fa-gear"></i>Configuración</a></li>
            </ul>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'promociones.store','method'=>'POST','id'=>'form_promociones','parsley-validate novalidate']) !!}
            <div class="tab-content">
                <div class="tab-pane active" id="contenido">
                    @include('reservaciones::Promociones.Promocion.partials.translate')
                </div>
                <div class="tab-pane" id="information">
                    @include('reservaciones::Promociones.Promocion.partials.basic')
                </div>

                <div class="tab-pane" id="configuration">
                   @include('reservaciones::Promociones.Promocion.partials.config')
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('promociones')}}"  class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/moment/moment-with-locales.js') }}" type="text/javascript"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/bootstrap-datatimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $(".select2").select2();
            
            $('#start_date').datetimepicker({
                locale: 'es',
                format: 'YYYY-MM-DD',
                sideBySide: true
            });

            $('#due_date').datetimepicker({
                locale:'es',
                format: 'YYYY-MM-DD',
                sideBySide: true,
                useCurrent: false//Important! See issue #1075

            });
            $("#start_date").on("dp.change", function (e) {
                $('#due_date').data("DateTimePicker").minDate(e.date);
            });
            $("#due_date").on("dp.change", function (e) {
                $('#start_date').data("DateTimePicker").maxDate(e.date);
            });

        });
    </script>
@endsection
