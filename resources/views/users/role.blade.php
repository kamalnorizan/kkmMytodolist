@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Roles 
					<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#createRoleModal">
						Create New Role
					</button>
				</div>

				<div class="card-body">
					<table class="table">
						<tr>
							<td>
								Name
							</td>
							<td>
								Permissions
							</td>
							<td>
								Action
							</td>
						</tr>
						@foreach ($roles as $role)
						<tr>
							<td>
								{{$role->name}}
							</td>
							<td>
								@foreach ($role->permissions as $permission)
								<span class="badge badge-info">{{$permission->name}}</span>
								@endforeach
							</td>
							<td>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rolepermissionmodal" data-permissions="{{$role->permissions}}">
									Update Permissions
								</button>	
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Permissions
					<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#createPermissionModal">
						Create New Permission
					</button>
				</div>

				<div class="card-body">
					<table class="table">
						<tr>
							<td>
								Permission
							</td>
							<td>
								Roles
							</td>
							<td>
								Action
							</td>
						</tr>
						@foreach ($permissions as $permission)
						<tr>
							<td>
								{{$permission->name}}
							</td>
							<td>
								@foreach ($permission->roles as $role)
								<span class="badge badge-primary">{{$role->name}}</span>	
								@endforeach
							</td>
							<td>

							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">New Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{!! Form::open(['method' => 'POST', 'route' => 'createRole']) !!}
			<div class="modal-body">
				<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
					{!! Form::label('role', 'Role') !!}
					{!! Form::text('role', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<small class="text-danger">{{ $errors->first('role') }}</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
<div class="modal fade" id="createPermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">New Permission</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{!! Form::open(['method' => 'POST', 'route' => 'createPermission']) !!}
			<div class="modal-body">
				<div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
					{!! Form::label('permission', 'Permission') !!}
					{!! Form::text('permission', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<small class="text-danger">{{ $errors->first('permission') }}</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="rolepermissionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Role Permissions</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{!! Form::open(['method' => 'POST', 'url' => 'roleassignpermission']) !!}
			<div class="modal-body">
				<div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
					{!! Form::label('permissions', 'Permission') !!}
					{!! Form::select('permissions', $permissions->pluck('name','name'), null, ['id' => 'permissions', 'class' => 'form-control', 'required' => 'required', 'multiple']) !!}
					<small class="text-danger">{{ $errors->first('permissions') }}</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$('#rolepermissionmodal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var permission = button.data('permission');

			console.log(permission);
		});
	});
</script>
@endsection