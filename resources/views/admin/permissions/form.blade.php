
<div class="form-group {{ $errors->has('permission_category_id') ? 'has-error' : '' }}">
    {!! Form::label('permission_category_id','Permission Category',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::select('permission_category_id',$permissionCategories,null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select permission category', ]) !!}
        {!! $errors->first('permission_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('namespace') ? 'has-error' : '' }}">
    {!! Form::label('namespace','Namespace',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('namespace',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '191', 'required' => true, 'placeholder' => 'Enter namespace here...', ]) !!}
        {!! $errors->first('namespace', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('controller') ? 'has-error' : '' }}">
    {!! Form::label('controller','Controller',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('controller',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '191', 'required' => true, 'placeholder' => 'Enter controller here...', ]) !!}
        {!! $errors->first('controller', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('method') ? 'has-error' : '' }}">
    {!! Form::label('method','Method',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::select('method',['GET' => 'GET',
'POST' => 'POST',
'PUT' => 'PUT',
'DELETE' => 'DELETE',
'PATCH' => 'PATCH'],null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter method type...', ]) !!}
        {!! $errors->first('method', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('action') ? 'has-error' : '' }}">
    {!! Form::label('action','Method Name',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('action',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '50', 'required' => true, 'placeholder' => 'Enter Method Name here...', ]) !!}
        {!! $errors->first('action', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('display') ? 'has-error' : '' }}">
    {!! Form::label('display','Method Display Name',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('display',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '50', 'required' => true, 'placeholder' => 'Method Display Name here...', ]) !!}
        {!! $errors->first('display', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('allowed') ? 'has-error' : '' }}">
    {!! Form::label('allowed','Allowed',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox">
            <label for='allowed_1'>
                {!! Form::checkbox('allowed', '1',  (old('allowed', optional($permission)->allowed) == '1' ? true : null) , ['id' => 'allowed_1', 'class' => '', ]) !!}
                Yes
            </label>
        </div>

        {!! $errors->first('allowed', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('detail') ? 'has-error' : '' }}">
    {!! Form::label('detail','Detail',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('detail', null, ['class' => 'form-control', ]) !!}
        {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@include('layouts.partials.form_script')