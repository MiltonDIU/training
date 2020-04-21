
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '180', 'required' => true, 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    {!! Form::label('slug','Slug',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('slug',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '190', 'required' => true, 'placeholder' => 'Enter slug here...', ]) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : '' }}">
    {!! Form::label('teacher_id','Teacher',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::select('teacher_id[]',$teachers,isset($selected_teachers)?$selected_teachers:null, ['class' => 'form-control teachers', 'required' => true,'multiple'=>true]) !!}
        {!! $errors->first('teacher_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('venue_id') ? 'has-error' : '' }}">
    {!! Form::label('venue_id','Venue',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::select('venue_id',$venues,null, ['class' => 'form-control', 'placeholder' => 'Select venue', ]) !!}
        {!! $errors->first('venue_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    {!! Form::label('category_id','Category',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::select('category_id',$categories,null, ['class' => 'form-control', 'placeholder' => 'Select category', ]) !!}
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('program_type_id') ? 'has-error' : '' }}">
    {!! Form::label('program_type_id','Program Type',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::select('program_type_id',$programTypes,null, ['class' => 'form-control', 'placeholder' => 'Select program type', ]) !!}
        {!! $errors->first('program_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
    {!! Form::label('banner','Banner',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::file('banner',null, ['class' => 'form-control','accept'=>"image/*"]) !!}
        {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
    {!! Form::label('summary','Summary',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('summary', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter summary here...', ]) !!}
        {!! $errors->first('summary', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('details') ? 'has-error' : '' }}">
    {!! Form::label('details','Details',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::textarea('details', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter details here...', ]) !!}
        {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_paid') ? 'has-error' : '' }}">
    {!! Form::label('is_paid','Is Paid',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox">
            <label for='is_paid'>
                {!! Form::checkbox('is_paid', '1',  (old('is_paid', optional($program)->is_paid) == '1' ? true : null) , ['id' => 'is_paid', 'class' => '', ]) !!}
                Yes
            </label>
        </div>

        {!! $errors->first('is_paid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div id="is_fees" class="form-group {{ $errors->has('fees') ? 'has-error' : '' }}">
    {!! Form::label('fees','Fees',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::number('fees',null, ['class' => 'form-control', 'min' => '-999999', 'max' => '999999', 'placeholder' => 'Enter fees here...','step' => "any", ]) !!}
        {!! $errors->first('fees', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('begin_date') ? 'has-error' : '' }}">
    {!! Form::label('begin_date','Start Date',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::date('begin_date',null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter start date here...', ]) !!}
        {!! $errors->first('begin_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('close_date') ? 'has-error' : '' }}">
    {!! Form::label('close_date','End Date',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::date('close_date',null, ['class' => 'form-control', 'placeholder' => 'Enter end date here...', ]) !!}
        {!! $errors->first('close_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('class_schedule','Program Schedule',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-9">
        <div class="row" id="field">
            @php
                $i=0;
            @endphp
            @if(isset($selected_days))

                @foreach($program->day as $day)
                    @if($i==0)
                        @include('admin.courses.schedule')
                    @else
                        <div id="field{{$i}}" class="old-field">
                            <div class="col-md-4 {{ $errors->has('day_id') ? 'has-error' : '' }}">
                                {!! Form::select('day_id[]',$days,isset($day->pivot->day_id)?$day->pivot->day_id:null, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Select Day', ]) !!}
                                {!! $errors->first('day_id[]', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 {{ $errors->has('begin_time') ? 'has-error' : '' }}">
                                {!! Form::text('begin_time[]',isset($day->pivot->begin_time)?$day->pivot->begin_time:null, ['class' => 'form-control', 'placeholder' => 'start time', ]) !!}

                                {!! $errors->first('begin_time[]', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 {{ $errors->has('close_time') ? 'has-error' : '' }}">
                                {!! Form::text('close_time[]',isset($day->pivot->close_time)
                                ?$day->pivot->close_time:null, ['class' => 'form-control', 'placeholder' => 'End  time',
                                 ]) !!}
                                {!! $errors->first('close_time[]', '<p class="help-block">:message</p>') !!}
                            </div>
                            <a href="#" class="btn btn-danger remove_field">Remove</a>
                        </div>
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach
            @else
                @include('admin.courses.schedule')
            @endif


            <div class="col-md-1">
                <button id="add-more" name="add-more" class="btn btn-primary">More</button>
            </div>
        </div>
    </div>
</div>







<?php /*?>
<div class="form-group {{ $errors->has('day_id') ? 'has-error' : '' }}">
    {!! Form::label('class_schedule','Program Schedule',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-9">

        <div class="row" id="field">
            <div id="field0">
                <div class="col-md-4">
                    {!! Form::select('day_id[]',$days,null, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Select Day', ]) !!}
                    {!! $errors->first('day_id[]', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-3">
                    {!! Form::time('begin_time[]',null, ['class' => 'form-control', 'placeholder' => 'start time', ]) !!}

                    {!! $errors->first('begin_time[]', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-3">
                    {!! Form::time('close_time[]',null, ['class' => 'form-control', 'placeholder' => 'End  time', ]) !!}
                    {!! $errors->first('close_time[]', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="col-md-1">
                <button id="add-more" name="add-more" class="btn btn-primary">More</button>
            </div>
        </div>

    </div>



</div>

<?php */?>


<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    {!! Form::label('is_active','Is Active',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox">
            <label for='is_active_1'>
                {!! Form::checkbox('is_active', '1',  (old('is_active', optional($program)->is_active) == '1' ? true : null) , ['id' => 'is_active_1', 'class' => '', ]) !!}
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@push('style')
    <style>
        #is_fees{display: none}

         .new-field{margin: 10px 0px}
    </style>
    @endpush

@include('layouts.partials.form_script')
@push('script')
    <script src="{{url('assets/AdminLTE/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('details'),
                CKEDITOR.replace('summary')
        })
    </script>
@endpush