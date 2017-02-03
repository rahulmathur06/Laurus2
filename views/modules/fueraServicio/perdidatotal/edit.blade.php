@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/fueraservicio/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1><i class="fa fa-car"></i> Captura de Pérdida Total</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('perdida')}}">Perdida</a></li>
    <li class="active">Actualizar</li>
</ol>
@endsection
@section('content')
<div class="box box-success">
    <div class="box-body">
        {!! Form::model($flotillaPerdidaTotal,['route' => ['perdida.update', $flotillaPerdidaTotal->id],'method'=>'PUT','id'=>'form_flotilla','files'=>'true','parsley-validate novalidate']  ) !!}
        @include('fueraservicio::perdidatotal.partials.basic')
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="enviar"><i class="fa fa-save"></i> Guardar Siniestro</button></div>
                <div class='formActionButton'><a href="{{url('perdida')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
<script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{asset('bower_components/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{asset('modules/fueraservicio/js/custom.js') }}"></script>
<script>
var sucursalAutoFillOldVal = '{{ $flotillaPerdidaTotal->sucursal }}';
console.log(sucursalAutoFillOldVal);
$(function () {
    $(".select2").select2();
    $(".select3").select2();
    $(".jQueryUIDatepicker").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        maxDate: 0,
        onSelect: function (selected) {
            $(".jQueryUIDatepickerwithFutureDate").datepicker("option", "minDate", selected);
        }
    });
    $(".jQueryUIDatepickerwithFutureDate").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+100",
    });
    
    jQuery.get_branch_from_city(document.getElementById('ciudad').value, "{!! URL::to('citytobranch')!!}");
    jQuery.get_car_desc(document.getElementById('clave').value, "{!! URL::to('carcodetodescription')!!}");
    $('#ciudad').on("change", function () {
        jQuery.get_branch_from_city(this.value, "{!! URL::to('citytobranch')!!}");
    });
     $('#clave').on("change", function () {
        jQuery.get_car_desc(this.value, "{!! URL::to('carcodetodescription')!!}");
    });
});
</script>

@endsection
