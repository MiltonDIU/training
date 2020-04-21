@if($allocation==null)
    <div class="form-group {{ $errors->has('course_id') ? 'has-error' : '' }}">
        {!! Form::label('course_id','Course',['class' => 'col-md-2 control-label required-field']) !!}
        <div class="col-md-10">
            {!! Form::select('course_id',$courses,null, ['class' => 'form-control', 'required' => true]) !!}
            {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('batch_id') ? 'has-error' : '' }}">
        {!! Form::label('batch_id','Batches',['class' => 'col-md-2 control-label required-field']) !!}
        <div class="col-md-10">
            {!! Form::select('batch_id',$batch,null, ['class' => 'form-control', 'required' => true]) !!}
            {!! $errors->first('batch_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    @endif
<div class="form-group {{ $errors->has('batch_is_show') ? 'has-error' : '' }}">
    {!! Form::label('batch_is_show','Batch is View in Public',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox">
            <label for='batch_is_show'>
                {!! Form::checkbox('batch_is_show', '1',  (old('batch_is_show', optional($allocation)->batch_is_show) == '1' ? true : null) , ['id' => 'batch_is_show', 'class' => '',optional($allocation)->batch_is_show == '1' ? 'checked' : null, ]) !!}
                Yes
            </label>
        </div>
        {!! $errors->first('is_schedule', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('venue_id') ? 'has-error' : '' }}">
    {!! Form::label('venue_id','Venue',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::select('venue_id',$venues,null, ['class' => 'form-control', 'required' => true]) !!}
        {!! $errors->first('venue_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : '' }}">
    {!! Form::label('teacher_id','Resource Person',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::select('teacher_id[]',$teachers,isset($selected_teachers)?$selected_teachers:null, ['class' => 'form-control teachers', 'required' => true,'multiple'=>true]) !!}
        {!! $errors->first('teacher_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('last_date') ? 'has-error' : '' }}">
    {!! Form::label('last_date','Last Date',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::date('last_date',null, ['class' => 'form-control', 'maxlength' => '191', 'placeholder' => 'Enter last date here...', 'min'=> ($allocation==null)?date('Y-m-d'):""]) !!}
        {!! $errors->first('last_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('course_start_date') ? 'has-error' : '' }}">
    {!! Form::label('course_start_date','Start Date',['class' => 'col-md-2 control-label  required-field']) !!}
    <div class="col-md-10">
        {!! Form::date('course_start_date',null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter start date here...', ]) !!}
        {!! $errors->first('course_start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('course_end_date') ? 'has-error' : '' }}">
    {!! Form::label('course_end_date','End Date',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::date('course_end_date',null, ['class' => 'form-control', 'placeholder' => 'Enter end date here...', ]) !!}
        {!! $errors->first('course_end_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total_hour') ? 'has-error' : '' }}">
    {!! Form::label('total_hour','Total Hour',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('total_hour',null, ['class' => 'form-control', 'placeholder' => 'Enter total hour here...', ]) !!}
        {!! $errors->first('total_hour', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total_class') ? 'has-error' : '' }}">
    {!! Form::label('total_class','Total Class',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('total_class',null, ['class' => 'form-control', 'min' => '0', 'max' => '191', 'placeholder' => 'Enter total class here...', ]) !!}
        {!! $errors->first('total_class', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fees') ? 'has-error' : '' }}">
    {!! Form::label('fees','Fees',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::number('fees',null, ['class' => 'form-control', 'min' => '-999999', 'max' => '999999', 'placeholder' => 'Enter fees here...','step' => "any", ]) !!}
        {!! $errors->first('fees', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discount_fees') ? 'has-error' : '' }}">
    {!! Form::label('discount_fees','Discount Fees',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::number('discount_fees',null, ['class' => 'form-control', 'min' => '-999999', 'max' => '999999', 'placeholder' => 'Enter discount fees here...','step' => "any", ]) !!}
        {!! $errors->first('discount_fees', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('class_schedule','Class Schedule',['class' => 'col-md-2 control-label  required-field']) !!}
    <div class="col-md-9">
        <div class="row" id="field">
            @php
                $i=0;
            @endphp
            @if(isset($selected_days))
                @foreach($allocation->day as $day)
                    @if($i==0)
                        @include('admin.courses.schedule')
                    @else
                        <div id="field{{$i}}" class="old-field">
                            <div class="col-md-4 {{ $errors->has('day_id') ? 'has-error' : '' }}">
                                {!! Form::select('day_id[]',$days,isset($day->pivot->day_id)?$day->pivot->day_id:null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Day', ]) !!}
                                {!! $errors->first('day_id[]', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 {{ $errors->has('begin_time') ? 'has-error' : '' }}">
                                {!! Form::text('begin_time[]',isset($day->pivot->begin_time)?$day->pivot->begin_time:null, ['class' => 'form-control', 'placeholder' => '9:30 AM', 'required' => true]) !!}

                                {!! $errors->first('begin_time[]', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-3 {{ $errors->has('close_time') ? 'has-error' : '' }}">
                                {!! Form::text('close_time[]',isset($day->pivot->close_time)?$day->pivot->close_time:null, ['class' => 'form-control', 'placeholder' => '12:30 PM', 'required' => true]) !!}
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

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    {!! Form::label('is_active','Is Active',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox">
            <label for='is_active_1'>

                {!! Form::radio('is_active', '0',  (old('is_active', optional($allocation)->is_active) == '0' ? true : null) , ['id' => 'is_active_1', 'class' => '', ]) !!}
                No
                &nbsp;
                &nbsp;

                {!! Form::radio('is_active', '1',  (old('is_active', optional($allocation)->is_active) == '1' ? true : null) , ['id' => 'is_active_1', 'class' => '', ]) !!}
                Running
                &nbsp;
                &nbsp;
                {!! Form::radio('is_active', '2',  (old('is_active', optional($allocation)->is_active) == '2' ? true : null) , ['id' => 'is_active_1', 'class' => '', ]) !!}
                Upcoming
                &nbsp;
                &nbsp;
                {!! Form::radio('is_active', '3',  (old('is_active', optional($allocation)->is_active) == '3' ? true : null) , ['id' => 'is_active_1', 'class' => '', ]) !!}
                Completed
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_schedule') ? 'has-error' : '' }}">
    {!! Form::label('is_schedule','Class schedule open',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox">
            <label for='is_active_1'>
                {!! Form::checkbox('is_schedule', '1',  (old('is_schedule', optional($allocation)->is_schedule) == '1' ? true : null) , ['id' => 'is_schedule', 'class' => '', ]) !!}
                Yes
            </label>
        </div>

        {!! $errors->first('is_schedule', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@include('layouts.partials.form_script')
@push('script')
    <script src="{{url('assets/AdminLTE/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('detail')
        })
        $(document).ready(function () {
            //@naresh action dynamic childs
            var next = 0;
            $("#add-more").click(function(e){
                e.preventDefault();
                var addto = "#field" + next;
                var addRemove = "#field" + (next);
                next = next + 1;
                var newIn = ' <div class="new-field" id="field'+ next +'" name="field'+ next +'">' +
                    '<div class="col-md-4"> {!! Form::select('day_id[]',$days,null, ['class' => 'form-control select2','required' => true, 'placeholder' => 'Select Day','required' => true ]) !!} </div><div class="col-md-3">{!! Form::text('begin_time[]',null, ['class' => 'form-control', 'placeholder' => 'start time','required' => true]) !!}</div><div class="col-md-3">{!! Form::text('close_time[]',null, ['class' => 'form-control', 'placeholder' => 'start time','required' => true ]) !!}</div></div>';
                var newInput = $(newIn);
                var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
                var removeButton = $(removeBtn);
                $(addto).after(newInput);
                $(addRemove).after(removeButton);
                $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next);

                $('.remove-me').click(function(e){
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length-1);
                    var fieldID = "#field" + fieldNum;
                    $(this).remove();
                    $(fieldID).remove();
                });
            });

        });

        $('.teachers').select2({
            placeholder: "Select resource person",
            allowClear: true
        });
        $('#venue_id').select2({
            placeholder: "Select Venues",
            allowClear: true
        });
        $('#course_id').select2({
            placeholder: "Select Course",
            allowClear: true
        });
        $('#batch_id').select2({
            placeholder: "Select Batch",
            allowClear: true
        });


        $(document).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent().remove();
        })
        $( document ).ready( function () {
            $( "#allocations" ).validate( {
                rules: {
                    "teacher_id[]": "required",
                    "day_id[]": "required",
                    "begin_time[]": "required",
                    "close_time[]": "required",

                    venue_id:{
                        required: true,
                    },
                    course_id:{
                        required: true,
                    },
                    batch_id:{
                        required: true,
                    },

                    last_date:{
                        required: true,
                    },

                    course_start_date:{
                        required: true,
                    }

                },
                messages: {
                    course_id: {
                        required: "Please select a Course",
                    },
                    course_start_date: {
                        required: "Please enter batch start date",
                    },
                    last_date: {
                        required: "Please enter batch apply last date",
                    },
                    venue_id: {
                        required: "Please select a Venue",
                    },
                    teacher_id: {
                        required: "Please select minimum one Teacher",
                    },
                    day_id: {
                        required: "Please select day",
                    },
                    banner: {
                        required: "Please enter banner image, maximum size on 3MB",
                        extension: "Please enter a value with a valid extension. support only jpg,png,jpeg"
                    },
                    begin_time: {
                        required: "Please enter a class start time",
                    },
                    close_time: {
                        required: "Please enter a class end time",
                    },
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents( ".col-sm-5" ).addClass( "has-feedback" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }

                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if ( !element.next( "span" )[ 0 ] ) {
                        $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
                    }
                },
                success: function ( label, element ) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if ( !$( element ).next( "span" )[ 0 ] ) {
                        $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                }
            } );
        } );

    </script>

    <style>
        .new-field{margin: 10px 0px}
    </style>
@endpush