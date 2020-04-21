@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($venue->name) ? $venue->name : 'Venue' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('venues.venue.index') }}" class="btn btn-primary" title="Show All Venue">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('venues.venue.create') }}" class="btn btn-primary" title="Create New Venue">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">


            {!! Form::model($venue, [
                'method' => 'PUT',
                'route' => ['venues.venue.update', $venue->id],
                'class' => 'form-horizontal',
                'name' => 'edit_venue_form',
                'id' => 'edit_venue_form',
                'files'=>true
                
            ]) !!}

            @include ('admin.venues.form', ['venue' => $venue,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection