@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col pt-4 pb-4">
            <h1>Workshops</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row p-5">
        @foreach($workshops as $workshop)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{ asset('assets/uploads/program/banner/'.$workshop->banner) }}" alt="{{$workshop->name}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$workshop->name}}</h5>
                        <p><i class="far fa-calendar-alt"></i> Start Date: {{$workshop->begin_date}}</p>
                        <p><i class="far fa-calendar-alt"></i> End Date:  {{$workshop->close_date}}</p>
                        <p><i class="far fa-clock"></i> Total Hours: {{$workshop->total_hour}}</p>
                        <p><i class="fas fa-dollar-sign"></i> TK {{$workshop->fees}}</p>
                        <p><i class="fas fa-tag"></i> {{$workshop->programType->name}}</p>
                        <p><i class="fas fa-ticket-alt"></i> {{$workshop->venue->name}}</p>
                    </div>

                </div>
            </div>
        @endforeach
        <div class="col-12">
            {{$workshops->links()}}
        </div>
    </div>
</div>
@endsection
