@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($setting->title) ? $setting->title : 'Setting' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['settings.setting.destroy', $setting->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('settings.setting.index') }}" class="btn btn-primary" title="{{ trans('settings.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('settings.setting.create') }}" class="btn btn-success" title="{{ trans('settings.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('settings.setting.edit', $setting->id ) }}" class="btn btn-primary" title="{{ trans('settings.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => trans('settings.delete'),
                            'onclick' => 'return confirm("' . trans('settings.confirm_delete') . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('settings.title') }}</dt>
            <dd>{{ $setting->title }}</dd>
            <dt>{{ trans('settings.meta') }}</dt>
            <dd>{{ $setting->meta }}</dd>
            <dt>{{ trans('settings.keyword') }}</dt>
            <dd>{{ $setting->keyword }}</dd>
            <dt>{{ trans('settings.mobile') }}</dt>
            <dd>{{ $setting->mobile }}</dd>
            <dt>{{ trans('settings.email') }}</dt>
            <dd>{{ $setting->email }}</dd>
            <dt>{{ trans('settings.logo') }}</dt>
            <dd>{{ $setting->logo }}</dd>
            <dt>{{ trans('settings.logo_alt') }}</dt>
            <dd>{{ $setting->logo_alt }}</dd>
            <dt>{{ trans('settings.address') }}</dt>
            <dd>{{ $setting->address }}</dd>
            <dt>{{ trans('settings.copy_right') }}</dt>
            <dd>{{ $setting->copy_right }}</dd>
            <dt>{{ trans('settings.created_at') }}</dt>
            <dd>{{ $setting->created_at }}</dd>
            <dt>{{ trans('settings.updated_at') }}</dt>
            <dd>{{ $setting->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection