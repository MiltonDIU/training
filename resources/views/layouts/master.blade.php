<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! Config::getSettingInfo()->title?Config::getSettingInfo()->title:'User Management' !!}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css') }}">

    @stack('page_style')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/AdminLTE/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('assets/AdminLTE/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/AdminLTE/dist/css/custom.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
@stack('style')

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120085781-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120085781-3');
</script>

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>L</b>UM</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                @if(Config::getSettingInfo()->logo)
                    <img height="50" src="{{url('assets/uploads/logo',Config::getSettingInfo()->logo)}}" alt="{{Config::getSettingInfo()->logo_alt}}">
                    @else
                <b>User</b>Management
            @endif
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else


                        <li>
                            <a href="{{url('/')}}">
                                <i class="fa fa-home big"></i>
                            </a>
                        </li>

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ url('assets/uploads/avatar',Config::getUserProfile()->avatar) }}" class="user-image" alt="{{Config::getUserProfile()->username}}">

                                <span class="hidden-xs">{{Config::getUserProfile()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ url('assets/uploads/avatar',Config::getUserProfile()->avatar) }}" class="img-circle" alt="{{Config::getUserProfile()->username}}">
                                    <p>
                                        {{Config::getUserProfile()->name}}
                                        <small>Member since {{ Config::getUserProfile()->created_at->diffForHumans() }}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{url('admin/profile')}}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>



                    @endguest





                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">

                    <img src="{{ url('assets/uploads/avatar',Config::getUserProfile()->avatar) }}" class="img-circle" alt="{{Config::getUserProfile()->username}}">

                </div>
                <div class="pull-left info">
                    <p>{{Config::getUserProfile()->name}}</p>
                    <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                </div>
            </div>
            <!-- search form -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="active"><a href="{{url('admin')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                            <span>General</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('permission_categories.permission_category.index') }}"><i class="fa fa-link"></i> <span>Permission Category</span></a></li>
                        <li><a href="{{ route('permissions.permission.index') }}"><i class="fa fa-link"></i> <span>Permission</span></a></li>
                        <li><a href="{{ route('roles.role.index') }}"><i class="fa fa-link"></i> <span>Role</span></a></li>
                        <li><a href="{{ route('users.user.index') }}"><i class="fa fa-link"></i> <span>User</span></a></li>
                        <li><a href="{{ route('settings.setting.index') }}"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
                    </ul>
                </li>
                <li><a href="{{ route('batches.batch.index') }}"><i class="fa fa-link"></i> <span>New Batch</span></a></li>



                <li><a href="{{ route('categories.category.index') }}"><i class="fa fa-link"></i> <span>Category</span></a></li>
                <li><a href="{{ route('teachers.teacher.index') }}"><i class="fa fa-link"></i> <span>Resource Person</span></a></li>
                <li><a href="{{ route('venues.venue.index') }}"><i class="fa fa-location-arrow"></i> <span>Venues</span></a></li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>Courses</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('courses.course.index') }}"><i class="fa fa-mortar-board"></i> <span>Courses</span></a></li>
                        <li><a href="{{ route('allocations.allocation.index') }}"><i class="fa fa-link"></i> <span>Assign Course</span></a></li>
                    </ul>
                </li>



                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-paypal"></i>
                        <span>Programs</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('program_types.program_type.index') }}"><i class="fa fa-link"></i> <span>Program type</span></a></li>
                        <li><a href="{{ route('programs.program.index') }}"><i class="fa fa-link"></i> <span>Program</span></a></li>
                    </ul>
                </li>
<?php /*
               <li><a href="{{ route('course_enrolls.course_enroll.index') }}"><i class="fa fa-link"></i> <span>Courses Enroll Student</span></a></li>
                <li><a href="{{ route('program_enrolls.program_enroll.index') }}"><i class="fa fa-link"></i> <span>Program Enrollment</span></a></li>
         <?php */?>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @include('admin.partials.breadcrumb')
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                       @yield('content')
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        {!! Config::getSettingInfo()->copy_right?Config::getSettingInfo()->copy_right:"Copyright © 2018 <a href='https://skill.jobs/' target='_blank'>Skill Jobs</a>. All Rights Reserved. " !!}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">

            </div>


        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ url('assets/AdminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@stack('page_script')
<!-- FastClick -->
<script src="{{ url('assets/AdminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('assets/AdminLTE/dist/js/demo.js') }}"></script>
<!-- Page script -->
@stack('script_form')
@stack('script')
</body>
</html>
