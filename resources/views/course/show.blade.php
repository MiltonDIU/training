@extends('layouts.app')

@section('facebook-url', route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug]))
@section('facebook-title',$allocation->course->name .' '. $allocation->batch->name)
@section('facebook-description', $allocation->course->name .' '. $allocation->batch->name)
@section('facebook-image', asset('assets/uploads/course/banner/'.$allocation->course->banner))
@section('facebook-image-alt',$allocation->course->name .' '.$allocation->batch->name)


@section('twitter-title', $allocation->course->name . $allocation->batch->name)
@section('twitter-description', $allocation->course->name .' '. $allocation->batch->name)
@section('twitter-image', asset('assets/uploads/course/banner/'.$allocation->course->banner))
@section('twitter-image-alt', $allocation->course->name .' '. $allocation->batch->name)
@section('twitter-card', $allocation->course->name .' '. $allocation->batch->name)

@section('content')

    <section id="course-detail">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8 pt-5 pb-5">

                    <img class="card-img-top"
                         src="{{ asset('assets/uploads/course/banner/'.$allocation->course->banner) }}"
                         alt="{{$allocation->course->name}}">


                    <div class="row">

                        <div class="col col-md-3">
                            @foreach($allocation->teacher as $teacher)

                                <img class="rounded-circle img-fluid p-4 "
                                     src="{{ asset('assets/uploads/avatar/'.$teacher->avatar) }}"
                                     alt="{{$teacher->name}}">
                                <h4 class="text-center">{{$teacher->name}}</h4>

                                    <a style="margin-left: 26px" class="btn btn-primary" href="{{url('rp/'.$teacher->id.'/'.str_slug($teacher->name))}}">View Profile</a>
                            @endforeach
                        </div>
                        <div class="col col-md-9">

                            <h1 class="pt-4 font-weight-bold" style="text-align: left">{{$allocation->course->name}} 
                               @if($allocation->batch_is_show==1)
                                            ({{$allocation->batch->name}})
                                        @endif
                         
                            </h1>
                            <h2 class="font-weight-bold">
                                @if($allocation->discount_fees>0)
                                    <strike style="color: red">TK {{$allocation->fees}}</strike>
                                    TK {!! ($allocation->fees-$allocation->discount_fees) !!}
                                @else
                                    TK {{$allocation->fees}}
                                @endif
                            </h2>
                            <p class="lead">
                                <i class="far fa-calendar-alt"></i> <strong>Start Date
                                    : </strong> {{$allocation->course_start_date}} &nbsp<br>

                                @if($allocation->course_end_date)
                                    <i class="far fa-calendar-alt"></i>
                                    <strong>End Date : </strong> {{$allocation->course_end_date}}
                                @endif</p>


                            <p class="lead"><i class="far fa-clock"></i> <strong>Total Class
                                    : </strong> {{$allocation->total_class}} &nbsp; <i class="far fa-clock"></i>
                                <strong>Total
                                    Hours: </strong> {{$allocation->total_hour}}</p>

                            <p class="lead">
                                <i class="fas fa-map-marker-alt"></i> Location
                                : {{$allocation->venue->name}} {{$allocation->venue->address}}
                            </p>


                            @if($allocation->is_schedule==1)
                                @foreach($allocation->day as $schedule)
                                    <p class="lead"><strong>{{$schedule->name}}</strong>
                                        : {{$schedule->pivot->begin_time}}
                                        - {{$schedule->pivot->close_time}}</p>
                                @endforeach

                            @endif


                             <a href="{{route('enroll.form',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}"
                               class="btn btn-primary apply-now">
                               Registration Now
                            </a>
                        </div>

                    </div>
                    @if($allocation->course->summary)
                        <br>
                        <div class="card">
                            <div class="card-body">
                                {!! $allocation->course->summary !!}
                            </div>
                        </div>
                    @endif


                    <h3 class="font-weight-bold pt-3 pb-3">Course Content</h3>

                    <div class="card">
                        <div class="card-body">

                            {!! $allocation->course->detail !!}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


@endsection
<style>
    #course-header {
        background-color: #03A9F4;
    }

    h1 {
        text-align: center;
        font-family: Tahoma, Arial, sans-serif;
        color: #06D85F;
        margin: 80px 0;
    }


    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
    }
    .overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .popup {
        margin: 70px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        width: 30%;
        position: relative;
        transition: all 5s ease-in-out;
    }

    .popup h2 {
        margin-top: 0;
        color: #333;
        font-family: Tahoma, Arial, sans-serif;
    }
    .popup .close {
        position: absolute;
        top: 20px;
        right: 30px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
    }
    .popup .close:hover {
        color: #06D85F;
    }
    .popup .content {
        max-height: 30%;
        overflow: auto;
    }

    @media screen and (max-width: 700px){
        .box{
            width: 70%;
        }
        .popup{
            width: 70%;
        }
    }
      .card-body p{text-align: justify;}
      .apply-now {
    background: red !important;
    width: 55%;
    margin-left: 20%;
    font-size: 25px !important;
    margin-top: 20px;

}
</style>