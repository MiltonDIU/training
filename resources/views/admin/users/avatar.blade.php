@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        @if(Session::has('success_message'))
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>
                {!! session('success_message') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif
        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($user->name) ? $user->name : 'User' }}</h4>
        </div>

        <div class="pull-right">
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ url('admin/profile/password') }}" class="btn btn-primary" title="Change Password">
                       Password Change
                    </a>
                    <a href="{{ url('admin/profile/avatar') }}" class="btn btn-success" title="Change Password">
                        Profile Picture Change
                    </a>
                </div>
        </div>

    </div>

    <div class="panel-body">
        {!! Form::open([
                'route' => 'dashboard.user.avatarUpdate',
                'class' => 'form-horizontal',
                'files'=>true
                ])
            !!}
        <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('New Picture') }}</label>

            <div class="col-md-4 avatar">
                <input id="avatar" type="file" class="form-control {{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" required>

                @if ($errors->has('avatar'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}

    </div>
</div>

@endsection