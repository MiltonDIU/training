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
                <h4 class="mt-5 mb-5">Batchess</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('allocations.allocation.create') }}" class="btn btn-success" title="Create New Allocation">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#all">All</a></li>
                <li><a data-toggle="tab" href="#running">Running</a></li>
                <li><a data-toggle="tab" href="#upcoming">Upcoming</a></li>
                <li><a data-toggle="tab" href="#completed">Completed</a></li>
            </ul>

            <div class="tab-content">
                <div id="all" class="tab-pane fade in active">
                    <h3>All batch</h3>

                    @if(count($allocations) == 0)
                        <div class="panel-body text-center">
                            <h4>No Batches Available!</h4>
                        </div>
                    @else
                        <div class="panel-body panel-body-with-table">

                                <div class="table-scrollable table-scrollable-borderless">


                                    <table id="course" class="mdl-data-table course" width="100%" cellspacing="0">

                                    <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Batch</th>
                                        <th>Total Enroll</th>
                                        <th>Class Schedule</th>
                                        <th>Resource Person</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allocations as $allocation)
                                        <tr>
                                            <td><a href="{{route('courses.course.show', $allocation->course_id )}}" > 
                                            @if($allocation->course)
                                              {{$allocation->course->name}}
                                              @endif
                                              </a>
                                            </td>

                                            <td>{{ $allocation->batch->name }}</td>
                                            <td> <a href="{{ route('allocations.allocation.show', $allocation->id ) }}">View Enroll({{$allocation->allocationEnroll->count()}})</a></td>
                                            <td>
                                                <dt>Class Schedule</dt>
                                                <dd>
                                                    <table class="table table-striped">
                                                        @php
                                                            $i=0;
                                                        @endphp
                                                        @foreach($allocation->day as $day)
                                                            <tr>
                                                                <td>{{$allocation->day[$i]->name}}
                                                                </td>



                                                                <td>{{$day->pivot->begin_time}} </td>
                                                                <td> {{$day->pivot->close_time}}</td>
                                                            </tr>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endforeach
                                                    </table>
                                                </dd>
                                            </td>

                                            <td>
                                                @foreach($allocation->teacher as $teacher)
                                                    <a href="{{ route('teachers.teacher.show', $teacher->id ) }}">
                                                         <span class="label label-success">
                                                         {{$teacher->name}}
                                                         </span>
                                                    </a>
                                                    <br>
                                                @endforeach

                                            </td>

                                            <td>{{ ($allocation->is_active) ? 'Yes' : 'No' }}</td>

                                            <td>

                                                {!! Form::open([
                                                    'method' =>'DELETE',
                                                    'route'  => ['allocations.allocation.destroy', $allocation->id],
                                                    'style'  => 'display: inline;',
                                                ]) !!}
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('allocations.allocation.show', $allocation->id ) }}" class="btn btn-info" title="Show Batche">
                                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="{{ route('allocations.allocation.edit', $allocation->id ) }}" class="btn btn-primary" title="Edit Batche">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                   {{--                                                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',--}}
{{--                                                        [--}}
{{--                                                            'type'    => 'submit',--}}
{{--                                                            'class'   => 'btn btn-danger',--}}
{{--                                                            'title'   => 'Delete Allocations',--}}
{{--                                                            'onclick' => 'return confirm("' . 'Delete Allocations?' . '")'--}}
{{--                                                        ])--}}
{{--                                                    !!}--}}
{{--                                                    {!! Form::close() !!}--}}
                                                </div>
                                              
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    @endif



                </div>
                <div id="running" class="tab-pane fade">
                    <h3>Running</h3>
                    @if(count($running) == 0)
                        <div class="panel-body text-center">
                            <h4>No Batches Available!</h4>
                        </div>
                    @else
                        <div class="panel-body panel-body-with-table">
                            <div class="table-responsive">

                                <table class="table table-striped course">
                                    <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Batch</th>
                                        <th>Total Enroll</th>
                                        <th>Class Schedule</th>
                                        <th>Resource Person</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($running as $allocation)
                                        <tr>
                                            <td><a href="{{route('courses.course.show', $allocation->course_id )}}" >
                                                 @if($allocation->course)
                                              {{$allocation->course->name}}
                                              @endif
                                            </a>
                                            </td>

                                            <td>{{ $allocation->batch->name }}</td>
                                            <td> <a href="{{ route('allocations.allocation.show', $allocation->id ) }}">View Enroll({{$allocation->allocationEnroll->count()}})</a></td>
                                            <td>
                                                <dt>Class Schedule</dt>
                                                <dd>
                                                    <table class="table table-striped">
                                                        @php
                                                            $i=0;
                                                        @endphp
                                                        @foreach($allocation->day as $day)
                                                            <tr>
                                                                <td>{{$allocation->day[$i]->name}}
                                                                </td>



                                                                <td>{{$day->pivot->begin_time}} </td>
                                                                <td> {{$day->pivot->close_time}}</td>
                                                            </tr>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endforeach
                                                    </table>
                                                </dd>
                                            </td>

                                            <td>
                                                @foreach($allocation->teacher as $teacher)
                                                    <a href="{{ route('teachers.teacher.show', $teacher->id ) }}">
                                                         <span class="label label-success">
                                                         {{$teacher->name}}
                                                         </span>
                                                    </a>
                                                    <br>
                                                @endforeach

                                            </td>

                                            <td>{{ ($allocation->is_active) ? 'Yes' : 'No' }}</td>

                                            <td>

                                                {!! Form::open([
                                                    'method' =>'DELETE',
                                                    'route'  => ['allocations.allocation.destroy', $allocation->id],
                                                    'style'  => 'display: inline;',
                                                ]) !!}
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('allocations.allocation.show', $allocation->id ) }}" class="btn btn-info" title="Show Batche">
                                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="{{ route('allocations.allocation.edit', $allocation->id ) }}" class="btn btn-primary" title="Edit Batche">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                                                        [
                                                            'type'    => 'submit',
                                                            'class'   => 'btn btn-danger',
                                                            'title'   => 'Delete Allocations',
                                                            'onclick' => 'return confirm("' . 'Delete Allocations?' . '")'
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
                    @endif
                </div>
                <div id="upcoming" class="tab-pane fade">
                    <h3>Upcoming </h3>
                    @if(count($upcoming) == 0)
                        <div class="panel-body text-center">
                            <h4>No Batches Available!</h4>
                        </div>
                    @else
                        <div class="panel-body panel-body-with-table">
                            <div class="table-responsive">

                                <table class="table table-striped course">
                                    <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Batch</th>
                                        <th>Total Enroll</th>
                                        <th>Class Schedule</th>
                                        <th>Resource Person</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($upcoming as $allocation)
                                        <tr>
                                            <td><a href="{{route('courses.course.show', $allocation->course_id )}}" >
                                                 @if($allocation->course)
                                              {{$allocation->course->name}}
                                              @endif
                                            </a>
                                            </td>

                                            <td>{{ $allocation->batch->name }}</td>
                                            <td> <a href="{{ route('allocations.allocation.show', $allocation->id ) }}">View Enroll({{$allocation->allocationEnroll->count()}})</a></td>
                                            <td>
                                                <dt>Class Schedule</dt>
                                                <dd>
                                                    <table class="table table-striped">
                                                        @php
                                                            $i=0;
                                                        @endphp
                                                        @foreach($allocation->day as $day)
                                                            <tr>
                                                                <td>{{$allocation->day[$i]->name}}
                                                                </td>



                                                                <td>{{$day->pivot->begin_time}} </td>
                                                                <td> {{$day->pivot->close_time}}</td>
                                                            </tr>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endforeach
                                                    </table>
                                                </dd>
                                            </td>

                                            <td>
                                                @foreach($allocation->teacher as $teacher)
                                                    <a href="{{ route('teachers.teacher.show', $teacher->id ) }}">
                                                         <span class="label label-success">
                                                         {{$teacher->name}}
                                                         </span>
                                                    </a>
                                                    <br>
                                                @endforeach

                                            </td>

                                            <td>{{ ($allocation->is_active) ? 'Yes' : 'No' }}</td>

                                            <td>

                                                {!! Form::open([
                                                    'method' =>'DELETE',
                                                    'route'  => ['allocations.allocation.destroy', $allocation->id],
                                                    'style'  => 'display: inline;',
                                                ]) !!}
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('allocations.allocation.show', $allocation->id ) }}" class="btn btn-info" title="Show Batche">
                                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="{{ route('allocations.allocation.edit', $allocation->id ) }}" class="btn btn-primary" title="Edit Batche">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                                                        [
                                                            'type'    => 'submit',
                                                            'class'   => 'btn btn-danger',
                                                            'title'   => 'Delete Allocations',
                                                            'onclick' => 'return confirm("' . 'Delete Allocations?' . '")'
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
                    @endif
                </div>
                <div id="completed" class="tab-pane fade">
                    <h3>Completed</h3>
                    @if(count($completed) == 0)
                        <div class="panel-body text-center">
                            <h4>No Batches Available!</h4>
                        </div>
                    @else
                        <div class="panel-body panel-body-with-table">
                            <div class="table-responsive">

                                <table class="table table-striped course">
                                    <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Batch</th>
                                        <th>Total Enroll</th>
                                        <th>Class Schedule</th>
                                        <th>Resource Person</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($completed as $allocation)
                                        <tr>
                                            <td><a href="{{route('courses.course.show', $allocation->course_id )}}" >
                                                 @if($allocation->course)
                                              {{$allocation->course->name}}
                                              @endif
                                            </a>
                                            </td>

                                            <td>{{ $allocation->batch->name }}</td>
                                            <td> <a href="{{ route('allocations.allocation.show', $allocation->id ) }}">View Enroll({{$allocation->allocationEnroll->count()}})</a></td>
                                            <td>
                                                <dt>Class Schedule</dt>
                                                <dd>
                                                    <table class="table table-striped">
                                                        @php
                                                            $i=0;
                                                        @endphp
                                                        @foreach($allocation->day as $day)
                                                            <tr>
                                                                <td>{{$allocation->day[$i]->name}}
                                                                </td>



                                                                <td>{{$day->pivot->begin_time}} </td>
                                                                <td> {{$day->pivot->close_time}}</td>
                                                            </tr>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endforeach
                                                    </table>
                                                </dd>
                                            </td>

                                            <td>
                                                @foreach($allocation->teacher as $teacher)
                                                    <a href="{{ route('teachers.teacher.show', $teacher->id ) }}">
                                                         <span class="label label-success">
                                                         {{$teacher->name}}
                                                         </span>
                                                    </a>
                                                    <br>
                                                @endforeach

                                            </td>

                                            <td>{{ ($allocation->is_active) ? 'Yes' : 'No' }}</td>

                                            <td>

                                                {!! Form::open([
                                                    'method' =>'DELETE',
                                                    'route'  => ['allocations.allocation.destroy', $allocation->id],
                                                    'style'  => 'display: inline;',
                                                ]) !!}
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('allocations.allocation.show', $allocation->id ) }}" class="btn btn-info" title="Show Batche">
                                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="{{ route('allocations.allocation.edit', $allocation->id ) }}" class="btn btn-primary" title="Edit Batche">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                                                        [
                                                            'type'    => 'submit',
                                                            'class'   => 'btn btn-danger',
                                                            'title'   => 'Delete Allocations',
                                                            'onclick' => 'return confirm("' . 'Delete Allocations?' . '")'
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
                    @endif
                </div>
            </div>

    </div>


@endsection

@push('style')

@endpush

@push('script')

@endpush