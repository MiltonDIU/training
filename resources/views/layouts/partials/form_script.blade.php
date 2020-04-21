<!-- /.box -->
@push('page_style')
    <link href="{{url('assets/AdminLTE/plugins/iCheck/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/AdminLTE/bower_components/select2/dist/css/select2.min.css')}}">
    <style>
        .required-field::after {
            content: "*";
            color: red;
        }
    </style>
@endpush
@push('page_script')
    <script src="{{url('assets/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>

    <!-- Select2 -->
    <script src="{{url('assets/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
@endpush
@push('script_form')

    <script>
        $('.select2').select2();
        //title and name convert to slug value auto
        $(document).ready(function(){
            $("#name").keyup(function(e){
                var name = $(this).val().trim().toLowerCase().replace(/\s+/g, '-');
                $('#slug').val(name);
            });
            $("#title").keyup(function(e){
                var title = $(this).val().trim().toLowerCase().replace(/\s+/g, '-');
                $('#slug').val(title);
            });
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })
    </script>
    <script type="text/javascript" src="{{url('assets/jquery-validation-1.17.0/dist/jquery.validate.js')}}"></script>
@endpush