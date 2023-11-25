<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSB | Portal</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/favicon_io/favicon-16x16.png">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?=base_url()?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>


    <style>
    .mid td {
        vertical-align: middle;
    }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-teal">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars text-white"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link text-white">TP.<?=CSB()->periode?></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?=base_url('student/logout')?>">
                        <i class="nav-icon fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-0 sidebar-light-teal">
            <!-- Brand Logo -->
            <a href="<?=base_url('student')?>" class="brand-link bg-teal">
                <img src="<?=base_url()?>assets/logo/icon.png" alt="AdminLTE Logo" class="brand-image"
                    style="opacity: .8">
                <span class="brand-text font-weight-light"><b class="text-white">PSB</b> Portal</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel text-center mt-3 mb-2">
                    <div>
                        <div class="image mb-0">
                            <?php $foto = CSB()->foto==null ? 'no_image.png': CSB()->foto;?>
                            <img src="<?=base_url('files/_foto/'.$foto)?>" class="profile-user-img img-fluid img-circle"
                                style="width:60px;height:60px" alt="User Image">
                        </div>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?=CSB()->nama_lengkap?></a>
                        <span class="badge badge-pill badge-info bg-teal"><?=CSB()->noreg?></span>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="<?=base_url('student')?>" class="nav-link" id="nav-home">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('student/biodata')?>" class="nav-link" id="nav-biodata">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    Biodata
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Document
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                <p>
                                    Invoice
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Account</li>
                        <li class="nav-item">
                            <a href="<?=base_url('student/logout')?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </div>
        <!-- /.content-wrapper -->
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        <footer class="main-footer text-sm">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 <a href="https://github.com/ocikyamin">ICT - MTIC</a> .</strong> All
            rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>