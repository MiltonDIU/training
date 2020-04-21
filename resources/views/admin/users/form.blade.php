
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '100', 'required' => true, 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
    {!! Form::label('username','Username',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('username',null, ['class' => 'form-control', 'maxlength' => '50', 'placeholder' => 'Enter username here...', ]) !!}
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('identical') ? 'has-error' : '' }}">
    {!! Form::label('identical','Identical',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('identical',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '25', 'required' => true, 'placeholder' => 'Enter identical here...', ]) !!}
        {!! $errors->first('identical', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email','Email',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('email',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '50', 'required' => true, 'placeholder' => 'Enter email here...', ]) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label('password','Password',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::password('password',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '64', 'required' => true, 'placeholder' => 'Enter password here...', ]) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('role_ids') ? 'has-error' : '' }}">
    {!! Form::label('remember_token','Roles',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        @foreach($roles as $role)
            <li>
                {{ Form::checkbox('role_ids[]',$role->id,in_array($role->id, $selectedRoles),['class'=>'minimal']) }}
                <label class="custom-unchecked">{{$role->name}}</label>
            </li>


        @endforeach
        {!! $errors->first('role_ids', '<p class="help-block">:message</p>') !!}
    </div>
</div>

