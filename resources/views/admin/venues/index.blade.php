@extends('layouts.master')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Venues</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('venues.venue.create') }}" class="btn btn-success" title="Create New Venue">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>
        
        @if(count($venues) == 0)
            <div class="panel-body text-center">
                <h4>No Venues Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Banner</th>
                            <th>Address</th>
                            <th>Is Active</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($venues as $venue)
                        <tr>
                            <td>{{ $venue->name }}</td>
                            <td><img width="80" src="{{url('assets/uploads/banner/'.$venue->banner)}}" alt="{{$venue->name}}"></td>
                            <td>{{ $venue->address }}</td>
                            <td>{{ ($venue->is_active) ? 'Yes' : 'No' }}</td>

                            <td>

                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route'  => ['venues.venue.destroy', $venue->id],
                                    'style'  => 'display: inline;',
                                ]) !!}
                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('venues.venue.show', $venue->id ) }}" class="btn btn-info" title="Show Venue">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

        <div class="panel-footer">
            {!! $venues->render() !!}
        </div>

        @endif

    </div>
@endsection