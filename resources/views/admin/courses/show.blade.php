@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($course->name) ? $course->name : 'Course' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['courses.course.destroy', $course->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('courses.course.index') }}" class="btn btn-primary" title="Show All Course">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('courses.course.create') }}" class="btn btn-success" title="Create New Course">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('courses.course.edit', $course->id ) }}" class="btn btn-primary" title="Edit Course">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Course',
                            'onclick' => 'return confirm("' . 'Delete Course?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Venue</dt>
            <dd>{{ optional($course->venue)->name }}</dd>
            <dt>Category</dt>
            <dd>{{ optional($course->category)->name }}</dd>
            <dt>Name</dt>
            <dd>{{ $course->name }}</dd>
            <dt>Banner</dt>
            <dd><img width="220" src="{{url('assets/uploads/course/banner/'.$course->banner)}}" alt="{{$course->name}}"></dd>

          {{-- <dt>Class Schedule</dt>
            <dd>
                <table class="table table-striped">
                    @php
                        $i=0;
                    @endphp
                    @foreach($course->day as $day)
                        <tr>
                            <td>{{$course->day[$i]->name}}</td>
                            <td>{{$day->pivot->begin_time}} </td>
                            <td> {{$day->pivot->close_time}}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </table>
            </dd>
--}}



            <dt>Detail</dt>
            <dd>{!! $course->detail !!}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($course->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection