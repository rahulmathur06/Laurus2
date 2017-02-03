@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/reservations/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>DropOff <small>Ubicaciones</small></h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('ubicaciones')}}">DropOff</a></li>
    <li><a href="{{url('ubicaciones')}}">Ubicaciones</a></li>
    <li class="active">Nuevo</li>
</ol>
@endsection
@section('content')
@include('errors.errors')<!-- errors -->
<div class="box box-success">
    <div class="box-body">
        <div class='container-fluid'>
            {!! Form::open(['route' => 'ubicaciones.store','method'=>'POST','id'=>'form_tipo_empresas','parsley-validate novalidate']) !!}
            <div class="row">
                <div class="col-md-6">
                    @include('reservaciones::dropoff.ubicaciones.partials.basic')
                </div>
                <div class="col-md-6">
                    @include('reservaciones::dropoff.ubicaciones.partials.map')
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <div class='formActionButton'><button type="submit" class="btn btn-success" id="save_ubicaciones" disabled><i class="fa fa-save"></i>  Guardar</button></div>
                <div class='formActionButton'><a href="{{url('ubicaciones')}}" class="btn btn-default" ><i class="fa fa-remove"></i> Cancelar</a></div>
            </div>
        </div>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
<script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key={{config('reservaciones.google_map_api_key')}}&libraries=places"></script>
<script src="{{asset('modules/reservations/js/ubicaciones.js') }}"></script>
<script type="text/javascript">
    var urlToGetLocation = "{!! route('ubicaciones.get_position') !!}";
</script>
<script src="{{asset('modules/reservations/js/map_route.js') }}"></script>
@endsection
