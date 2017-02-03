@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>Autorización de Tarifas</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('tarifas/auth')}}">Tarifas</a></li>
    <li><a href="{{url('tarifas/auth')}}">Autorización de Tarifas</a></li>
    <li class="active">Index</li>
</ol>
@endsection
@section('content')
@include('flash::message')
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre Tarifa</th>
                            <th>Tipo</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Moneda</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tarifas as $tarifa)
                        <tr>
                            <td>{{$tarifa->nombre}}</td>
                            <td>{{$tarifa_types[$tarifa->tipo]}}</td>
                            <td>{{$tarifa->f_ini}}</td>
                            <td>{{$tarifa->f_fin}}</td>
                            <td>{{$tarifa->moneda}}</td>
                            <td>
                                <a href="{{route('tarifa_auth.show',$tarifa->id)}}" class="btn btn-warning" title="Editar "
                                   ><i class="fa fa-eye"></i></a>
<!--                                <a href="javascript:void(0)" onClick="updateStatus({{$tarifa->id}}, 1)" class="btn btn-success"><i class="fa fa-check"></i></a>
                                <a href="javascript:void(0)" onClick="updateStatus({{$tarifa->id}}, 0)" class="btn btn-danger"><i class="fa fa-close"></i></a>-->
                                <a class="btn btn-success "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="update"
                                       data-entry-id="{{$tarifa->id}}"
                                       data-status="1">
                                        <i class="fa fa-check"></i></a>
                                <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="update"
                                       data-entry-id="{{$tarifa->id}}"
                                       data-status="0"
                                       >
                                        <i class="fa fa-close"></i></a>
                                <form id="action_form_{{$tarifa->id}}" action="{{route('tarifa_auth.update', $tarifa->id)}}" style="display:none" method="post">
                                    {{ method_field('PUT') }}
                                    {{csrf_field()}}
                                    <input type="hidden" name="status" id="status" value="">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('scripts')
<!-- DATA TABES SCRIPT -->
<script src="{{asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{asset('bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<!-- confirmation -->
<script src="{{asset('modules/reservations/js/approval.js') }}"></script>
<script src="{{asset('bower_components/admin-lte/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>
@endsection
