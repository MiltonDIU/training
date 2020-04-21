@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($allocationEnroll->course->name) ? $allocationEnroll->course->name : 'Course Enroll' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['allocation_enrolls.allocation_enroll.destroy', $allocationEnroll->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('allocation_enrolls.allocation_enroll.index') }}" class="btn btn-primary" title="Show All Course Enroll">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('allocation_enrolls.allocation_enroll.create') }}" class="btn btn-success" title="Create New Course Enroll">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('allocation_enrolls.allocation_enroll.edit', $allocationEnroll->id ) }}" class="btn btn-primary" title="Edit Course Enroll">
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

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Course</dt>
            <dd>{{ optional($allocationEnroll->course)->name }}</dd>
            <dt>Name</dt>
            <dd>{{ $allocationEnroll->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $allocationEnroll->email }}</dd>
            <dt>Mobile</dt>
            <dd>{{ $allocationEnroll->mobile }}</dd>
            <dt>Created At</dt>
            <dd>{{ $allocationEnroll->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $allocationEnroll->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection