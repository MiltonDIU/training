@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($venue->name) ? $venue->name : 'Venue' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['venues.venue.destroy', $venue->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('venues.venue.index') }}" class="btn btn-primary" title="Show All Venue">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('venues.venue.create') }}" class="btn btn-success" title="Create New Venue">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('venues.venue.edit', $venue->id ) }}" class="btn btn-primary" title="Edit Venue">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Venue',
                            'onclick' => 'return confirm("' . 'Delete Venue?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $venue->name }}</dd>
            <dt>Banner</dt>
            <dd>{{ $venue->banner }}</dd>
            <dt>Address</dt>
            <dd>{{ $venue->address }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($venue->is_active) ? 'Yes' : 'No' }}</dd>
            <dt>Created At</dt>
            <dd>{{ $venue->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $venue->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $venue->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection