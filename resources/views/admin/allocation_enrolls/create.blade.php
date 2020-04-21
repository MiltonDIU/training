@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Create New Course Enroll</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('allocation_enrolls.allocation_enroll.index') }}" class="btn btn-primary" title="Show All Course Enroll">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

            </div>

        </div>

        <div class="panel-body">


            {!! Form::open([
                 'route' => 'allocation_enrolls.allocation_enroll.store',
                 'class' => 'form-horizontal',
                 'name' => 'enroll',
                 'id' => 'enroll',

                 ])
             !!}

            @include ('admin.allocation_enrolls.form', ['allocationEnroll' => null,])
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection


