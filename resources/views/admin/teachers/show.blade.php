@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($teacher->name) ? $teacher->name : 'Teacher' }}</h4>
        </div>

        <div class="pull-right">
        
            {!! Form::open([
                'method' =>'DELETE',
                'route'  => ['teachers.teacher.destroy', $teacher->id]
            ]) !!}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('teachers.teacher.index') }}" class="btn btn-primary" title="Show All Teacher">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('teachers.teacher.create') }}" class="btn btn-success" title="Create New Teacher">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('teachers.teacher.edit', $teacher->id ) }}" class="btn btn-primary" title="Edit Teacher">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                        [   
                            'type'    => 'submit',
                            'class'   => 'btn btn-danger',
                            'title'   => 'Delete Teacher',
                            'onclick' => 'return confirm("' . 'Delete Teacher?' . '")'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $teacher->name }}</dd>
            <dt>Avatar</dt>
            <dd><img width="120" src="{{url('assets/uploads/avatar/'.$teacher->avatar)}}" alt="{{$teacher->name}}"></dd>
            <dt>Detail</dt>
            <dd>{!! $teacher->detail !!}</dd>
            <dt>Email</dt>
            <dd>{{ $teacher->email }}</dd>
            <dt>Mobile</dt>
            <dd>{{ $teacher->mobile }}</dd>
            <dt>Website</dt>
            <dd>{{ $teacher->website }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($teacher->is_active) ? 'Yes' : 'No' }}</dd>


        </dl>

    </div>
</div>

@endsection