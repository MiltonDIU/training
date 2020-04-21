@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 pt-5">
            <h3 class="text-center">Enrollment Form</h3>
            <div class="card">
                <div class="card-header">
                    Course: {{$allocation->course->name}}
                </div>
                <div class="card-body">
                        {!! Form::open([
                                         'route' => 'enrolls.enrollStore',
                                         'class' => 'form-horizontal',
                                         'name' => 'enroll',
                                         'id' => 'enroll',

                                         ])
                                     !!}


                        <input type="hidden" class="form-control" name="allocation_id"   value="{{$allocation->id}}">


                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {!! Form::label('name','Name',['class' => 'col-md-2 control-label required-field']) !!}
                        <span class="required">*</span>
                        <div class="col-md-10">
                            {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '100', 'required' => true, 'placeholder' => 'Enter name here...', ]) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        {!! Form::label('email','Email',['class' => 'col-md-2 control-label required-field']) !!}<span class="required">*</span>
                        <div class="col-md-10">
                            {!! Form::text('email',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '100', 'required' => true, 'placeholder' => 'Enter email here...', ]) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        {!! Form::label('mobile','Mobile',['class' => 'col-md-2 control-label required-field']) !!}<span class="required">*</span>
                        <div class="col-md-10">
                            {!! Form::text('mobile',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '15', 'required' => true, 'placeholder' => 'Enter mobile here...', ]) !!}
                            {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        {!! Form::label('address','Address',['class' => 'col-md-2 control-label required-field']) !!}
                        <div class="col-md-10">
                            {!! Form::textarea('address',null, ['class' => 'form-control', 'placeholder' => 'Enter address here...', ]) !!}
                            {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
  <div class="form-group {{ $errors->has('education') ? 'has-error' : '' }}">
                        {!! Form::label('education','Education',['class' => 'col-md-2 control-label required-field']) !!}
                        <div class="col-md-10">
                            {!! Form::textarea('education',null, ['class' => 'form-control', 'placeholder' => 'Enter Your Last Education here...', ]) !!}
                            {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
  <div class="form-group {{ $errors->has('remark') ? 'has-error' : '' }}">
                        {!! Form::label('remark','Remark',['class' => 'col-md-2 control-label required-field']) !!}
                        <div class="col-md-10">
                            {!! Form::textarea('remark',null, ['class' => 'form-control', 'placeholder' => 'Enter Your Remark...', ]) !!}
                            {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
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

<style>
    .help-block{color: red}
    #address{height: 100px}
    #education{height: 100px}
    #remark{height: 100px}
    .required {
        margin-left: -55px; margin-top: 5px;
        color:red;
    }
</style>