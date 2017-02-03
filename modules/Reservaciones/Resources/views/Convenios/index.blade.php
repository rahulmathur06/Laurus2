@extends('layout.master')
@section('css')
	<link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
	<h1><i class="fa fa-book"></i> Convenios</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="{{url('convenio')}}">Convenios</a></li>
		<li class="active">Index</li>
	</ol>
@endsection
@section('content')
	@include('flash::message')
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Todos los convenios</h3>
					<div class="btn-group btn-group-sm pull-right">
						<a href="{{route('convenio.create')}}" class="btn btn-success "><i class="fa fa-plus"></i> Añadir</a>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Nombre</th>
							<th>Acronimo</th>
							<th>Idioma</th>
							<th>Moneda</th>
							<th>Tipo</th>
							<th>Activo</th>
							<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
						@foreach($convenios as $convenio)
							<tr>
								<td>{{$convenio->nombre}}</td>
								<td>{{$convenio->acronimo}}</td>
								<td>{{$convenio->idioma}}</td>
								<td>{{$convenio->moneda}}</td>
								<td>{{$convenio->tipo}}</td>
								<td>{{($convenio->activo == 1)?'Si':'No'}}</td>
								<td>
									<a href="{{route('convenio.show',$convenio->id)}}" class="btn btn-default " title="Ver Acceso"
											><i class="fa fa-eye"></i> </a>
									<a href="{{route('convenio.edit',$convenio->id)}}" class="btn btn-default btn-flat" title="Editar usuario"
												><i class="fa fa-edit"></i></a>
									<button class="btn btn-danger "
											data-toggle="confirmation"
											data-singleton="true"
											data-btn-type="delete"
											data-url="{{route('convenio.destroy',$convenio->id)}}">
										<i class="fa fa-trash"></i> </button>

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
