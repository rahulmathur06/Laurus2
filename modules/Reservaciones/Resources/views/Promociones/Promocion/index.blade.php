@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa  fa-ticket"></i> Promociones</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('promociones')}}">Promociones</a></li>
        <li class="active">Index</li>
    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="btn-group btn-group-sm pull-right">
                        <a href="{{route('promociones.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Añadir </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de vencimiento</th>
                                <th>Moneda</th>
                                <th>Tipo de promoción</th>
                                <th>Visible</th>
                                <th>Activo</th>


                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($promociones as $promocion)
                            <tr>
                                <td>{{$promocion->translation('es-MX')->get()->first()->nombre}}</td>
                                <td>{{$promocion->fechaini}}</td>
                                <td>{{$promocion->fechafin}}</td>
                                <td>{{$promocion->moneda}}</td>
                                <td>{{$promocion->tipo_promocion}}</td>
                                <td>{{$promocion->visible}}</td>
                                <td>{{$promocion->activo}}</td>
                                <td>
                                    <a href="{{route('promotranslate.index',$promocion->id)}}" class="btn btn-default " title="Traducciones"
                                        ><i class="fa fa-list"></i></a>
                                    <a href="{{route('promociones.edit',$promocion->id)}}" class="btn btn-default " title="Editar"
                                            ><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="delete"
                                       data-url="{{route('promociones.destroy',$promocion->id)}}">
                                        <i class="fa fa-trash"></i></a>
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