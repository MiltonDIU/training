@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col pt-4 pb-4">
            <h1>Courses:{{$category_name}}</h1>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif


        @if(count($upcoming)> 0)
            <div class="row">
                <div class="col-md-12 col-sm-12"  style="text-align: center"><h3>Upcoming Course</h3></div>
                @foreach($upcoming as $allocation)
                    <div class="col-12 col-md-4 mh-100">
                        <div class="card mb-4 shadow-sm">
                            <a href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}" title="{{$allocation->course->name}}"> <img class="card-img-top" src="{{ asset('assets/uploads/course/banner/'.$allocation->course->banner)}}" alt="{{$allocation->course->name}}"></a>
                            <div class="card-body" style="height:215px">

                                <h5 class="card-title"><a href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}" title="{{$allocation->course->name}}">{{$allocation->course->name}} 
                                
                             @if($allocation->batch_is_show==1)
                                            {{$allocation->batch->name}})
                                        @endif
                                
                                </a> </h5>
                                <p><i class="far fa-calendar-alt"></i> Registration last date: {{$allocation->last_date}}</p>
                                <p><i class="far fa-calendar-alt"></i> Class start date:  {{$allocation->course_start_date}}</p>
                                <p><i class="far fa-clock"></i> Total Hours: {{$allocation->total_hour}}</p>

                            </div>

                            <div class="card-footer">
                                <h5 class="font-weight-bold float-left p-2">
                                    @if($allocation->discount_fees>0)
                                        <strike style="color: red">TK {{$allocation->fees}}</strike> TK {!! ($allocation->fees-$allocation->discount_fees) !!}
                                    @else
                                        TK {{$allocation->fees}}
                                    @endif
                                </h5>
                                <a href="{{route('enroll.form',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}" class="btn btn-primary float-right">
                                    Enroll Now
                                </a>
                            </div>

                        </div>
                    </div>

                @endforeach
            </div>
        @endif

        @if(count($allocations)> 0)
            <div class="row">
                <div class="col-md-12 col-sm-12"  style="text-align: center"><h3>Running Course</h3></div>
        @foreach($allocations as $allocation)
            <div class="col-12 col-md-4 mh-100">

                <div class="card mb-4 shadow-sm">
                    <a href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}" title="{{$allocation->course->name}}"> <img class="card-img-top" src="{{ asset('assets/uploads/course/banner/'.$allocation->course->banner)}}" alt="{{$allocation->course->name}}"></a>
                    <div class="card-body" style="height:120px">

                        <h5 class="card-title"><a href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}" title="{{$allocation->course->name}}">{{$allocation->course->name}} 
                        @if($allocation->batch_is_show==1)
                                            {{$allocation->batch->name}})
                                        @endif
                        
                        </a> </h5>
                       {{--
                        <p><i class="far fa-calendar-alt"></i> Registration last date: {{$allocation->last_date}}</p>
                        <p><i class="far fa-calendar-alt"></i> Class start date:  {{$allocation->course_start_date}}</p>
                        --}}
                        <p><i class="far fa-clock"></i> Total Hours: {{$allocation->total_hour}}</p>

                    </div>

                    {{--<div class="card-footer">
                        <h5 class="font-weight-bold float-left p-2">
                            @if($allocation->discount_fees>0)
                                <strike style="color: red">TK {{$allocation->fees}}</strike> TK {!! ($allocation->fees-$allocation->discount_fees) !!}
                            @else
                                TK {{$allocation->fees}}
                            @endif
                        </h5>
                        <a href="{{route('enroll.form',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}" class="btn btn-primary float-right">
                            Enroll Now
                        </a>
                    </div>--}}

                </div>
            </div>
        @endforeach
            </div>
        @endif




</div>
@endsection
