@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($programEnroll->name) ? $programEnroll->name : 'Program Enroll' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['program_enrolls.program_enroll.destroy', $programEnroll->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('program_enrolls.program_enroll.index') }}" class="btn btn-primary" title="Show All Program Enroll">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('program_enrolls.program_enroll.create') }}" class="btn btn-success" title="Create New Program Enroll">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
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

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Course</dt>
            <dd>{{ optional($programEnroll->course)->name }}</dd>
            <dt>Name</dt>
            <dd>{{ $programEnroll->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $programEnroll->email }}</dd>
            <dt>Mobile</dt>
            <dd>{{ $programEnroll->mobile }}</dd>
            <dt>Created At</dt>
            <dd>{{ $programEnroll->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $programEnroll->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $programEnroll->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection