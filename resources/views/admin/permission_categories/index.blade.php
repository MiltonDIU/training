@extends('layouts.master')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Permission Categories</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('permission_categories.permission_category.create') }}" class="btn btn-success" title="Create New Permission Category">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>
        
        @if(count($permissionCategories) == 0)
            <div class="panel-body text-center">
                <h4>No Permission Categories Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($permissionCategories as $permissionCategory)
                        <tr>
                            <td>{{ $permissionCategory->name }}</td>
                            <td>{{ $permissionCategory->slug }}</td>

                            <td>

                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route'  => ['permission_categories.permission_category.destroy', $permissionCategory->id],
                                    'style'  => 'display: inline;',
                                ]) !!}
                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('permission_categories.permission_category.show', $permissionCategory->id ) }}" class="btn btn-info" title="Show Permission Category">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

        <div class="panel-footer">
            {!! $permissionCategories->render() !!}
        </div>

        @endif

    </div>
@endsection