@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($permissionCategory->name) ? $permissionCategory->name : 'Permission Category' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['permission_categories.permission_category.destroy', $permissionCategory->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('permission_categories.permission_category.index') }}" class="btn btn-primary" title="Show All Permission Category">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('permission_categories.permission_category.create') }}" class="btn btn-success" title="Create New Permission Category">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('permission_categories.permission_category.edit', $permissionCategory->id ) }}" class="btn btn-primary" title="Edit Permission Category">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Permission Category',
                            'onclick' => 'return confirm("' . 'Delete Permission Category?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $permissionCategory->name }}</dd>
            <dt>Slug</dt>
            <dd>{{ $permissionCategory->slug }}</dd>
            <dt>Detail</dt>
            <dd>{{ $permissionCategory->detail }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($permissionCategory->is_active==1)?"Active":"InActive" }}</dd>
        </dl>

    </div>
</div>

@endsection