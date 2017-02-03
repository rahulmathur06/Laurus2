@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/cuentascorporativas/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>EMPRESAS EXTERNAS - Actualizar</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('empresasExternas.index')}}">Cuentas Corporativas</a></li>
    <li><a href="{{route('empresasExternas.index')}}">Empresas Externas</a></li>
    <li class="active">Actualizar</li>
</ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        <div class='container-fluid empresa-registration'>
            {!! Form::model($Empresa,['route' => ['empresasExternas.update', $Empresa->id],'method'=>'PUT','id'=>'form_empresasExternas_register','parsley-validate novalidate', 'class' => 'form-horizontal', 'files' => true]  ) !!}
            @include('cuentascorporativas::empresasExternas.partials.basic')
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="enviar"><i class="fa fa-save"></i>  Guardar</button></div>
                <div class='formActionButton'><a href="{{url('empresasExternas')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="{{asset("modules/cuentascorporativas/js/custom.js") }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#ejecutiva_id').change(function(){
            document.getElementById("executive_id_hidden").value=this.value;
        });
        jQuery('#nombre').change(function(){
            document.getElementById("empresa_name").value=this.value;
        });
        jQuery(".jQueryUIDate").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "0:+100",
            minDate: 0
        });
    });
</script>
@endsection