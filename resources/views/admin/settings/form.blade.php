
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('title',trans('settings.title'),['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('title',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '70', 'required' => true, 'placeholder' => trans('settings.title__placeholder'), ]) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('meta') ? 'has-error' : '' }}">
    {!! Form::label('meta',trans('settings.meta'),['class' => 'col-md-2 control-label ']) !!}
    <div class="col-md-10">
        {!! Form::text('meta',null, ['class' => 'form-control', 'maxlength' => '170', 'placeholder' => trans('settings.meta__placeholder'), ]) !!}
        {!! $errors->first('meta', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('keyword') ? 'has-error' : '' }}">
    {!! Form::label('keyword',trans('settings.keyword'),['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('keyword', null, ['class' => 'form-control', 'placeholder' => trans('settings.keyword__placeholder'), ]) !!}
        {!! $errors->first('keyword', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
    {!! Form::label('mobile',trans('settings.mobile'),['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('mobile',null, ['class' => 'form-control', 'maxlength' => '15', 'placeholder' => trans('settings.mobile__placeholder'), ]) !!}
        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email',trans('settings.email'),['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('email',null, ['class' => 'form-control', 'maxlength' => '50', 'placeholder' => trans('settings.email__placeholder'), ]) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
    {!! Form::label('logo',trans('settings.logo'),['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::file('logo',null, ['class' => 'form-control' ]) !!}
        {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('logo_alt') ? 'has-error' : '' }}">
    {!! Form::label('logo_alt',trans('settings.logo_alt'),['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('logo_alt',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '25', 'required' => true, 'placeholder' => trans('settings.logo_alt__placeholder'), ]) !!}
        {!! $errors->first('logo_alt', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    {!! Form::label('address',trans('settings.address'),['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => trans('settings.address__placeholder'), ]) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('copy_right') ? 'has-error' : '' }}">
    {!! Form::label('copy_right',trans('settings.copy_right'),['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('copy_right', null, ['class' => 'form-control', 'placeholder' => trans('settings.copy_right__placeholder'), ]) !!}
        {!! $errors->first('copy_right', '<p class="help-block">:message</p>') !!}
    </div>
</div>

