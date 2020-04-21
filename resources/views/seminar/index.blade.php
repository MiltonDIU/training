@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col pt-4 pb-4">
            <h1>Seminars</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach($seminars as $seminar)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{ asset('assets/uploads/program/banner/'.$seminar->banner) }}" alt="{{$seminar->name}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$seminar->name}}</h5>
                        <p><i class="far fa-calendar-alt"></i> Start Date: {{$seminar->begin_date}}</p>
                        <p><i class="far fa-calendar-alt"></i> End Date:  {{$seminar->close_date}}</p>
                        <p><i class="far fa-clock"></i> Total Hours: {{$seminar->total_hour}}</p>
                        <p><i class="fas fa-dollar-sign"></i> TK {{$seminar->fees}}</p>
                        <p><i class="fas fa-tag"></i> {{$seminar->programType->name}}</p>
                        <p><i class="fas fa-ticket-alt"></i> {{$seminar->venue->name}}</p>
                    </div>

                </div>
            </div>
        @endforeach
        <div class="col-12">
            {{$seminars->links()}}
        </div>
    </div>
</div>
@endsection
