@extends('layout.master')
@section('css')
  <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("bower_components/admin-lte/plugins/bootstrap-datatimepicker/css/bootstrap-datetimepicker.min.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-clock-o"></i> Horarios<small> Nueva restricción</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('restriccion')}}">Anticipación</a></li>
        <li class="active">Nuevo</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-header with-border">
            <label>( solo apareceran las locaciones que aun no tienen una restricción )</label>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'restriccion.store','method'=>'POST','id'=>'form_locacion','parsley-validate novalidate','class'=> 'form-horizontal']) !!}
            @include('reservaciones::Horarios.Restricciones.partials.fields')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('restriccion')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
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
            $(".timepicker").datetimepicker({
                format: 'HH:mm',
                stepping: 30

            });


        });
    </script>
@endsection
