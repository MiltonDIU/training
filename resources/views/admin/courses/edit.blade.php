@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($course->name) ? $course->name : 'Course' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('courses.course.index') }}" class="btn btn-primary" title="Show All Course">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('courses.course.create') }}" class="btn btn-primary" title="Create New Course">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">


            {!! Form::model($course, [
                'method' => 'PUT',
                'route' => ['courses.course.update', $course->id],
                'class' => 'form-horizontal',
                'name' => 'courses',
                'id' => 'courses',
                 'files'=>true
            ]) !!}

            @include ('admin.courses.form', ['course' => $course,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection