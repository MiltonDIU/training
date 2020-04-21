@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua">
                      <i class="fa fa-leanpub" aria-hidden="true"></i>

                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Course</span>
                        <span class="info-box-number">{{$total_course}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red">
                        <i class="fa fa-star" aria-hidden="true"></i>
</span>

                    <div class="info-box-content">
                        <span class="info-box-text">Active Course</span>
                        <span class="info-box-number">{{$active_course}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Batches</span>
                        <span class="info-box-number">{{$all_batch}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-ravelry" aria-hidden="true"></i>
</span>

                    <div class="info-box-content">
                        <span class="info-box-text">Active Batches</span>
                        <span class="info-box-number">{{$active_batch}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-6">

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Course</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Course/Batch</th>
                                    <th>Resource person</th>
                                    <th>Apply last date</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($allocations as $allocation)
                                    <tr>
                                        <td>
                                           <a href="{{ route('allocations.allocation.show', $allocation->id ) }}">
                                              @if($allocation->course)
                                              {{$allocation->course->name}}
                                              @endif
                                              ( {{$allocation->batch->name}} batch)
                                           </a>
                                        </td>
                                        <td>
                                            @foreach($allocation->teacher as $teacher)
                                                <a href="{{ route('teachers.teacher.show', $teacher->id ) }}">
                                                         <span class="label label-success">
                                                         {{$teacher->name}}
                                                         </span>
                                                </a>
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>{{$allocation->last_date}}</td>

                                    </tr>
                                    @endforeach

    {{--                            @foreach($allocations as $allocation)

                                    <tr>
                                        <td>
                                            <a href="{{url('admin/courses/'.$allocation->course->id.'/'.$allocation->course->slug)}}">
                                                {{$allocation->course->name}}
                                            </a>

                                            </td>
                                        <td>
                                            @foreach($allocation->teacher as $teacher)

                                                    <a href="{{ route('teachers.teacher.show', $teacher->id ) }}">
                                                         <span class="label label-success">
                                                         {{$teacher->name}}
                                                         </span>
                                                    </a>
<br>
                                            @endforeach
                                        </td>
                                        <td>{{$allocation->course->last_date}}</td>

                                    </tr>
                                @endforeach
--}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{{url('admin/allocations')}}" class="btn btn-sm btn-info btn-flat pull-left">View All</a>
                            </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                              <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Products</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Program title</th>
                                    <th>Resource person</th>
                                    <th>Start date</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($programs as $program)

                                    <tr>
                                        <td>
                                            <a href="{{ route('programs.program.enroll',['id'=>$program->id,'course'=>$program->slug])}}">
                                                {{$program->name}} ({{$program->program_enroll_count}})
                                            </a>

                                        </td>
                                        <td>
                                            @foreach($program->teacher as $teacher)

                                                <a href="{{ route('teachers.teacher.show', $teacher->id ) }}">
                                                         <span class="label label-success">
                                                         {{$teacher->name}}
                                                         </span>
                                                </a>
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>{{$program->begin_date}}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{route('programs.program.index')}}" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection

@push('page_script')
    <!-- Sparkline -->
    <script src="{{url('assets/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap  -->
    <script src="{{url('assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{url('assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{url('assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('assets/AdminLTE/bower_components/chart.js/Chart.js')}}"></script>
    <script src="{{url('assets/AdminLTE/dist/js/pages/dashboard2.js')}}"></script>



    @endpush