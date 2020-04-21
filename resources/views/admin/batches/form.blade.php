
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '150', 'required' => true, 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    {!! Form::label('is_active','Is Active',['class' => 'col-md-2 control-label ']) !!}
    <div class="col-md-10">
        <div class="checkbox">
            <label for='is_active_1'>
                {!! Form::checkbox('is_active', '1',  (old('is_active', optional($batches)->is_active) == '1' ? true : null) , ['id' => 'is_active_1', 'class' => '', ]) !!}
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@include('layouts.partials.form_script')
@push('script')
    <script src="{{url('assets/AdminLTE/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('details')
        })
    </script>
@endpush