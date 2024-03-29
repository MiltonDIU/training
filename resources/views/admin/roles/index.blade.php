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
                <h4 class="mt-5 mb-5">Roles</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('roles.role.create') }}" class="btn btn-success" title="Create New Role">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>
        
        @if(count($roles) == 0)
            <div class="panel-body text-center">
                <h4>No Roles Available!</h4>
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
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->slug }}</td>

                            <td>

                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route'  => ['roles.role.destroy', $role->id],
                                    'style'  => 'display: inline;',
                                ]) !!}
                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('roles.role.show', $role->id ) }}" class="btn btn-info" title="Show Role">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

        <div class="panel-footer">
            {!! $roles->render() !!}
        </div>

        @endif

    </div>
@endsection