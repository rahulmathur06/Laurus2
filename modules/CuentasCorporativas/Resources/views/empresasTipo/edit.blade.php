@extends('layout.master')
@section('css')
<!--<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />-->
<link href="{{ asset("modules/cuentascorporativas/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>TIPO DE EMPRESAS</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('tipoempresas.index')}}">Cuentas Corporativas</a></li>
    <li><a href="{{route('tipoempresas.index')}}">Configuracion</a></li>
    <li><a href="{{route('tipoempresas.index')}}">Tipos de Empresas</a></li>
    <li class="active">Actualizar</li>
</ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        <div class='col-md-8 col-md-offset-1'>
            {!! Form::model($EmpresasTipo,['route' => ['tipoempresas.update', $EmpresasTipo->id],'method'=>'PUT','id'=>'form_fueraservicio','parsley-validate novalidate']  ) !!}
            @include('cuentascorporativas::empresasTipo.partials.basic')
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="enviar"><i class="fa fa-save"></i>  Guardar</button></div>
                <div class='formActionButton'><a href="{{url('tipoempresas')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
@endsection
{{-- @section('scripts') --}}
<!--<script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{asset('bower_components/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{asset('modules/fueraservicio/js/custom.js') }}"></script>
<script>
$(function () {
    $(".select2").select2();
    $(".select3").select2();
    $(".jQueryUIDatepicker").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        maxDate: 0        
    });
    jQuery.get_car_desc(document.getElementById('clave').value, "{!! URL::to('carcodetodescription')!!}");
    $('#clave').on("change", function () {
        jQuery.get_car_desc(this.value, "{!! URL::to('carcodetodescription')!!}");
    });
});
</script>-->

{{-- @endsection --}}
