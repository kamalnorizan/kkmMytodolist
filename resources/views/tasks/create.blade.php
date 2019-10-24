@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Task</div>

                <div class="card-body">
                   {!! Form::open(['method' => 'POST', 'url' => 'task']) !!}
                   
                       <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                           {!! Form::label('title', 'Title') !!}
                           {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                           <small class="text-danger">{{ $errors->first('title') }}</small>
                       </div>
                       <div class="form-group{{ $errors->has('duedate') ? ' has-error' : '' }}">
                           {!! Form::label('duedate', 'Due Date') !!}
                           {!! Form::date('duedate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                           <small class="text-danger">{{ $errors->first('duedate') }}</small>
                       </div>
                   
                       <div class="btn-group pull-right">
                           {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                           {!! Form::submit("Simpan", ['class' => 'btn btn-primary']) !!}
                       </div>
                   
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
