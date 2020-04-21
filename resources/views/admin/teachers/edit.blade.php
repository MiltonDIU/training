@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($teacher->name) ? $teacher->name : 'Teacher' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('teachers.teacher.index') }}" class="btn btn-primary" title="Show All Teacher">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('teachers.teacher.create') }}" class="btn btn-primary" title="Create New Teacher">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            {!! Form::model($teacher, [
                'method' => 'PUT',
                'route' => ['teachers.teacher.update', $teacher->id],
                'class' => 'form-horizontal',
                'name' => 'edit_teacher_form',
                'id' => 'edit_teacher_form',
                 'files'=>true
                
            ]) !!}

            @include ('admin.teachers.form', ['teacher' => $teacher,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection