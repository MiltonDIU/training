@extends('layouts.app')

@section('content')
    <section id="course">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="display-4">{{$workshop->name}}</h1>
                        <h4>TK {{$workshop->fees}}</h4>

                        <p class="card-text"><i class="far fa-calendar-alt"></i> Start
                            Date: {{$workshop->course_start_date}}</p>
                        <p class="card-text"><i class="far fa-calendar-alt"></i> End Date: {{$workshop->course_end_date}}
                        </p>
                        <p class="card-text"><i class="far fa-clock"></i> Total Hours: {{$workshop->total_hour}}</p>

                        @foreach($workshop->day as $schedule)
                            <p class="card-text">{{$schedule->name}} : {{$schedule->pivot->begin_time}} -
                                {{$schedule->pivot->close_time}}</p>
                        @endforeach

                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">

                        <img class="card-img-top" src="{{ asset('assets/uploads/course/banner/'.$workshop->banner) }}"
                             alt="{{$workshop->name}}">

                        <div class="card-body">


                            {!! $workshop->detail !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="card text-center mb-3">
                        @foreach($workshop->teacher as $teacher)
                            <div class="card-body">
                                <img class="rounded-circle img-fluid "
                                     src="{{ asset('assets/uploads/avatar/'.$teacher->avatar) }}"
                                     alt="{{$teacher->name}}">
                                <h5 class="card-title">{{$teacher->name}}</h5>
                                <span class="badge badge-primary"><i class="fas fa-phone-square"></i> {{$teacher->mobile}}</span>
                                <span class="badge badge-primary"><i class="fas fa-envelope"></i> {{$teacher->email}}</span>
                                <span class="badge badge-primary">{{$teacher->website}}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="card p-4">
                        <img class="card-img-top" src="{{ asset('assets/uploads/banner/'.$workshop->venue->banner) }}"
                             alt="{{$workshop->venue->name}}">
                        <address>
                            <h4>{{$workshop->venue->name}}</h4>
                            {{$workshop->venue->address}}
                        </address>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
