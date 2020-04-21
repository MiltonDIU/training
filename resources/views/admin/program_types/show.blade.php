@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($programType->name) ? $programType->name : 'Program Type' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['program_types.program_type.destroy', $programType->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('program_types.program_type.index') }}" class="btn btn-primary" title="Show All Program Type">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('program_types.program_type.create') }}" class="btn btn-success" title="Create New Program Type">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('program_types.program_type.edit', $programType->id ) }}" class="btn btn-primary" title="Edit Program Type">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Program Type',
                            'onclick' => 'return confirm("' . 'Delete Program Type?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $programType->name }}</dd>
            <dt>Slug</dt>
            <dd>{{ $programType->slug }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($programType->is_active) ? 'Yes' : 'No' }}</dd>
            <dt>Created At</dt>
            <dd>{{ $programType->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $programType->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection