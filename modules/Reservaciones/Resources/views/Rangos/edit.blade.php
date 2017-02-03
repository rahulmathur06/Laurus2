@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> Tarifas Mínimas Y Máximas </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('rangos')}}">Tarifas</a></li>
        <li class="active">Actualizar</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-body">
            {!! Form::model($clase,['route' => ['rangos.update', $clase->id],'method'=>'PUT','id'=>'form_clase','parsley-validate novalidate','class'=> 'form-horizontal']  ) !!}
            @include('reservaciones::Rangos.partials.basic')
        </div>
      
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $(".select2").select2();
        });
(function ($) {

    $.get_location_id_to_car = function (locationID) {
        $.ajax({
            url: "{!! URL::to('getlocationtocars') !!}",
            type: "get",
            data: {
                locationID: locationID,tarifasID:"{!! $clase->id !!}",type:'up'
            },
            success: function (result) {
                $("#locationData").html(result);
            }
        });
    }

})(jQuery);
  jQuery.get_location_id_to_car(document.getElementById('location_id').value, "{!! URL::to('getlocationtocars')!!}");
    $('#GetAutos').on("click", function () {
        jQuery.get_location_id_to_car(document.getElementById('location_id').value, "{!! URL::to('getlocationtocars')!!}");
    });
    </script>
@endsection
