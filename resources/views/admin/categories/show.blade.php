@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($category->name) ? $category->name : 'Category' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['categories.category.destroy', $category->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('categories.category.index') }}" class="btn btn-primary" title="Show All Category">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('categories.category.create') }}" class="btn btn-success" title="Create New Category">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-primary" title="Edit Category">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Category',
                            'onclick' => 'return confirm("' . 'Delete Category?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $category->name }}</dd>
            <dt>Slug</dt>
            <dd>{{ $category->slug }}</dd>
            <dt>Description</dt>
            <dd>{!! $category->details !!}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($category->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection