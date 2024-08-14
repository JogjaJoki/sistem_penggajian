<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ url('naive-bayes.png') }}" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ url('adminlte') }}/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/dist/css/adminlte.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('adminlte') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ url('adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="{{ url('#') }}" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="{{ url('#') }}" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="{{ url('#') }}">
                        <i class="fa fa-outdent"></i> <b>Logout</b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ url('#') }}" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ url('naive-bayes.png') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{ auth()->user()->name }}
                                    </h3>
                                    <p class="text-sm">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ url('#') }}" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-header">MASTER DATA</li>
                            @if(Auth::user()->getRole() == 'pemilik')
                            <li class="nav-item">
                                <a href="{{ route('setting') }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Pengaturan </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.laporan.index', ['type' => 'karyawan']) }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Laporan Karyawan
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.laporan.index', ['type' => 'absensi']) }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Laporan Presensi
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.laporan.index', ['type' => 'gaji']) }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Laporan Gaji
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->getRole() == 'keuangan')
                            <li class="nav-item">
                                <a href="{{ route('admin.gaji.index') }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Gaji
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.tunjangan.index') }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Tunjangan
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->getRole() == 'kepegawaian')
                            <li class="nav-item">
                                <a href="{{ route('admin.lembur.index') }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Lembur
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.karyawan.index') }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Karyawan
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.absensi.index') }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Absensi
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->getRole() == 'karyawan')
                            <li class="nav-item">
                                <a href="{{ route('admin.absensi.myabsensi') }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Absensi Saya
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.gaji.mygaji') }}"
                                    class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Gaji Saya
                                        {{-- <span class="badge badge-info right">2</span> --}}
                                    </p>
                                </a>
                            </li>
                            @endif
                    </ul>
                </nav>
                <!-- Sidebar Menu End -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-light">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }}
                ||</strong>
            {{ env('APP_NAME') }} 
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ url('adminlte') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ url('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('adminlte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('adminlte') }}/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ url('adminlte') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ url('adminlte') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('adminlte') }}/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ url('adminlte') }}/dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('adminlte') }}/dist/js/pages/dashboard2.js"></script>

    <!-- Bootstrap 4 -->
    <!-- DataTables  & Plugins -->
    <script src="{{ url('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    {{-- <script src="{{ url('adminlte') }}/dist/js/adminlte.min.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ url('adminlte') }}/dist/js/demo.js"></script> --}}
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
