
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Resource person',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '191', 'required' => true, 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
    {!! Form::label('avatar','Avatar',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::file('avatar',null, ['class' => 'form-control' ]) !!}
        {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email','Email',['class' => 'col-md-2 control-label ']) !!}
    <div class="col-md-10">
        {!! Form::text('email',null, ['class' => 'form-control', 'maxlength' => '191', 'placeholder' => 'Enter email here...', ]) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
    {!! Form::label('mobile','Mobile',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('mobile',null, ['class' => 'form-control', 'maxlength' => '191', 'placeholder' => 'Enter mobile here...', ]) !!}
        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
    {!! Form::label('website','Website',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('website',null, ['class' => 'form-control', 'maxlength' => '191', 'placeholder' => 'Enter website here...', ]) !!}
        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    {!! Form::label('is_active','Is Active',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox">
            <label for='is_active_1'>
                {!! Form::checkbox('is_active', '1',  (old('is_active', optional($teacher)->is_active) == '1' ? true : null) , ['id' => 'is_active_1', 'class' => '', ]) !!}
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('detail') ? 'has-error' : '' }}">
    {!! Form::label('detail','Detail',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('detail',null, ['class' => 'form-control', 'maxlength' => '2147483647', ]) !!}
        {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@include('layouts.partials.form_script')
@push('script')
    <script src="{{url('assets/AdminLTE/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('detail')
        })
    </script>
@endpush