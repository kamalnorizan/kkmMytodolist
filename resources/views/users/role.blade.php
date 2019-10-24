@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Roles <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#createRoleModal">
					Create New Role
				</button></div>

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
				<div class="card-header">Permissions</div>

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
@endsection