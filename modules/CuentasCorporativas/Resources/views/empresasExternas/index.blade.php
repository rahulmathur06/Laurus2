@extends('layout.master')
@section('css')
<link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("modules/cuentascorporativas/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
<h1>EMPRESAS EXTERNAS - LISTADO GENERAL</h1>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('empresasExternas.index')}}">Cuentas Corporativas</a></li>
    <li><a href="{{route('empresasExternas.index')}}">Empresas Externas</a></li>
    <li class="active">Index</li>
</ol>
@endsection
@section('content')
@include('flash::message')
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="btn-group btn-group-sm pull-right">
                    <a href="{{route('empresasExternas.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Nuevo Record </a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>RFC</th>
                                <th>NOMBRE</th>
                                <th>EJECUTIVO</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Empresas as $lsit)
                            <tr>
                                <td>{{$lsit->id}}</td>
                                <td>{{$lsit->rfc}}</td>
                                <td>{{$lsit->nombre}}</td>
                                 <td>{{$lsit->ejecutiva_id}}</td>
                                <td class="btn-group btn-group-xs">
                                    <a href="{{route('empresasExternas.edit',$lsit->id)}}" class="btn btn-success " title="Editar "
                                       ><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="delete"
                                       data-url="{{route('empresasExternas.destroy',$lsit->id)}}">
                                        <i class="fa fa-close"></i></a>
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
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('bower_components/admin-lte/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>

@endsection
