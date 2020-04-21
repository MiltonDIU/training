
<div class="form-group {{ $errors->has('program_id') ? 'has-error' : '' }}">
    {!! Form::label('program_id','Program',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::select('program_id',$programs,null, ['class' => 'select2 form-control ', 'placeholder' => 'Select Program', ]) !!}
        {!! $errors->first('program_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

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

@include('layouts.partials.form_script')
