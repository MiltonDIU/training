@push('page_style')
    <!-- DataTables -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('assets/AdminLTE/bower_components/datatables-net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@push('page_script')

<script src="{{url('assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/AdminLTE/bower_components/datatables-net-bs/js/dataTables.bootstrap.min.js')}}"></script>


<script>
    $(function () {
        $('.table-striped').DataTable()
    })
</script>
    @endpush