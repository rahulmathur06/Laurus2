@extends('layout.master')
@section('css')
@endsection
@section('content-header')
    <h1><i class="fa fa-plane"></i> Locaciones <small>Traducciones</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('destino')}}">Locaciones</a></li>
        <li><a href="{{url('destino')}}">Destino</a></li>
        <li><a href="{{url('destino-traducciones/'.$traduccion->id_destino)}}">Traducciones</a></li>
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
            {!! Form::model($traduccion,['route' => ['destinotranslate.update', $traduccion->id],'method'=>'PUT','id'=>'form_traduccion','parsley-validate novalidate','class'=> 'form-horizontal']  ) !!}
            <input type="hidden" name="idioma" value="{{$traduccion->idioma}}">
            @include('reservaciones::Destinos.partials.translate')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{route('destinotranslate.index',$traduccion->id_destino)}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
@endsection
