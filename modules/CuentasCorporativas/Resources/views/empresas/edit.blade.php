@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/cuentascorporativas/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>EMPRESAS - Actualizar</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('empresas.index')}}">Cuentas Corporativas</a></li>
    <li><a href="{{route('empresas.index')}}">Empresas</a></li>
    <li class="active">Actualizar</li>
</ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        <div class='container-fluid empresa-registration'>
            {!! Form::model($Empresa,['route' => ['empresas.update', $Empresa->id],'method'=>'PUT','id'=>'form_empresas_register','parsley-validate novalidate', 'class' => 'form-horizontal', 'files' => true]  ) !!}
            @include('cuentascorporativas::empresas.partials.basic')
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="enviar"><i class="fa fa-save"></i>  Guardar</button></div>
                <div class='formActionButton'><a href="{{url('empresas')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
<!-- Task Model-->
<div id="TaskAssignmentModal" class="modal fade" role="dialog">
    @include('cuentascorporativas::empresas.partials.basic_modal_task')
</div>
<!-- Task Listing Model-->
<div id="TaskHistoryModal" class="modal fade" role="dialog">
    @include('cuentascorporativas::empresas.partials.basic_modal_task_list')
</div>
@endsection
@section('scripts')
<script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{asset('bower_components/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<!-- DATA TABES SCRIPT -->
<script src="{{asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{asset('bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<!-- confirmation -->
<script src="{{asset('modules/cuentascorporativas/js/ajax.js')}}"></script>
<script src="{{asset('bower_components/admin-lte/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>    
<script src="{{asset("modules/cuentascorporativas/js/custom.js") }}"></script>
@endsection