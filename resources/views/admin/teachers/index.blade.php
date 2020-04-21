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

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#running">Active Teacher</a></li>
            <li><a data-toggle="tab" href="#inactive">Inactive Teacher</a></li>
            <li><a data-toggle="tab" href="#trashed">Trashed Teacher</a></li>
        </ul>



        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Teachers</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('teachers.teacher.create') }}" class="btn btn-success" title="Create New Teacher">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>

        <div class="tab-content">
            <div id="running" class="tab-pane fade in active">

        @if(count($teachers) == 0)
            <div class="panel-body text-center">
                <h4>No Teachers Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Website</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td><img width="40" src="{{url('assets/uploads/avatar/'.$teacher->avatar)}}" alt="{{$teacher->name}}"></td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->mobile }}</td>
                            <td><a href="{{ $teacher->website }}" target="_blank">{{ $teacher->website }}</a> </td>

                            <td>

                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route'  => ['teachers.teacher.destroy', $teacher->id],
                                    'style'  => 'display: inline;',
                                ]) !!}
                                <div class="btn-group btn-group-xs pull-right" role="group">
                                    <a href="{{ route('teachers.teacher.show', $teacher->id ) }}" class="btn btn-info" title="Show Teacher">
                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                    </a>
                                    <a href="{{ route('teachers.teacher.edit', $teacher->id ) }}" class="btn btn-primary" title="Edit Teacher">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>

                                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                                        [
                                            'type'    => 'submit',
                                            'class'   => 'btn btn-danger',
                                            'title'   => 'Delete Teacher',
                                            'onclick' => 'return confirm("' . 'Delete Teacher?' . '")'
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
            {!! $teachers->render() !!}
        </div>

        @endif
            </div>

            <div id="inactive" class="tab-pane fade">
                @if(count($inactiveTeachers) == 0)
                    <div class="panel-body text-center">
                        <h4>No Inactive Teacher Available!</h4>
                    </div>
                @else
                    <div class="panel-body panel-body-with-table">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Website</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inactiveTeachers as $teacher)
                                    <tr>
                                        <td><img width="40" src="{{url('assets/uploads/avatar/'.$teacher->avatar)}}" alt="{{$teacher->name}}"></td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->mobile }}</td>
                                        <td><a href="{{ $teacher->website }}" target="_blank">{{ $teacher->website }}</a> </td>

                                        <td>

                                            {!! Form::open([
                                                'method' =>'DELETE',
                                                'route'  => ['teachers.teacher.destroy', $teacher->id],
                                                'style'  => 'display: inline;',
                                            ]) !!}
                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('teachers.teacher.show', $teacher->id ) }}" class="btn btn-info" title="Show Teacher">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('teachers.teacher.edit', $teacher->id ) }}" class="btn btn-primary" title="Edit Teacher">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </a>

                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                                                    [
                                                        'type'    => 'submit',
                                                        'class'   => 'btn btn-danger',
                                                        'title'   => 'Delete Teacher',
                                                        'onclick' => 'return confirm("' . 'Delete Teacher?' . '")'
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
                @endif
            </div>

            <div id="trashed" class="tab-pane fade">
                @if(count($teachersTrashed) == 0)
                    <div class="panel-body text-center">
                        <h4>No Trashed Teacher Available!</h4>
                    </div>
                @else
                    <div class="panel-body panel-body-with-table">
                        <div class="table-responsive">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Website</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachersTrashed as $teacher)
                                    <tr>
                                        <td><img width="40" src="{{url('assets/uploads/avatar/'.$teacher->avatar)}}" alt="{{$teacher->name}}"></td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->mobile }}</td>
                                        <td><a href="{{ $teacher->website }}" target="_blank">{{ $teacher->website }}</a> </td>

                                        <td>


                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('teachers.teacher.show', $teacher->id ) }}" class="btn btn-info" title="Show Teacher">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('teachers.teacher.edit', $teacher->id ) }}" class="btn btn-primary" title="Edit Teacher">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                @endif
            </div>
        </div>



    </div>
@endsection