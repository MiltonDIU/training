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
                <h4 class="mt-5 mb-5">Course Enrolls</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('allocation_enrolls.allocation_enroll.create') }}" class="btn btn-success" title="Create New Course Enroll">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>
        
        @if(count($allocationEnrolls) == 0)
            <div class="panel-body text-center">
                <h4>No Course Enrolls Available!</h4>
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
                    @foreach($allocationEnrolls as $courseEnroll)
                        <tr>
                            <td>{{ optional($courseEnroll->allocation)->course->name.' ('.optional($courseEnroll->allocation)->batch->name.'  batch)'}}</td>
                            <td>{{ $courseEnroll->name }}</td>
                            <td>{{ $courseEnroll->email }}</td>
                            <td>{{ $courseEnroll->mobile }}</td>

                            <td>

                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route'  => ['allocation_enrolls.allocation_enroll.destroy', $courseEnroll->id],
                                    'style'  => 'display: inline;',
                                ]) !!}
                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('allocation_enrolls.allocation_enroll.show', $courseEnroll->id ) }}" class="btn btn-info" title="Show Course Enroll">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('allocation_enrolls.allocation_enroll.edit', $courseEnroll->id ) }}" class="btn btn-primary" title="Edit Course Enroll">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                                            [   
                                                'type'    => 'submit',
                                                'class'   => 'btn btn-danger',
                                                'title'   => 'Delete Course Enroll',
                                                'onclick' => 'return confirm("' . 'Delete Course Enroll?' . '")'
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
            {!! $allocationEnrolls->render() !!}
        </div>

        @endif

    </div>
@endsection