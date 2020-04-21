@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($role->name) ? $role->name : 'Role' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['roles.role.destroy', $role->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('roles.role.index') }}" class="btn btn-primary" title="Show All Role">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('roles.role.create') }}" class="btn btn-success" title="Create New Role">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('roles.role.edit', $role->id ) }}" class="btn btn-primary" title="Edit Role">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Role',
                            'onclick' => 'return confirm("' . 'Delete Role?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $role->name }}</dd>
            <dt>Slug</dt>
            <dd>{{ $role->slug }}</dd>
            <dt>Detail</dt>
            <dd>{{ $role->detail }}</dd>
            <dt>Created At</dt>
            <dd>{{ $role->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $role->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection