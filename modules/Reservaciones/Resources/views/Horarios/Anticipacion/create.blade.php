@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-clock-o"></i> Horarios<small> Nueva anticipación</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('anticipacion')}}">Anticipación</a></li>
        <li class="active">Nuevo</li>
    </ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
    <div class="box box-success">
        <div class="box-body">
            {!! Form::open(['route' => 'anticipacion.store','method'=>'POST','id'=>'form_locacion','parsley-validate novalidate','class'=> 'form-horizontal']) !!}
            @include('reservaciones::Horarios.Anticipacion.partials.fields')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('anticipacion')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
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
            $("#loading").hide();
            $(".select2").select2();
            $("#locacionSelect").change(function(){
                $.getJSON( "/getClases/"+ $(this).val())
                    .done(function( jsonData ) {
                        select = '<select name="clase_id" class="form-control select3 select2-hidden-accessible" style="width: 100%" required id="position" >';
                        $.each(jsonData, function(i,data) {
                            console.log(data)
                            select +='<option value="'+data.id+'">'+data.nombre+'</option>';
                        });
                        select += '</select>';
                        console.log(select)
                        $("#position").html(select);
                        $(".select3").select2();
                    })
                    .fail(function( jqxhr, textStatus, error ) {
                            $("#position").html('<small>Seleccione primero una locacion</small>');

                    });
            });
            $(document).ajaxStart(function() {
                img = '<img src="/img/21.gif" id="loading" alt="loading">';
                $("#position").html(img);
            });
        });
    </script>
@endsection
