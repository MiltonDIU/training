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
                <h4 class="mt-5 mb-5">Courses</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('courses.course.create') }}" class="btn btn-success" title="Create New Course">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>
        
        @if(count($courses) == 0)
            <div class="panel-body text-center">
                <h4>No Courses Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped dataTable">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Banner</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>

                            <td>{{ optional($course->category)->name }}</td>
                            <td>{{ $course->name }}</td>
                            <td><img width="160" src="{{url('assets/uploads/course/banner/'.$course->banner )}}" alt="course banner" ></td>
                            <td>

                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route'  => ['courses.course.destroy', $course->id],
                                    'style'  => 'display: inline;',
                                ]) !!}
                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('courses.course.show', $course->id ) }}" class="btn btn-info" title="Show Course">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('courses.course.edit', $course->id ) }}" class="btn btn-primary" title="Edit Course">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
{{--                                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', --}}
{{--                                            [   --}}
{{--                                                'type'    => 'submit',--}}
{{--                                                'class'   => 'btn btn-danger',--}}
{{--                                                'title'   => 'Delete Course',--}}
{{--                                                'onclick' => 'return confirm("' . 'Delete Course?' . '")'--}}
{{--                                            ])--}}
{{--                                        !!}--}}
{{--                                        {!! Form::close() !!}--}}
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
@endsection

@include('layouts.partials.datatable')