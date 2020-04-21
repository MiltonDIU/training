@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <div class="pull-left">
                <h4 class="mt-5 mb-5">Create New Program</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('programs.program.index') }}" class="btn btn-primary" title="Show All Program">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

            </div>

        </div>

        <div class="panel-body">


            {!! Form::open([
                'route' => 'programs.program.store',
                'class' => 'form-horizontal',
                'name' => 'program',
                'id' => 'program',
                'files'=>true
                
                ])
            !!}

            @include ('admin.programs.form', ['program' => null,])
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection


@push('script')

    <script>

        $(document).ready(function () {
            //@naresh action dynamic childs
            var next = 0;
            $("#add-more").click(function(e){
                e.preventDefault();
                var addto = "#field" + next;
                var addRemove = "#field" + (next);
                next = next + 1;
                var newIn = '<div class="new-field" id="field'+ next +'" name="field'+ next +'">' +
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
            placeholder: "Select Teacher",
            allowClear: true
        });
        $('#venue_id').select2({
            placeholder: "Select Venue",
            allowClear: true
        });
        $('#category_id').select2({
            placeholder: "Select Category",
            allowClear: true
        });

        $(document).ready(function () {
            if ($('#is_paid').is(':checked') == true){
                var x = document.getElementById("is_fees");
                x.style.display = "block";
            }else {
                var x = document.getElementById("is_fees");
                x.style.display = "none";
            }

        });

        $(document).ready(function() {
            $("#is_paid").click(function(e) {
                var x = document.getElementById("is_fees");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            });
        });

        $( document ).ready( function () {
            $( "#program" ).validate( {
                rules: {
                    category_id:{
                        required: true,
                    },
                    teacher_id:{
                        required: true,
                    },
                    venue_id:{
                        required: true,
                    },
                    name:{
                        required: true,
                        maxlength: 190
                    },
                    slug:{
                        required: true,
                        maxlength: 190
                    },
                    banner:{
                        required: true,
                        extension: "png|jpg|jpeg"
                    },
                    last_date:{
                        required: true,
                    },
                    day_id:{
                        required: true,
                    },
                    begin_time:{
                        required: true,
                    },
                    close_time:{
                        required: true,
                    },

                },
                messages: {
                    category_id: {
                        required: "Please select a category",
                    },
                    venue_id: {
                        required: "Please select a Venue",
                    },
                    teacher_id: {
                        required: "Please select minimum one Teacher",
                    },
                    name: {
                        required: "Please enter program title",
                        maxlenth: "Your Program title maximum consist of 190 characters"
                    },
                    slug: {
                        required: "Please enter program slug",
                        maxlenth: "Your Program slug maximum consist of 190 characters"
                    },
                    banner: {
                        required: "Please enter banner image, maximum size on 3MB",
                        extension: "Please enter a value with a valid extension. support only jpg,png,jpeg"
                    },
                    day_id: {
                        required: "Please select day",
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
    @endpush
