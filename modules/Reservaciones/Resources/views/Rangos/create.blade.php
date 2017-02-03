@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> Tarifas Mínimas Y Máximas </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('rangos')}}">Tarifas</a></li>
        <li class="active">Nuevo</li>
    </ol>
@endsection
@section('content')
    @include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-header with-border">
           
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'rangos.store','method'=>'POST','id'=>'form_clases','parsley-validate novalidate','class'=> 'form-horizontal']) !!}
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
                locationID: locationID,type:'cr',
            },
            success: function (result) {
                debugger;
                $("#locationData").html(result);
            }
        });
    }

})(jQuery);
  jQuery.get_location_id_to_car(document.getElementById('location_id').value, "{!! URL::to('getlocationtocars')!!}");
    $('#GetAutos').on("click", function () {
        jQuery.get_location_id_to_car(document.getElementById('location_id').value, "{!! URL::to('getlocationtocars')!!}");
    });


//use for number  keypress validiation
$(document).ready(function () { 
  //called when key is pressed in textbox
  $(".numbers").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   }); 
});
    </script>
@endsection
