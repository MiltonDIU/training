@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Permission' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('permissions.permission.index') }}" class="btn btn-primary" title="Show All Permission">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('permissions.permission.create') }}" class="btn btn-primary" title="Create New Permission">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">



            {!! Form::model($permission, [
                'method' => 'PUT',
                'route' => ['permissions.permission.update', $permission->id],
                'class' => 'form-horizontal',
                'name' => 'edit_permission_form',
                'id' => 'edit_permission_form',
                
            ]) !!}

            @include ('admin.permissions.form', ['permission' => $permission,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection