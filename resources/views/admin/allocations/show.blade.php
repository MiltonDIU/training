@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <div class="pull-right">

                {!! Form::open([
                    'method' =>'DELETE',
                    'route'  => ['allocations.allocation.destroy', $allocation->id]
                ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('allocations.allocation.index') }}" class="btn btn-primary"
                       title="Show All Assign Course">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('allocations.allocation.create') }}" class="btn btn-success"
                       title="Create New Assign Course">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('allocations.allocation.edit', $allocation->id ) }}" class="btn btn-primary"
                       title="Edit Assign Course">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Assign Course',
                            'onclick' => 'return confirm("' . 'Delete Assign Course?' . '")'
                        ])
                    !!}
                </div>
                {!! Form::close() !!}

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>View Syllabus</dt>
                <dd>
                    <a href="{{route('courses.course.show', $allocation->course_id )}}">{{ $allocation->course->name }}</a>
                </dd>
                <dt>Batch</dt>
                <dd>{{ $allocation->batch->name }}</dd>


                <dt>Venue</dt>
                <dd>{{ $allocation->venue->name }}</dd>

                <dt>Apply last date</dt>
                <dd>{{ $allocation->last_date }}</dd>
                <dt>Batch start date</dt>
                <dd>{{ $allocation->course_start_date }}</dd>
                <dt>Batch end date</dt>
                <dd>{{ $allocation->course_end_date }}</dd>
                <dt>Total ours</dt>
                <dd>{{ $allocation->total_hour }}</dd>
                <dt>Total Class</dt>
                <dd>{{ $allocation->total_class }}</dd>

                <dt>fees</dt>
                <dd>{{ $allocation->fees }}</dd>
                <dt>Discount</dt>
                <dd>{{ $allocation->discount_fees}}</dd>
                <dt>Teachers</dt>
                <dd>
                    @foreach($allocation->teacher as $teacher)
                        <a href="{{ route('teachers.teacher.show', $teacher->id ) }}">
                                                         <span class="label label-success">
                                                         {{$teacher->name}}
                                                         </span>
                        </a>
                        <br>
                    @endforeach
                </dd>
                <br>
                <br>
                <dt>Class Schedule</dt>
                <dd>
                    <table class="table table-striped">
                        @php
                            $i=0;
                        @endphp
                        @foreach($allocation->day as $day)
                            <tr>
                                <td>{{$allocation->day[$i]->name}}</td>
                                <td>{{$day->pivot->begin_time}} </td>
                                <td> {{$day->pivot->close_time}}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </table>
                </dd>

                <dt>Is Active</dt>
                <dd>{{ ($allocation->is_active) ? 'Yes' : 'No' }}</dd>
                <br>
                <br>
                <strong>Enrollment List</strong>

                <table id="enroll" class="table table-responsive">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Education</th>
                    <th>Address</th>
                    <th>Apply Date</th>
                    <th>Remark</th>
                    </thead>
                    <tbody>
                    @if(isset($allocation->allocationEnroll))
                        @foreach($allocation->allocationEnroll as $enroll)
                        <tr>
                            <td>{{$enroll->name}}</td>
                            <td>{{$enroll->email}}</td>
                            <td>{{$enroll->mobile}}</td>
                            <td>{!! $enroll->education !!}</td>
                            <td>{!! $enroll->address !!}</td>
                             <td>{!! $enroll->created_at->format('d M Y, h:i A') !!}</td>
                            <td>{!! $enroll->remark !!}</td>

                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Not Found</td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </dl>

        </div>
    </div>

@endsection

@push('style')

    <link rel="stylesheet" type="text/css" href="{{url('assets/datatable/css/material.min.css')}}"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>
<style>
    div.dt-buttons{
        float: right;}
    #enroll_filter{float: right; margin-right: 30px}
</style>
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="{{url('assets/datatable/js/dataTables.material.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>



    <script>
        $(document).ready(function() {
            $('#enroll').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
            });
        } );
    </script>

@endpush