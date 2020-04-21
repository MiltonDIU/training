@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($permissionCategory->name) ? $permissionCategory->name : 'Permission Category' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('permission_categories.permission_category.index') }}" class="btn btn-primary" title="Show All Permission Category">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('permission_categories.permission_category.create') }}" class="btn btn-primary" title="Create New Permission Category">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">



            {!! Form::model($permissionCategory, [
                'method' => 'PUT',
                'route' => ['permission_categories.permission_category.update', $permissionCategory->id],
                'class' => 'form-horizontal',
                'name' => 'edit_permission_category_form',
                'id' => 'edit_permission_category_form',
                
            ]) !!}

            @include ('admin.permission_categories.form', ['permissionCategory' => $permissionCategory,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection