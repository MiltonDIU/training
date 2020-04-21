@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($program->name) ? $program->name : 'Program' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['programs.program.destroy', $program->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('programs.program.index') }}" class="btn btn-primary" title="Show All Program">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('programs.program.create') }}" class="btn btn-success" title="Create New Program">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('programs.program.edit', $program->id ) }}" class="btn btn-primary" title="Edit Program">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Program',
                            'onclick' => 'return confirm("' . 'Delete Program?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $program->name }}</dd>
            <dt>Venue</dt>
            <dd>{{ optional($program->venue)->name }}</dd>
            <dt>Category</dt>
            <dd>{{ optional($program->category)->name }}</dd>
            <dt>Program Type</dt>
            <dd>{{ optional($program->programType)->name }}</dd>
            <dt>Banner</dt>
            <dd>{{ $program->banner }}</dd>
            <dt>Summary</dt>
            <dd>{!! $program->summary !!} </dd>
            <dt>Details</dt>
            <dd>{!! $program->details !!}</dd>
            <dt>Is Paid</dt>
            <dd>{{ ($program->is_paid) ? 'Yes' : 'No' }}</dd>
            <dt>Fees</dt>
            <dd>{{ $program->fees }}</dd>
            <dt>Program Start Date</dt>
            <dd>{{ $program->begin_date }}</dd>
            <dt>Program End Date</dt>
            <dd>{{ $program->close_date }}</dd>
            <dt>Program Schedule</dt>

            <dd>
                <table class="table table-striped">
                    @php
                        $i=0;
                    @endphp
                    @foreach($program->day as $day)
                        <tr>
                            <td>{{$program->day[$i]->name}}</td>
                            <td>{{$day->pivot->begin_time}}  </td>
                            <td> {{$day->pivot->close_time}}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </table>
            </dd>
            <dt>Is Active</dt>
            <dd>{{ ($program->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection