@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/reservations/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>PROMOCIÓN - ASIGNACIÓN</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('promo-locaciones')}}">Promoción</a></li>
    <li><a href="{{url('promo-locaciones')}}">Asignación</a></li>
    <li class="active">Nuevo</li>
</ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        <div class='col-md-8 col-md-offset-1'>
            {!! Form::open(['route' => 'promo-locaciones.store','method'=>'POST','id'=>'form_add_promo_locaciones','parsley-validate novalidate']) !!}
            @include('reservaciones::promo_locacion.partials.basic')
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="enviar"><i class="fa fa-save"></i>  Guardar</button></div>
                <div class='formActionButton'><a href="{{url('promo-locaciones')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
<script src="{{asset('bower_components/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script type="text/javascript">
var urlToGetClases = '{{route("promo-locaciones.getclases")}}';
</script>
<script src="{{asset('modules/reservations/js/promo-locaciones.js') }}"></script>
@endsection
