@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('settings.create') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('settings.setting.index') }}" class="btn btn-primary" title="{{ trans('settings.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

            </div>

        </div>

        <div class="panel-body">



            {!! Form::open([
                'route' => 'settings.setting.store',
                'class' => 'form-horizontal',
                'name' => 'create_setting_form',
                'id' => 'create_setting_form',
                'files'=>true
                ])
            !!}

            @include ('admin.settings.form', ['setting' => null,])
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit(trans('settings.add'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection


