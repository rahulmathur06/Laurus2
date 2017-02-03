@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa  fa-building-o"></i> Locaciones <small>Añadir Destinos</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('ciudad')}}">Locaciones</a></li>
        <li class="active"><a href="{{url('ciudad')}}">Destinos</a></li>

    </ol>
    @endsection
    @section('content')
    @include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-body">
            @if(count($ciudad) > 0)
                {!! Form::model($ciudad,['route' => ['ciudad.updateDestino',$ciudad->id],'method'=>'PUT','id'=>'form_ciudad','parsley-validate novalidate']  ) !!}
            @else
                {!! Form::open(['route' => 'ciudad.storeDestino','method'=>'POST','id'=>'form_ciudad','parsley-validate novalidate', 'files'=>'true','class'=>'form-horizontal']) !!}
                <input type="hidden" value="{{$ciudad_id}}" name="ciudad_id">
            @endif
            <div class="form-group @if ($errors->has('destino_id')) has-error @endif">
                {!! Form::label('destino_id','Destinos *',['class' =>'col-lg-2 control-label']) !!}
                <div class="col-lg-8">
                    {!! Form::select('destino_id[]',$destinos ,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','multiple','aria-hidden'=>'true','tabindex'=>'-1']) !!}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('ciudad')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $(".select2").select2();
        });
    </script>
@endsection
