@extends('layout.master')
@section('css')
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> Autos <small>Actualizar categoria</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('categorias')}}">Autos</a></li>
        <li><a href="{{url('categorias')}}">Categorias</a></li>
        <li class="active">Actualizar</li>
    </ol>
@endsection
@section('content')
    @include('errors.errors')
    <div class="box box-success">
        <div class="box-body">
            {!! Form::model($categoria,['route' => ['categorias.update', $categoria->id],'method'=>'PUT','id'=>'form_categoria','files'=>'true','parsley-validate novalidate']  ) !!}
            <div class="form-group @if ($errors->has('nombre')) has-error @endif">
                {!! Form::label('nombre','Nombre',['class' =>'col-lg-2 control-label']) !!}
                <div class="col-lg-8">
                    {!! Form::text('nombre',null,['class' => 'form-control','placeholder' => 'Nombre de la categoria']) !!}
                </div>
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('categorias')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
                </div>
            </div>
        </div><!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')


@endsection
