
<div class="form-group {{ $errors->has('allocation_id') ? 'has-error' : '' }}">
    {!! Form::label('allocation_id','Course',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
@php
    $courses = array();
        foreach($allocations as $key => $allocation)
        {
            $courses[$allocation->id]=$allocation->course->name.'('.$allocation->batch->name.' batch)';
        }
@endphp


        {!! Form::select('allocation_id',$courses,null, ['class' => 'form-control', 'placeholder' => 'Select course', ]) !!}
        {!! $errors->first('allocation_id', '<p class="help-block">:message</p>') !!}
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

