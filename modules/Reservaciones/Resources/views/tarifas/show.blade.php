@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/reservations/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1>TARIFAS</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('tarifas')}}">Tarifas</a></li>
        <li><a href="{{url('tarifas')}}">Captura de Tarifas</a></li>
        <li class="active">Actualizar</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        <div class='col-md-8 col-md-offset-1'>
            {!! Form::model($Tarifa, ['id'=>'form_edit_tarifa','parsley-validate novalidate']) !!}
            @include('reservaciones::tarifas.partials.basic')
            @include('reservaciones::tarifas.partials.tabs')
        </div>
    </div>
    <!-- /.box-body -->
    {!! Form::hidden('tarifa_id', $Tarifa->id, ['id' => 'tarifa_id']) !!}
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
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
        var urlToGetDetail = '{{route("tarifas.get_detail")}}';
        jQuery(document).ready(function(){
           jQuery('.price_original').each(function (index, element) {
                var element_jq = jQuery(element);
                if (element.value){
                    element_jq.siblings('input').val('$' + ((element.value).replace(/(\d)(?=(\d{3})+\.)/g, "$1,")));
                }
            }); 
            jQuery('input, select').prop('disabled', true);
            jQuery(document).ajaxStop(function(){
                jQuery('#details-content').find('input, select').prop('disabled', true);
            });
        });
</script>
<script src="{{asset('modules/reservations/js/tarifas.js') }}"></script>
@endsection
