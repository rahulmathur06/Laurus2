@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/reservations/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1>Autorización de Tarifas</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('tarifas/auth')}}">Tarifas</a></li>
    <li><a href="{{url('tarifas/auth')}}">Autorización de Tarifas</a></li>
    <li class="active">Index</li>
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
                <div class='formActionButton'><a href="javascript:void(0)" class="btn btn-success" onClick="updateStatus(1)">APROBAR</a></div>
                <div class='formActionButton'><a href="javascript:void(0)" class="btn btn-danger"  onClick="updateStatus(0)">RECHAZAR</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
<form id="action_form" action="{{route('tarifa_auth.update', $Tarifa->id)}}" style="display:none" method="post">
{{ method_field('PUT') }}
{{csrf_field()}}
<input type="hidden" name="status" id="status" value="">
</form>
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
            jQuery('input, select').not('#action_form input').prop('disabled', true);
            jQuery(document).ajaxStop(function(){
                jQuery('#details-content').find('input, select').prop('disabled', true);
            });
        });
        function updateStatus(status){
            jQuery('#action_form #status').val(status);
            jQuery('#action_form').submit();
        }
</script>
<script src="{{asset('modules/reservations/js/tarifas.js') }}"></script>
@endsection
