<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                        @if (Auth::user()->role == 'user')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Resume Builder
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('resume-builder.page-1') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Personal Information</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('resume-builder.page-2') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Work Experience</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('resume-builder.page-3') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Skill & Tools</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('resume-builder.page-4') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Education</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('resume-builder.page-5') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Award</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('resume-builder.page-6') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Language</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('resume-builder.page-7') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Interest</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('resume-builder.page-8') }}" target="_blank" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Resume</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Job Recommendation
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('resume-builder.page-1') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Job List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Starter Pages
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Active Page</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inactive Page</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                        {{ __('Log Out') }}
                                    </p>
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard : {{ Auth::user()->name }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">{{ Auth::user()->role }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 {{ config('app.name') }}.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template') }}/dist/js/adminlte.min.js"></script>
    @livewireScripts
</body>

</html>
