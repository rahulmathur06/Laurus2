@extends('layout.master')
@section('content-header')
    <h1>Flota
        <small>Modificar auto: {{ $flotam->clave }}</small>
    </h1>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="box">
                <div class="box-body">
                	{!! Form::model($flotam,
                                    ['route' => ['flota.editar.update', $flotam->ID],
                                     'method'=>'PUT',
                                     'class'=> 'form-horizontal',
                                     'id'=>'form_user']  ) !!}
                    <div class="box-body">
            			@include('flota::vehiculos.form', ['model' => $flotam])
        			</div>
				    <div class="form-group">
                        <div class="col-sm-offset-9 col-sm-3">
	                    	<div class="btn-group">
	                            <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
	                            <a href="{{route('flota.vehiculos.index')}}" class="btn btn-default" >Cancelar</a>
							</div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>   <!-- /.row -->
@endsection
