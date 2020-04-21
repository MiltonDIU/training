@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($batch->name) ? $batch->name : 'Batch' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['batches.batch.destroy', $batch->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('batches.batch.index') }}" class="btn btn-primary" title="Show All Batche">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('batches.batch.create') }}" class="btn btn-success" title="Create New Batche">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('batches.batch.edit', $batch->id ) }}" class="btn btn-primary" title="Edit Batche">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Batche',
                            'onclick' => 'return confirm("' . 'Delete Batche?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $batch->name }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($batch->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection