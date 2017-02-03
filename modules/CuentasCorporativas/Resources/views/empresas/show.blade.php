@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/cuentascorporativas/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>APROBACIÓN DE ALTA DE NUEVA EMPRESA</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('empresas.index')}}">Cuentas Corporativas</a></li>
    <li><a href="{{route('empresas.index')}}">Empresas</a></li>
    <li class="active">Aprobación</li>
</ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        <div class='container-fluid empresa-registration'>
            {!! Form::model($Empresa,['id'=>'form_empresas_register','parsley-validate novalidate', 'class' => 'form-horizontal', 'files' => true, 'onSubmit' => 'return false']  ) !!}
            @include('cuentascorporativas::empresas.partials.basic')
            <div class='row'>
                <div class='col-md-12'>
                    <div class="form-group @if ($errors->has('comentarios')) has-error @endif">
                        <label class="control-label col-md-2">
                            <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                                Comentarios
                            </span>
                        </label>
                        <div class="col-md-10">
                            {!! Form::textarea('comentarios',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'comentarios']) !!}
                        </div> 
                    </div><!-- /.form-group -->
                </div>
            </div> <!-- / .row-->
        </div>
    </div>

    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="button" class="btn btn-success actionButton" id="enviar" onclick="updateEnterpriseStatus('approved')">AUTORIZAR</button></div>
                <div class='formActionButton'><button type="button" class="btn btn-danger actionButton" id="enviar" onclick="updateEnterpriseStatus('rejected')">RECHAZAR</button></div>
                <div class='formActionButton'><a href="{{URL::previous()}}" class="btn btn-default actionButton" >CANCELAR</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>

<form style="display:none" method="post" action="{{route('empresas.authorize')}}" id="enterpriseAuthorizationForm">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <input type="number" name="enterprise_id" value="{{$Empresa->id}}">
    <input type="text" name="enterprise_status" id="enterprise_status">
    <input type="number" name="task_id" value="{{$task_id}}">
</form>
@endsection
@section('scripts')
<script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{asset('bower_components/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="{{asset("modules/cuentascorporativas/js/custom.js") }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
       jQuery('.box input, select, textarea').attr('disabled', true);
       jQuery('button').not('.actionButton').hide();
    });
</script>
@endsection