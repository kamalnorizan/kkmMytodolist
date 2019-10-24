@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Users Management</div>

				<div class="card-body">
					<table class="table">
						<tr>
							<td>
								Name
							</td>
							<td>
								Email
							</td>
							<td>
								Roles
							</td>
							<td>
								Actions
							</td>
						</tr>
						@foreach ($users as $user)
						<tr>
							<td>
								{{$user->name}}			
							</td>
							<td>
								{{$user->email}}			

							</td>
							<td>			
								@if (!empty($user->getRoleNames()))
								@foreach ($user->getRoleNames() as $role)
								<span class="badge badge-success">{{$role}}</span>
								@endforeach
								@endif
								<br>
								@if (!empty($user->getPermissionsViaRoles()))
								@foreach ($user->getPermissionsViaRoles() as $permission)
								<span class="badge badge-info">{{$permission->name}}</span>
								@endforeach
								@endif
							</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#assignRoleModal" data-name="{{$user->name}}" data-id="{{$user->id}}">
									Assign Role
								</button>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="assignRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Assign Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{!! Form::open(['method' => 'POST', 'route' => 'assignrole']) !!}
			<div class="modal-body">
				
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'readonly', 'id'=>'name']) !!}
					<small class="text-danger">{{ $errors->first('name') }}</small>
				</div>
				<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
					{!! Form::label('role', 'Role') !!}
					{!! Form::select('role', $options, null, ['id' => 'role', 'class' => 'form-control', 'required' => 'required']) !!}
					<small class="text-danger">{{ $errors->first('role') }}</small>
				</div>
				{!! Form::hidden('user_id', 'value', ['id'=>'user_id']) !!}

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	$(document).ready(function(){
		$('#assignRoleModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var name = button.data('name');
			var id = button.data('id');

			$('#user_id').val(id);
			$('#name').val(name);
		});
	});
</script>
@endsection