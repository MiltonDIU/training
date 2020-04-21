@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12">

           @if(Session::has('success_message'))
               <br>
               <br>
               <div class="alert alert-success">
                   <span class="glyphicon glyphicon-ok"></span>
                   {!! session('success_message') !!}

                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>

               </div>
           @endif
       </div>
        <div class="row col-container">
            @foreach($programs as $program)
                <div class="col-md-4 col">
                    <div class="card">

                    <img class="card-img-top" src="{{ asset('assets/uploads/program/banner/'.$program->banner) }}" alt="{{$program->name}}">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('program.show', ['program'=>$program->programType->slug,'id'=>$program->id,'slug'=>$program->slug]) }}">
                                    {{$program->name}}
                                </a>
                            </h5>
                            <p><i class="far fa-calendar-alt"></i> Start Date: {{$program->begin_date}}</p>
                            <p><i class="far fa-calendar-alt"></i> End Date:  {{$program->close_date}}</p>
                            <p><i class="fas fa-taka-sign"></i> TK: {{$program->fees?$program->fees:"free"}}</p>
                            <p><i class="fas fa-tag"></i> {{$program->programType->name}}</p>
                            <p><i class="fas fa-ticket-alt"></i> {{$program->venue->name}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('program.enroll.form',['id'=>$program->id,'slug'=>$program->slug])}}" class="btn btn-primary float-right">
                                Enroll Now
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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