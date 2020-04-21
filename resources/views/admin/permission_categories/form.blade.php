
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Permission Category Title',['class' => 'col-md-2 control-label  required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '50', 'required' => true, 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    {!! Form::label('slug','Slug',['class' => 'col-md-2 control-label  required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('slug',null, ['class' => 'form-control', 'maxlength' => '50', 'placeholder' => 'Enter slug here...', ]) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('detail') ? 'has-error' : '' }}">
    {!! Form::label('detail','Detail',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('detail', null, ['class' => 'form-control', ]) !!}
        {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    {!! Form::label('is_active','Is Active',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('is_active',['1' => 'Yes',
'0' => 'No'],null, ['class' => 'form-control', ]) !!}
        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@include('layouts.partials.form_script')