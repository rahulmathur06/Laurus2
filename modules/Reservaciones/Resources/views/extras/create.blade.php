@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/reservations/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>Extras</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('extras')}}">Extras</a></li>
        <li><a href="{{url('extras')}}">Lista de Extras</a></li>
        <li class="active">Index</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        <div class='container-fluid'>
            {!! Form::open(['route' => 'extras.store','method'=>'POST','id'=>'form_tipo_empresas','parsley-validate novalidate']) !!}
            @include('reservaciones::extras.partials.basic')
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="enviar"><i class="fa fa-save"></i>  Guardar</button></div>
                <div class='formActionButton'><a href="{{url('extras')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
<script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{asset('modules/reservations/js/extras.js') }}"></script>
@endsection
