@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("bower_components/admin-lte/plugins/jQueryUI/jQueryUI.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/fueraservicio/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>Captura de Siniestro</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('fueraservicio.index')}}">Siniestros</a></li>
    <li><a href="{{route('fueraservicio.index')}}">Fuera de Servicio</a></li>
    <li class="active">Nuevo</li>
</ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        {!! Form::model($fueraservicio,['route' => ['fueraservicio.update', $fueraservicio->siniestro_id],'method'=>'PUT','id'=>'form_fueraservicio-hdsd','parsley-validate novalidate']  ) !!}
        @include('flota::siniestros.partials.basic')
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="enviar"><i class="fa fa-save"></i> Guardar Siniestro</button></div>
                <div class='formActionButton'><a href="{{url('fueraservicio')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>

<!-- Modal for moving operation of the entry from Out of service to total loss  -->
<div id="popupAdditionalFieldsForPerdidaTotal" class="modal fade" role="dialog">
    @include('flota::siniestros.partials.siniestroToPerdidaTotal')
</div>
@endsection
@section('scripts')
<script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{asset('bower_components/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{asset('modules/fueraservicio/js/custom.js') }}"></script>
<script>
$(function () {
    $(".select2").select2();
    $(".select3").select2();
    $(".jQueryUIDatepicker").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        maxDate: 0
    });
    $(".jQueryUIDatepickerstart").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        maxDate: 0,
        onSelect: function (selected) {
            $(".jQueryUIDatepickerwithFutureDate").datepicker("option", "minDate", selected);
        }
    });
    $(".jQueryUIDatepickerwithFutureDate").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+100",
    });
    jQuery.get_car_desc(document.getElementById('clave').value, "{!! URL::to('carcodetodescription')!!}");
    $('#clave').on("change", function () {
        jQuery.get_car_desc(this.value, "{!! URL::to('carcodetodescription')!!}");
    });
});

function moveToPerdidaTotal() {
    var formData = jQuery('#form_fueraservicio-hdsd').serializeArray();
    var additionalFromData = jQuery('#form_perdida_total_additional').serializeArray();

    formData.push({
        name: '_method',
        value: 'POST'
    });
    
    formData.push({
        name: 'siniestro_id',
        value: {{ $fueraservicio->siniestro_id }}
    });

    for (var key in additionalFromData) {
        formData.push(additionalFromData[key]);
    }

    //console.log(formData);

    jQuery.ajax({

        url: "{!! route('fueraservicio.move') !!}",
        data: formData,
        type: 'POST',
        success: function (response) {
            response = jQuery.parseJSON(response);
            if (response.success == true) {
                swal({title: "Exito",
                    text: response.msg,
                    type: "success",
                    showCancelButton: false,
                    closeOnConfirm: true,
                    showLoaderOnConfirm: false
                }, function () {
                    window.location.href = "{!! route('fueraservicio.index') !!}";
                });
            }
        },
        error: function (response) {
            response = response.responseJSON;
            var errorsHtml = '<div class="alert alert-danger"><ul>';
            for (key in response) {
                errorsHtml += '<li>' + response[key] + '</li>';
                jQuery("[name='"+ key +"']").parents('.form-group').addClass('has-error');
            }
            errorsHtml += '</ul></di>';
            swal({title: "Oops!",
                html:true,
                text: errorsHtml, //response.msg,
                type: "error",
                showCancelButton: false,
                closeOnConfirm: true,
                showLoaderOnConfirm: false
            }, function () {
                ;
            });
        }
    });
}

</script>

@endsection
