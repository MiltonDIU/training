@extends('layouts.app')

@section('content')
       <!--<section id="hero">
           <div id="hero-overly"></div>

       </section>

    <section id="category" class="bg-primary pt-5 pb-5 ">
        <div class="container">
            <div class="row">
                <div class="col pt-4">
                    <div class="text-center">
                        <h1 class="text-uppercase font-weight-bold text-white">Category</h1>
                        <p class="text-white-50">Choose the right course from category you like</p>
                    </div>

                </div>
            </div>
            <div class="row">
                @php
                    use App\Models\Category;$categories = Category::all();
                @endphp

                @foreach($categories as $category)

                    <div class="col col-md-4 p-3">
                        <div class="card bg-white p-4">
                            <a class="font-weight-bold text-center" href="{{route('courses.category',$category->slug)}}">
                               {{$category->name}}
                            </a>
                        </div>

                    </div>

                @endforeach

            </div>
        </div>
    </section>
    -->
    <section id="course" class="pt-5 pb-5 ">




        <div class="container">





            <div class="row ">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 class="text-uppercase font-weight-bold text-primary">Welcome to Skill Jobs Training</h1>
                        <p>Choose the right course for your bright future</p>
                        <h3>Upcoming Course</h3>
                    </div>

                </div>
            </div>

            @if(count($upcoming)> 0)


                <div class="row col-container">
                    @foreach($upcoming as $allocation)
                    <div class="col-md-4 col">
                        <div class="card">


                            <a href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}"
                               title="{{$allocation->course->name}}">
                                <img class="card-img-top"
                                     src="{{ asset('assets/uploads/course/banner/'.$allocation->course->banner)}}"
                                     alt="{{$allocation->course->name}}"></a>

                            <div class="card-body">
                                <h4 class="card-title"><a
                                            href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}"
                                            title="{{$allocation->course->name}}">{{$allocation->course->name}}

                                        @if($allocation->batch_is_show==1)
                                            ({{$allocation->batch->name}})
                                        @endif

                                    </a></h4>

                                <p><i class="far fa-calendar-alt"></i> Registration last
                                    date: {{$allocation->last_date}}</p>
                                <p><i class="far fa-calendar-alt"></i> Class start
                                    date: {{$allocation->course_start_date}}</p>

                                <p><i class="far fa-clock"></i> Total Hours: {{$allocation->total_hour}}</p>
                            </div>
                            <div  class="card-footer">
                                <h5 class="font-weight-bold float-left p-2">
                                    @if($allocation->discount_fees>0)
                                        <strike style="color: red">TK {{$allocation->fees}}</strike>
                                        TK {!! ($allocation->fees-$allocation->discount_fees) !!}
                                    @else
                                        TK {{$allocation->fees}}
                                    @endif
                                </h5>
                                <a href="{{route('enroll.form',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}"
                                   class="btn btn-primary float-right">
                                    Enroll Now
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
<br>
<br>
                @if(count($allocations)> 0)
                <div class="row col-container">
                        <div class="col-md-12 col-sm-12"  style="text-align: center"><h3>Running Course</h3></div>
                        @foreach($allocations as $allocation)
                            <div class="col-md-4 col">
                                <div class="card">
                                    <a href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}"
                                       title="{{$allocation->course->name}}">
                                        <img class="card-img-top"
                                             src="{{ asset('assets/uploads/course/banner/'.$allocation->course->banner)}}"
                                             alt="{{$allocation->course->name}}"></a>
                                    <div class="card-body">

                                        <h5 class="card-title"><a
                                                    href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}"
                                                    title="{{$allocation->course->name}}">{{$allocation->course->name}}

                                               @if($allocation->batch_is_show==1)
                                            ({{$allocation->batch->name}})
                                        @endif

                                                </a></h5>

                                        <p><i class="far fa-clock"></i> Total Hours: {{$allocation->total_hour}}</p>


                                    </div>


                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
        </div>
    </section>
@endsection

<style>
    #hero {
        position: relative;
        display: inline-block;
        overflow: hidden;
        width: 100%;
        height: auto;
        margin-bottom: -8px;
        background-image: url("{{ asset('img/banner-1.png') }}");
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 380px;
    }

    #hero-overly {
        background: linear-gradient(-135deg, rgba(2, 179, 228, 0.4), rgba(0, 0, 0, 0.8));
        opacity: 1;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        padding: 15px;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }
    .text-center{text-align: center}
    .card-img-top{height: 200px}
     .col-container {
         display: table;
         width: 100%;
     }
    .col > div{
        display: table-cell;
        height: 100%;
    }
    .card{height: 100%; float: left}
    .col-md-4{margin-bottom: 20px}
    .card-body{margin-bottom: 20px;}
    .card-footer{
        background-color:#ffffff !important;
        position: absolute;
        bottom: 0px;
        width: 100%;
        padding: 4px !important;
        height: 55px;
    }

</style>