@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:20px">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                @if($teacher->avatar)
                                <div class="image-container">
                                    <img src="{{url('assets/uploads/avatar/'.$teacher->avatar)}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                </div>
@endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content ml-1" id="myTabContent">
                                        @if($teacher->name)
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Name</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{$teacher->name}}
                                                </div>
                                            </div>
                                            @endif
{{--

                                            @if($teacher->email)
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Email</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        {{$teacher->email}}
                                                    </div>
                                                </div>

                                            @endif


                                            @if($teacher->mobile)
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Mobile</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        {{$teacher->mobile}}
                                                    </div>
                                                </div>

                                            @endif
--}}

                                            @if($teacher->website)
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Website</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        {{$teacher->website}}
                                                    </div>
                                                </div>
                                            @endif

                                            @if($teacher->detail)
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Detail</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        {!! $teacher->detail !!}
                                                    </div>
                                                </div>
                                            @endif
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <!-- Category -->
            <div class="col-sm-4">
                @if(count($upcoming)> 0)
                <div class="single category">
                    <h3 class="side-title">Upcoming  Course</h3>
                    <ul class="list-unstyled">
                        @foreach($upcoming as $item)
                                <li><a href="{{route('courses.show',['id'=>$item->id,'slug'=>$item->course->slug])}}" title="{{$item->course->name}}">{{$item->course->name}} {{--<span class="pull-right">13</span>--}}</a></li>
                        @endforeach
                    </ul>
                </div>
@endif
                @if(count($running)> 0)
                <div class="single category">
                    <h3 class="side-title">Running  Course</h3>
                    <ul class="list-unstyled">
                        @foreach($running as $item)
                                <li><a href="{{route('courses.show',['id'=>$item->id,'slug'=>$item->course->slug])}}" title="{{$item->course->name}}">{{$item->course->name}} {{--<span class="pull-right">13</span>--}}</a></li>
                        @endforeach
                    </ul>
                </div>
@endif


        </div>
    </div>
    </div>
@endsection

@push('style')
            <style>
                .single {
                    padding: 30px 15px;
                    background: #fcfcfc;
                    border: 1px solid #f0f0f0; }
                .single h3.side-title {
                    margin: 0;
                    margin-bottom: 10px;
                    padding: 0;
                    font-size: 20px;
                    color: #333;
                    text-transform: uppercase; }
                .single h3.side-title:after {
                    content: '';
                    width: 60px;
                    height: 1px;
                    background: #ff173c;
                    display: block;
                    margin-top: 6px; }

                .single ul {
                    margin-bottom: 0; }
                .single li a {
                    color: #666;
                    font-size: 14px;
                    text-transform: capitalize;
                    border-bottom: 1px solid #f0f0f0;
                    line-height: 40px;
                    display: block;
                    text-decoration: none; }
                .single li a:hover {
                    color: #1D90CE; }
                .single li:last-child a {
                    border-bottom: 0; }
                hr{margin:0px; padding: 2px;}
                .card-body p{text-align: justify;}
            </style>
    @endpush