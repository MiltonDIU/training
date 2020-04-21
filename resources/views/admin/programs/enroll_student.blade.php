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
                <h4 class="mt-5 mb-5">Course Enrolls for {{$program->name}}</h4>
            </div>

        </div>

        @if(count($programEnrolls) == 0)
            <div class="panel-body text-center">
                <h4>No Course Enrolls Available!</h4>
            </div>
        @else
            <div class="panel-body panel-body-with-table">
                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programEnrolls as $programEnroll)
                            <tr>
                                <td>{{ $programEnroll->name }}</td>
                                <td>{{ $programEnroll->email }}</td>
                                <td>{{ $programEnroll->mobile }}</td>


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
