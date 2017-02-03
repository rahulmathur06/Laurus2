@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> Autos <small>Traducciones</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('catalogo')}}">Seguros</a></li>
        <li><a href="{{url('catalogo')}}">Catálogo</a></li>
        <li><a href="{{url('catalogo-traducciones/'.$traduccion->cobertura_id)}}">Traducciones</a></li>
        <li class="active">Actualizar</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Actualizar Traducción</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::model($traduccion,['route' => ['catalogotranslate.update', $traduccion->id],'method'=>'PUT','id'=>'form_traduccion','parsley-validate novalidate','class'=> 'form-horizontal']  ) !!}
            @include('reservaciones::Seguros.Catalogo.partials.translate')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{route('coberturatranslate.index',$traduccion->cobertura_id)}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
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
