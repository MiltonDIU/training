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
                <h4 class="mt-5 mb-5">Program Enrolls</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('program_enrolls.program_enroll.create') }}" class="btn btn-success" title="Create New Program Enroll">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>
        
        @if(count($programEnrolls) == 0)
            <div class="panel-body text-center">
                <h4>No Program Enrolls Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($programEnrolls as $programEnroll)
                        <tr>
                            <td>{{ optional($programEnroll->course)->name }}</td>
                            <td>{{ $programEnroll->name }}</td>
                            <td>{{ $programEnroll->email }}</td>
                            <td>{{ $programEnroll->mobile }}</td>

                            <td>

                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route'  => ['program_enrolls.program_enroll.destroy', $programEnroll->id],
                                    'style'  => 'display: inline;',
                                ]) !!}
                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('program_enrolls.program_enroll.show', $programEnroll->id ) }}" class="btn btn-info" title="Show Program Enroll">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('program_enrolls.program_enroll.edit', $programEnroll->id ) }}" class="btn btn-primary" title="Edit Program Enroll">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                                            [   
                                                'type'    => 'submit',
                                                'class'   => 'btn btn-danger',
                                                'title'   => 'Delete Program Enroll',
                                                'onclick' => 'return confirm("' . 'Delete Program Enroll?' . '")'
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
            {!! $programEnrolls->render() !!}
        </div>

        @endif

    </div>
@endsection