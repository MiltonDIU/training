@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 pt-5">
            <h3 class="text-center">Enrollment Form</h3>
            <div class="card">
                <div class="card-header">
                    Program: {{$program->name}}
                </div>
                <div class="card-body">
                        {!! Form::open([
                                         'route' => 'program.enroll.enrollStore',
                                         'class' => 'form-horizontal',
                                         'name' => 'enroll',
                                         'id' => 'enroll',

                                         ])
                                     !!}


                        <input type="hidden" class="form-control" name="program_id"   value="{{$program->id}}">


                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {!! Form::label('name','Name',['class' => 'col-md-2 control-label required-field']) !!}
                        <div class="col-md-10">
                            {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '100', 'required' => true, 'placeholder' => 'Enter name here...', ]) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        {!! Form::label('email','Email',['class' => 'col-md-2 control-label required-field']) !!}
                        <div class="col-md-10">
                            {!! Form::text('email',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '100', 'required' => true, 'placeholder' => 'Enter email here...', ]) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        {!! Form::label('mobile','Mobile',['class' => 'col-md-2 control-label required-field']) !!}
                        <div class="col-md-10">
                            {!! Form::text('mobile',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '15', 'required' => true, 'placeholder' => 'Enter mobile here...', ]) !!}
                            {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>


                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>



@endsection