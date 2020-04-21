@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Setting</h4>
            </div>
        </div>

        <div class="panel-body">


            {!! Form::model($setting, [
                'method' => 'PUT',
                'route' => ['settings.setting.update', $setting->id],
                'class' => 'form-horizontal',
                'name' => 'edit_setting_form',
                'id' => 'edit_setting_form',
                'files'=>true
                
            ]) !!}

            @include ('admin.settings.form', ['setting' => $setting,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit(trans('settings.update'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection