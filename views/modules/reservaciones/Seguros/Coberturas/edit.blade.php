@extends('layout.master')
@section('css')
  <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-medkit"></i> Seguros <small>Actualizar cobertura</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('cobertura')}}">Seguros</a></li>
        <li><a href="{{url('cobertura')}}">Cobertura</a></li>
        <li class="active">Actualizar</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-default">
        <div class="box-body">
            {!! Form::model($cobertura,['route' => ['cobertura.update', $cobertura->id],'method'=>'PUT','id'=>'form_cobertura','parsley-validate novalidate','class'=>'form-horizontal']  ) !!}
            @include('reservaciones::Seguros.Coberturas.partials.basic')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
                    <a href="{{url('cobertura')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
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
