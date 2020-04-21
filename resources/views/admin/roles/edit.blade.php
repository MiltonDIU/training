@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($role->name) ? $role->name : 'Role' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('roles.role.index') }}" class="btn btn-primary" title="Show All Role">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('roles.role.create') }}" class="btn btn-primary" title="Create New Role">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">



            {!! Form::model($role, [
                'method' => 'PUT',
                'route' => ['roles.role.update', $role->id],
                'class' => 'form-horizontal',
                'name' => 'edit_role_form',
                'id' => 'edit_role_form',
                
            ]) !!}

            @include ('admin.roles.form', ['role' => $role,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection