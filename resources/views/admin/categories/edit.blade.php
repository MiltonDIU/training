@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($category->name) ? $category->name : 'Category' }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('categories.category.index') }}" class="btn btn-primary" title="Show All Category">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('categories.category.create') }}" class="btn btn-primary" title="Create New Category">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            {!! Form::model($category, [
                'method' => 'PUT',
                'route' => ['categories.category.update', $category->id],
                'class' => 'form-horizontal',
                'name' => 'edit_category_form',
                'id' => 'edit_category_form',
                
            ]) !!}

            @include ('admin.categories.form', ['category' => $category,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection