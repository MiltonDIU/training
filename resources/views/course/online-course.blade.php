@extends('layouts.app')

@section('content')
<div class="container">
            <div class="row col-container">
                <div class="col-md-12 col-sm-12"  style="text-align: center">
<br/>
                    <img src="{{url('img/logo.png')}}" align="center" alt="Training.SKill.Jobs"/>
                    <br/>
                    <br/>
                    <h3>Skill Jobs Online Live Training</h3>
                <p style="text-align: left">Once online education/class was out of thinking but it’s now worldwide reality. The learning centers of maximum countries are now taking online classes including exams except some critical zones of this Pandemic coronavirus. Skill Jobs as a company of Daffodil Family has already ensured 100% standard of Online-Learning System and quality Education. Participants can join from anywhere of the world through our created accounts.</p>
                </div>

                <div class="col-md-12 col-sm-12">
                    <h3>Online Live Class Benefits:</h3>
                    <br/>
                    {!! Config::getSettingInfo()->benefit !!}
                </div>


                <div class="col-md-12 col-sm-12">
                    <br>
                    <br>


                    <table class="table table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Courses</th>
            <th>Offline Price</th>
            <th>Online Price</th>
            <th>Hours</th>
            <th>Call for Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allocations as $key=> $allocation)
            <tr>
                <td>{{$key+1}}</td>
                <td>

                    <a href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}"--}}
                       title="{{$allocation->course->name}}">
                        {{$allocation->course->name}}
                    </a>
                </td>
                <td> {{$allocation->fees}}     </td>
                <td> {{$allocation->online_fees}}</td>
                <td> {{$allocation->total_hour}}</td>
                <td> {{$allocation->contact_person}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    Join our Online Live Classes an enjoy 70% – 90% discounts…
<br>
    Success depends on the proper use of time…. Stay Home and Develop Skills
                    <br>
                    <br>
                    <br>
                    <br>
</div>



{{--                    <div class="col-md-4 col">--}}
{{--                        <div class="card">--}}
{{--                            <a href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}"--}}
{{--                               title="{{$allocation->course->name}}">--}}
{{--                                <img class="card-img-top"--}}
{{--                                     src="{{ asset('assets/uploads/course/banner/'.$allocation->course->banner)}}"--}}
{{--                                     alt="{{$allocation->course->name}}"></a>--}}
{{--                            <div class="card-body">--}}

{{--                                <h5 class="card-title"><a--}}
{{--                                            href="{{route('courses.show',['id'=>$allocation->id,'slug'=>$allocation->course->slug])}}"--}}
{{--                                            title="{{$allocation->course->name}}">{{$allocation->course->name}}--}}

{{--                                        @if($allocation->batch_is_show==1)--}}
{{--                                            ({{$allocation->batch->name}})--}}
{{--                                        @endif--}}

{{--                                    </a></h5>--}}

{{--                                <p><i class="far fa-clock"></i> Total Hours: {{$allocation->total_hour}}</p>--}}


{{--                            </div>--}}


{{--                        </div>--}}
{{--                    </div>--}}

            </div>


</div>
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