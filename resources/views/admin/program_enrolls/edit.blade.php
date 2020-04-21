@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($programEnroll->name) ? $programEnroll->name : 'Program Enroll' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('program_enrolls.program_enroll.index') }}" class="btn btn-primary" title="Show All Program Enroll">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('program_enrolls.program_enroll.create') }}" class="btn btn-primary" title="Create New Program Enroll">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">



            {!! Form::model($programEnroll, [
                'method' => 'PUT',
                'route' => ['program_enrolls.program_enroll.update', $programEnroll->id],
                'class' => 'form-horizontal',
                'name' => 'edit_program_enroll_form',
                'id' => 'edit_program_enroll_form',
                
            ]) !!}

            @include ('admin.program_enrolls.form', ['programEnroll' => $programEnroll,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection