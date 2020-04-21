@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Permission' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['permissions.permission.destroy', $permission->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('permissions.permission.index') }}" class="btn btn-primary" title="Show All Permission">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('permissions.permission.create') }}" class="btn btn-success" title="Create New Permission">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('permissions.permission.edit', $permission->id ) }}" class="btn btn-primary" title="Edit Permission">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Permission',
                            'onclick' => 'return confirm("' . 'Delete Permission?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Permission Category</dt>
            <dd>{{ optional($permission->permissionCategory)->name }}</dd>
            <dt>Namespace</dt>
            <dd>{{ $permission->namespace }}</dd>
            <dt>Controller</dt>
            <dd>{{ $permission->controller }}</dd>
            <dt>Method</dt>
            <dd>{{ $permission->method }}</dd>
            <dt>Method Name</dt>
            <dd>{{ $permission->action }}</dd>
            <dt>Display</dt>
            <dd>{{ $permission->display }}</dd>
            <dt>Allowed</dt>
            <dd>{{ ($permission->allowed) ? 'Yes' : 'No' }}</dd>
            <dt>Detail</dt>
            <dd>{{ $permission->detail }}</dd>
        </dl>

    </div>
</div>

@endsection