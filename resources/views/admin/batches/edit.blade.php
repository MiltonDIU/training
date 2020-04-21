@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($batches->name) ? $batches->name : 'Batch' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('batches.batch.index') }}" class="btn btn-primary" title="Show All Batches">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('batches.batch.create') }}" class="btn btn-primary" title="Create New Batches">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">



            {!! Form::model($batches, [
                'method' => 'PUT',
                'route' => ['batches.batch.update', $batches->id],
                'class' => 'form-horizontal',
                'name' => 'edit_program_type_form',
                'id' => 'edit_program_type_form',
                
            ]) !!}

            @include ('admin.batches.form', ['batch' => $batches,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection