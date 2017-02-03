@extends('layout.master')
@section('css')
	<link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
	<h1>Tareas</h1>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<div class="btn-group btn-group-sm pull-right">
						<a href="{{route('tasks.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Añadir</a>
					</div>
					<div class="col-lg-12">
						@include('flash::message')
					</div>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Usuarios</th>
							<th>Nombre de la tarea</th>
							<th>Fecha de inicio</th>
							<th>Fecha de vencimiento</th>
							<th>Estado</th>
							<th>Fecha terminada</th>
							<th>Acciones</th>
						</tr>
						</thead>
						<tbody>
						@foreach($tasks as $task)
							<tr>
								<td>
									@foreach($task->users()->get() as $user)
										{{$user->FullName}}|
									@endforeach
								</td>
								<td>{{$task->name}}</td>
								<td>{{$task->start_date}}</td>
								<td>{{$task->due_date}}</td>
								<td>{{$task->status}}</td>
								<td>{{$task->done_date}}</td>
								<td>
									<button type="button"
											class="btn btn-info btn-flat"
											data-toggle="modal"
											data-target="#task-modal"
											data-url="{{route('tasks.showtask',$task->id)}}"
											data-id="{{$task->id}}" title="Nota">
										<i class="fa fa-file"></i>
									</button>
									<a href="{{route('tasks.edit',$task->id)}}" class="btn btn-default btn-flat" title="Editar"
											><i class="fa fa-pencil "></i>
									</a>
									<button class="btn btn-danger "
											data-toggle="confirmation"
											data-singleton="true"
											data-btn-type="delete"
											data-url="{{route('tasks.destroy',$task->id)}}">
										<i class="fa fa-trash"></i>
									</button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->
	@include('tasks::layouts.modal-note')
	@endsection
@section('scripts')
		<!-- DATA TABES SCRIPT -->
	<script src="{{asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{asset('bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
	<!-- confirmation -->
	<script src="{{asset('js/ajax.js')}}"></script>
	<script src="{{asset('bower_components/admin-lte/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>
	<script src="{{asset('modules/tasks/js/note.js')}}"></script>
@endsection
