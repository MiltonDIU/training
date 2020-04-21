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
        {!! Form::text('close_time[]',isset($day->pivot->close_time)?$day->pivot->close_time:null, ['class' => 'form-control', 'placeholder' => 'End  time', ]) !!}
        {!! $errors->first('close_time[]', '<p class="help-block">:message</p>') !!}
    </div>
</div>