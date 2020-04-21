@extends('layouts.app')

@section('content')
    <section id="course">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="display-4">{{$program->name}}</h1>
                        <h4>TK : {{($program->fees==null)?"free":$program->fees}}</h4>

                        <p class="card-text"><i class="far fa-calendar-alt"></i> Start
                            Date: {{$program->begin_date}}</p>
                        <p class="card-text"><i class="far fa-calendar-alt"></i> End Date: {{$program->close_date}}
                        </p>

                        @foreach($program->day as $schedule)
                            <p class="card-text">{{$schedule->name}} : {{$schedule->pivot->begin_time}} -
                                {{$schedule->pivot->close_time}}</p>
                        @endforeach

                            <p class="card-text">
                                <a href="{{route('program.enroll.form',['id'=>$program->id,'slug'=>$program->slug])}}" class="btn btn-primary">
                                    Enroll Now
                                </a>
                            </p>

                        <br>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">

                        <img class="card-img-top" src="{{ asset('assets/uploads/program/banner/'.$program->banner) }}"
                             alt="{{$program->name}}">

                        <div class="card-body">
                            <h3>
                                Summary:
                            </h3>

<p>
    {!! $program->summary !!}
</p>
                            <h3>Details of program</h3>
                            <p>
                                {!! $program->details !!}
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="card text-center mb-3">
                        @foreach($program->teacher as $teacher)
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
                        @if($program->venue->banner!=null)
                        <img class="card-img-top" src="{{ asset('assets/uploads/banner/'.$program->venue->banner) }}"
                             alt="{{$program->venue->name}}">
                        @endif
                        <address>
                            <p>{{$program->venue->name}}</p>
                            <hr>
                            {{$program->venue->address}}
                        </address>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
