@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($courseEnroll->name) ? $courseEnroll->name : 'Course Enroll' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('allocation_enrolls.allocation_enroll.index') }}" class="btn btn-primary" title="Show All Course Enroll">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('allocation_enrolls') }}" class="btn btn-primary" title="Create New Course Enroll">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            {!! Form::model($courseEnroll, [
                'method' => 'PUT',
                'route' => ['allocation_enrolls.allocation_enroll.update', $courseEnroll->id],
                'class' => 'form-horizontal',
                'name' => 'edit_course_enroll_form',
                'id' => 'edit_course_enroll_form',
                
            ]) !!}

            @include ('admin.allocation_enrolls.form', ['allocationEnroll' => $courseEnroll,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection