@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/cuentascorporativas/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1> CheckList</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('checklist')}}">Checklist</a></li>
    <li class="active">Nuevo Record</li>
</ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
     
        {!! Form::open(['route' => 'checklist.store','method'=>'POST','id'=>'form_flotilla','parsley-validate novalidate','files'=>'true']) !!}
        @include('cuentascorporativas::checklist.partials.basic')
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="enviar"><i class="fa fa-save"></i>  Guardar</button></div>
                <div class='formActionButton'><a href="{{url('checklist')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
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
$(function () {
    $(".select2").select2();
    $(".select3").select2();
});
</script>

@endsection
