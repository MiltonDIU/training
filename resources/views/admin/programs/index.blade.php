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
                <h4 class="mt-5 mb-5">Programs</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('programs.program.create') }}" class="btn btn-success" title="Create New Program">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

        </div>
        
        @if(count($programs) == 0)
            <div class="panel-body text-center">
                <h4>No Programs Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Venue</th>
                            <th>Category</th>
                            <th>Program Type</th>
                            <th>Program Date</th>
                            <th>Enrollment</th>
                            <th>Banner</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($programs as $program)
                        <tr>
                            <td>{{ $program->name }}</td>
                            <td>{{ optional($program->venue)->name }}</td>
                            <td>{{ optional($program->category)->name }}</td>
                            <td>{{ optional($program->programType)->name }}</td>
                            <td>{{ $program->begin_date}}</td>
                            <td>

                                @if($program->programEnroll->count()>0)
                                    <a href="{{ route('programs.program.enroll',['id'=>$program->id,'course'=>$program->slug])}}">
                                        List of Enrollment({{$program->programEnroll->count()}})</a>
                                @else
                                    0
                                @endif


                            </td>
                            <td><img width="120" src="{{url('assets/uploads/program/banner/'.$program->banner)}}" alt="{{$program->name}}">

                            </td>

                            <td>

                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route'  => ['programs.program.destroy', $program->id],
                                    'style'  => 'display: inline;',
                                ]) !!}
                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('programs.program.show', $program->id ) }}" class="btn btn-info" title="Show Program">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
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