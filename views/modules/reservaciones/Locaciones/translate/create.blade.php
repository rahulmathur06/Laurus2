@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
  
    <h1><i class="fa fa-building-o"></i> Oficinas <small>Traducciones</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('locacion')}}">Locaciones</a></li>
        <li><a href="{{url('locacion')}}">Oficinas</a></li>
        <li><a href="{{url('locacion-traducciones/'.$locacion_id)}}">Traducciones</a></li>
        <li class="active">Nuevo</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Nueva Traducción</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'locaciontranslate.store','method'=>'POST','id'=>'form_locacion','parsley-validate novalidate','class'=> 'form-horizontal']) !!}
                <div class="form-group @if ($errors->has('idioma')) has-error @endif">
                    <label class="required control-label col-lg-2 ">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Seleccione un idioma">
                            Idioma
                        </span>
                    </label>
                    <div class="col-lg-8">
                    {!! Form::select('idioma',$idioma,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
                    </div>
                </div>
                <input type="hidden" value="{{$locacion_id}}" name="locacion_id">
                @include('reservaciones::Locaciones.partials.translate')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{route('locaciontranslate.index',$locacion_id)}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/moment/moment-with-locales.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $(".select2").select2();
        });
    </script>
@endsection
