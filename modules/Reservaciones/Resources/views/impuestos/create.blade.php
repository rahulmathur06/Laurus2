@extends('layout.master')
@section('css')
<link href="{{ asset("modules/reservations/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>TARIFAS</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('tarifas')}}">Tarifas</a></li>
    <li><a href="{{url('impuestos')}}">Impuestos</a></li>
    <li class="active">Nuevo</li>
</ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        <div class='col-md-8 col-md-offset-1'>
            {!! Form::open(['route' => 'impuestos.store','method'=>'POST','id'=>'form_add_impuestos','parsley-validate novalidate']) !!}
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group @if ($errors->has('clave')) has-error @endif">
                        <label class="required control-label  ">
                            <span>AIRPORT FEE</span>
                        </label>
                        {!! Form::text('tax_factor',null,['id'=>'tax_factor','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group @if ($errors->has('clave')) has-error @endif">
                        <label class="required control-label  ">
                            <span>IVA</span>
                        </label>
                        {!! Form::text('airport_fee',null,['id'=>'airport_fee','class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="enviar"><i class="fa fa-save"></i>  Guardar</button></div>
                <div class='formActionButton'><a href="{{url('impuestos')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
@endsection

