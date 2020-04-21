@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

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
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $user->name }}</dd>
            <dt>Username</dt>
            <dd>{{ $user->username }}</dd>
            <dt>Identical</dt>
            <dd>{{ $user->identical }}</dd>
            <dt>Email</dt>
            <dd>{{ $user->email }}</dd>
        </dl>

    </div>
</div>

@endsection