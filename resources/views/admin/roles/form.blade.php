
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '50', 'required' => true, 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    {!! Form::label('slug','Slug',['class' => 'col-md-2 control-label required-field']) !!}
    <div class="col-md-10">
        {!! Form::text('slug',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '60', 'required' => true, 'placeholder' => 'Enter slug here...', ]) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('detail') ? 'has-error' : '' }}">
    {!! Form::label('detail','Detail',['class' => 'col-md-2 control-label ']) !!}
    <div class="col-md-10">
        {!! Form::textarea('detail', null, ['class' => 'form-control', ]) !!}
        {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('allowed','Permission Levels',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">

        <div class="acidjs-css3-treeview">
            <ul>
                <li>
                    <input type="checkbox" id="node-0" checked="checked" /><label>
                        <input type="checkbox" /><span></span></label><label for="node-0">Select All</label>

                    <ul>
                        @foreach($permissionsCategories as $permissionsCategory)
                        <li>
                            <input type="checkbox" id="node-0-{{$permissionsCategory->id}}" checked="checked" /><label><input type="checkbox" /><span></span></label><label for="node-0-{{$permissionsCategory->id}}">{{$permissionsCategory->name}}</label>
                            <ul>
                                @foreach($permissionsCategory->permission as $permission)
                                <li>
                                    <label>


{{ Form::checkbox('permission[]',$permission->id,in_array($permission->id, $selectedPermission)) }}

                                        <span></span>
                                    </label>
                                    <label class="permission-title"> {{$permission->display}}</label>

{{ Form::checkbox('permission_ids[]',$permission->id,in_array($permission->id, $selectedPermission)) }}

                                </li>
                                    @endforeach
                            </ul>
                        </li>
                       @endforeach
                    </ul>
                </li>
            </ul>
        </div>





<?php /*?>
            <div class="row">
            <div class="col-md-12">{{$permissionsCategory->name}}</div>
            <div class="col-md-12">
                <div class="checkbox">
                    @foreach($permissionsCategory->permission as $permission)
                    <label for='allowed_1'>
                        {!! Form::checkbox('permission_id', '1' , ['id' => 'permission_id', 'class' => '', ]) !!}
                    </label>
                        <span>{{$permission->display}}</span>
                    @endforeach
                </div>
            </div>
        </div>
       <?php */?>
    </div>
</div>
@push('style')

    <style>

        .acidjs-css3-treeview,
        .acidjs-css3-treeview *
        {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .acidjs-css3-treeview label[for]::before,
        .acidjs-css3-treeview label span::before
        {
            content: "\25b6";
            display: inline-block;
            margin: 2px 0 0;
            width: 13px;
            height: 13px;
            vertical-align: top;
            text-align: center;
            color: #e74c3c;
            font-size: 8px;
            line-height: 13px;
        }

        .acidjs-css3-treeview li ul
        {
            margin: 0 0 0 22px;
        }

        .acidjs-css3-treeview *
        {
            vertical-align: middle;
        }

        .acidjs-css3-treeview
        {
            font: normal 11px/16px "Segoe UI", Arial, Sans-serif;
        }

        .acidjs-css3-treeview li
        {
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .acidjs-css3-treeview input[type="checkbox"]
        {
            display: none;
        }

        .acidjs-css3-treeview label
        {
            cursor: pointer;
        }

        .acidjs-css3-treeview label[for]::before
        {
            -webkit-transform: translatex(-24px);
            -moz-transform: translatex(-24px);
            -ms-transform: translatex(-24px);
            -o-transform: translatex(-24px);
            transform: translatex(-24px);
        }

        .acidjs-css3-treeview label span::before
        {
            -webkit-transform: translatex(16px);
            -moz-transform: translatex(16px);
            -ms-transform: translatex(16px);
            -o-transform: translatex(16px);
            transform: translatex(16px);
        }

        .acidjs-css3-treeview input[type="checkbox"][id]:checked ~ label[for]::before
        {
            content: "\25bc";
        }

        .acidjs-css3-treeview input[type="checkbox"][id]:not(:checked) ~ ul
        {
            display: none;
        }

        .acidjs-css3-treeview label:not([for])
        {
            margin: 0 8px 0 0;
        }

        .acidjs-css3-treeview label span::before
        {
            content: "";
            border: solid 1px #1375b3;
            color: #1375b3;
            opacity: .50;
        }

        .acidjs-css3-treeview label input:checked + span::before
        {
            content: "\2714";
            box-shadow: 0 0 2px rgba(0, 0, 0, .25) inset;
            opacity: 1;
        }
        .permission-title{padding-left: 10px; cursor: none;
            font-weight: normal;}
    </style>
    @endpush
@push('script')

    <script>
        $(".acidjs-css3-treeview").delegate("label input:checkbox", "change", function() {
            var
                checkbox = $(this),
                nestedList = checkbox.parent().next().next(),
                selectNestedListCheckbox = nestedList.find("label:not([for]) input:checkbox");

            if(checkbox.is(":checked")) {
                return selectNestedListCheckbox.prop("checked", true);
            }
            selectNestedListCheckbox.prop("checked", false);
        });
        $(document).ready(function(){
            $("input").keyup(function(e){
                var name = $(this).val().trim().toLowerCase().replace(/\s+/g, '-');
                $('#slug').val(name);
            });
        });

        var te = document.body.className();
        console.log(te);

    </script>

@endpush