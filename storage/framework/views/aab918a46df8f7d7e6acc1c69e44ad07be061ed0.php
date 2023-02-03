<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset("plugins/fontawesome-free/css/all.min.css")); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo e(asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset("plugins/jqvmap/jqvmap.min.css")); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset("dist/css/adminlte.min.css")); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset("plugins/daterangepicker/daterangepicker.css")); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset("plugins/summernote/summernote-bs4.min.css")); ?>">
    <!-- Table -->
    <link rel="stylesheet" href="<?php echo e(asset(" plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset("dist/css/adminlte.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("plugins/select2/css/select2.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css")); ?>">
    <!-- BS Stepper -->"
    <link rel="stylesheet" href="<?php echo e(asset("plugins/bs-stepper/css/bs-stepper.min.css")); ?>">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo e(asset("plugins/dropzone/min/dropzone.min.css")); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo e(asset("dist/img/AdminLTELogo.png")); ?>" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <?php echo e(config('app.name', 'Laravel')); ?>

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
        <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src=" <?php echo e(asset("dist/img/AdminLTELogo.png")); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Hotel Manager</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item " id="customer">
                        <a href="#" class="nav-link" id="customer_manage">
                            <i class="fas fa-home"></i> <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('dashboard.index')); ?>" class="nav-link " id="customer_index" >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>

                            
                            
                            
                            
                            
                            
                        </ul>
                    </li>
                    <li class="nav-item " id="customer">
                        <a href="#" class="nav-link" id="customer_manage">
                            <i class="fas fa-cash-register"></i>
                                <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('transaction.index')); ?>" class="nav-link " id="customer_index" >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>create</p>
                                </a>
                            </li>
                            
                            
                            
                            
                            
                            
                        </ul>
                    </li>

                    <li class="nav-item " id="customer">
                        <a href="#" class="nav-link" id="customer_manage">
                            <i class="fas fa-users"></i>
                                <i class="right fas fa-angle-left"></i>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('user.index')); ?>" class="nav-link " id="customer_index" >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                        <a href="<?php echo e(route('customer.index')); ?>" class="nav-link" id="customer_create">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customer</p>
                                </a>
                            </li>
                            
                            
                            
                            
                            
                            
                        </ul>
                    </li>
                    <li class="nav-item " id="customer">
                        <a href="#" class="nav-link" id="customer_manage">
                            <i class="fas fa-house-user"></i>
                            <i class="right fas fa-angle-left"></i>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('room.index')); ?>" class="nav-link " id="customer_index" >
                                    <i class="chartjs-render-monitor"></i>
                                    <p>Room</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('type.index')); ?>" class="nav-link" id="customer_create">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Type</p>
                                </a>
                            </li>
                            
                            
                            
                            
                            
                            
                        </ul>
                    </li>
                    <li class="nav-item " id="customer">
                        <a href="#" class="nav-link" id="customer_manage">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                                <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                            </svg>
                            <i class="right fas fa-angle-left"></i>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('chart.dialyGuest')); ?>" class="nav-link " id="customer_index" >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Chart</p>
                                </a>
                            </li>
                            
                            
                            
                            
                            
                            
                        </ul>
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
            <div class="container-fluid"><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <?php echo $__env->yieldContent('create'); ?>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </section>
    </div>
</div>
<!-- /.card-header -->
























































































































































































































































































































































































































































































































<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset("plugins/jquery/jquery.min.js")); ?> "></script>
<!-- jQuery UI 1.11.4 -->
<script src=" <?php echo e(asset("plugins/jquery-ui/jquery-ui.min.js")); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset("plugins/bootstrap/js/bootstrap.bundle.min.js")); ?>"></script>
<!-- ChartJS -->
<script src=" <?php echo e(asset("plugins/chart.js/Chart.min.js")); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset("plugins/sparklines/sparkline.js")); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo e(asset("plugins/jqvmap/jquery.vmap.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/jqvmap/maps/jquery.vmap.usa.js")); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset("plugins/jquery-knob/jquery.knob.min.js")); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(asset("plugins/moment/moment.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/daterangepicker/daterangepicker.js")); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(asset("plugins/summernote/summernote-bs4.min.js")); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset("dist/js/adminlte.js")); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset("dist/js/demo.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/select2/js/select2.full.min.js")); ?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo e(asset("plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js")); ?>"></script>
<!-- InputMask -->
<script src="<?php echo e(asset("plugins/moment/moment.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/inputmask/jquery.inputmask.min.js")); ?>"></script>
<!-- date-range-picker -->
<script src="<?php echo e(asset("plugins/daterangepicker/daterangepicker.js")); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo e(asset("plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/bootstrap-switch/js/bootstrap-switch.min.js")); ?>"></script>
<!-- BS-Stepper -->
<script src="<?php echo e(asset("plugins/bs-stepper/js/bs-stepper.min.js")); ?>"></script>
<!-- dropzonejs -->
<script src="<?php echo e(asset("plugins/dropzone/min/dropzone.min.js")); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset("dist/js/pages/dashboard.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/datatables/jquery.dataTables.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/datatables-buttons/js/dataTables.buttons.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/datatables-buttons/js/buttons.bootstrap4.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/jszip/jszip.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/pdfmake/pdfmake.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/pdfmake/vfs_fonts.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/datatables-buttons/js/buttons.html5.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/datatables-buttons/js/buttons.print.min.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/datatables-buttons/js/buttons.colVis.min.js")); ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        });
    });
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>
<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\new\resources\views/index.blade.php ENDPATH**/ ?>