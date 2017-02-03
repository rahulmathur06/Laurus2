@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("modules/cuentascorporativas/css/custom.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-list"></i> CheckList</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('checklist')}}">Checklist</a></li>
        <li class="active">Index</li>
    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
               <h3 class="box-title">CheckList</h3>
                    <div class="btn-group btn-group-sm pull-right">
                        <a href="{{route('checklist.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Nuevo Record </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-striped table-bordered table-checklist-index" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Tipo de Persona</th>
                            <th>Documento</th>
                            <th>TipoConvenio</th>
                            <th>Orden</th>
                            <th>Requerido</th>
                            <th>Vig.</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                      @if(isset($checklist)  )
                        @foreach($checklist as $data)
                            <tr>
                                <td>{{$data->persion_desc}}</td>
                                <td>{{$data->documento}}</td>
                                <td>{{$data->convention_desc}}</td>
                                <td>{{$data->orden}}</td>
                                <td><input value="{!! $data->requerido !!}" disabled="true" type="checkbox" class="minimal" name="requerido" @if($data->requerido == 1)checked="" @endif></td>
                                <td><input value="{!! $data->validar_fecha !!}" disabled="true" type="checkbox" class="minimal" name="validar_fecha" @if($data->validar_fecha == 1) checked="" @endif></td>
                                <td class="btn-group btn-group-xs">
                                    <a href="{{route('checklist.edit',$data->id)}}" class="btn btn-success " title="Editar "
                                       ><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="delete"
                                       data-url="{{route('checklist.destroy',$data->id)}}">
                                       <i class="fa fa-close"></i></a>
                                </td>
                            </tr>
                        @endforeach
                      @endif
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
