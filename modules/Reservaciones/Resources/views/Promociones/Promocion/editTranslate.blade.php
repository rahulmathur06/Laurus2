@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/bootstrap-datatimepicker/css/bootstrap-datetimepicker.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1>Actualizar Traducción</h1>
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#information" data-toggle="tab"><i class="fa fa-building"></i> Traducciones</a></li>
            </ul>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::model($traduccion,['route' => ['promotranslate.update', $traduccion->id],'method'=>'PUT','id'=>'form_traduccion','parsley-validate novalidate']  ) !!}

            <div class="tab-content">
                <div class="tab-pane active" id="information">
                    @include('reservaciones::Promociones.Promocion.partials.translate')
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{ URL::previous()}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
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
    <script src="{{asset('bower_components/admin-lte/plugins/bootstrap-datatimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $(".select2").select2();

        });
    </script>
@endsection
