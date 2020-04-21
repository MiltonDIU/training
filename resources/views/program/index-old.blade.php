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
        <div class="row p-5">
            @foreach($programs as $program)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="{{ asset('assets/uploads/program/banner/'.$program->banner) }}" alt="{{$program->name}}">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('program.show', ['program'=>$program->programType->slug,'id'=>$program->id,'slug'=>$program->slug]) }}">
                                    {{$program->name}}
                                </a>
                            </h5>
                            <p><i class="far fa-calendar-alt"></i> Start Date: {{$program->begin_date}}</p>
                            <p><i class="far fa-calendar-alt"></i> End Date:  {{$program->close_date}}</p>
                            <p><i class="fas fa-dollar-sign"></i> TK {{$program->fees}}</p>
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
