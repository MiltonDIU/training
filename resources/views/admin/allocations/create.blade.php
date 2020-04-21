@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <div class="pull-left">
                <h4 class="mt-5 mb-5">Create New </h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('allocations.allocation.index') }}" class="btn btn-primary" title="Show All Batches">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

            </div>

        </div>

        <div class="panel-body">


            {!! Form::open([
                'route' => 'allocations.allocation.store',
                'class' => 'form-horizontal',
                'name' => 'allocations',
                'id' => 'allocations',
                
                ])
            !!}

            @include ('admin.allocations.form', ['allocation' => null,])
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection


