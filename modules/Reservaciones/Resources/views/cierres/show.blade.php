@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/reservations/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1>CIERRES</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('categorias')}}">Autos</a></li>
        <li><a href="{{url('cierres')}}">Cierres</a></li>
        <li class="active">Actualizar</li>
    </ol>
@endsection
@section('content')
<div class="box box-success">
    <div class="box-body">
        <div class="row">
        <div class='col-md-8 col-md-offset-1'>
           <div class="form-group">
                <label for="otras">Locación</label>
                <div class="form-group">
                   {!! $cierres->clave !!}
                </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class='col-md-8 col-md-offset-1'>
           <div class="form-group">
                <label for="otras">AUTOS</label>
                <div class="form-group">
                   {!! $cierres->clase !!}
                </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class='col-md-4 col-md-offset-1'>
           <div class="form-group">
                <label for="otras">Fecha ini</label>
                <div class="form-group">
                   {!! $cierres->fecha_ini !!}
                </div>
            </div>
        </div>
            <div class='col-md-4 col-md-offset-1'>
                <div class="form-group ">
                    <label for="otras">Fecha fin</label>
                    <div class="form-group">
                        {!! $cierres->fecha_fin !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class='col-md-8 col-md-offset-1'>
           <div class="form-group">
                <label for="otras">Motivo</label>
                <div class="form-group">
                   {!! $cierres->motivo !!}
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
</div>
@endsection
