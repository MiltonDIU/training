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
                <h4 class="mt-5 mb-5">Permissions</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('permissions.permission.create') }}" class="btn btn-success" title="Create New Permission">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>
        
        @if(count($permissions) == 0)
            <div class="panel-body text-center">
                <h4>No Permissions Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Permission Category</th>
                            <th>Namespace</th>
                            <th>Controller</th>
                            <th>Method</th>
                            <th>Method Name</th>
                            <th>Display</th>
                            <th>Allowed</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ optional($permission->permissionCategory)->name }}</td>
                            <td>{{ $permission->namespace }}</td>
                            <td>{{ $permission->controller }}</td>
                            <td>{{ $permission->method }}</td>
                            <td>{{ $permission->action }}</td>
                            <td>{{ $permission->display }}</td>
                            <td>{{ ($permission->allowed) ? 'Yes' : 'No' }}</td>

                            <td>

                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route'  => ['permissions.permission.destroy', $permission->id],
                                    'style'  => 'display: inline;',
                                ]) !!}
                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('permissions.permission.show', $permission->id ) }}" class="btn btn-info" title="Show Permission">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

        <div class="panel-footer">
            {!! $permissions->render() !!}
        </div>

        @endif

    </div>
@endsection