<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | <?=$title?></title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/favicon_io/favicon-16x16.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Toastr -->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
    <script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
    <!-- jQuery -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <style>
    .mid td {
        vertical-align: middle;
    }

    #clock {
        /* font-size: 3em; */
        text-align: center;
        font-family: 'Arial', sans-serif;
        /* background-color: #333;
        color: #fff; */
        padding: 5px;
        border-radius: 50px;
        /* width: 200px; */
        margin: 0 auto;
    }

    #time {
        font-weight: bold;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini text-sm accent-teal">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-teal text-sm">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars text-white"></i></a>
                </li>
                <!-- <li class="nav-item">
                   
                </li> -->

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=base_url('admin/master')?>" class="nav-link text-white"><i class="fas fa-cogs"></i>
                        Masters</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=base_url('admin/setting')?>" class="nav-link text-white"><i class="fa fa-cog"></i>
                        Pengaturan</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                  
                </li> -->
                <li class="nav-item">
                    <a href="<?=base_url('admin/logout')?>" class="btn btn-default btn-sm ml-3">
                        <i class="fas fa-sign-out-alt me-3"></i> Keluar
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-teal elevation-2">
            <!-- Brand Logo -->

            <a href="<?=base_url('admin/dashboard')?>" class="brand-link bg-teal">
                <img src="<?=base_url()?>assets/logo/icon.png" alt="Logo" class="brand-image img-circle elevation-2">
                <span class="brand-text font-weight-light"><b>Admin</b> Manager</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-2 mb-0 d-flex">
                    <div class="image">
                        <img src="<?=base_url()?>files/_foto/default.png" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?=IsLogin()->fullname?></a>
                        <span class="badge badge-pill badge-info bg-teal"><?=IsLogin()->level_name?></span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <div id="clock">
                                <div id="time"></div>
                            </div>
                        </li>
                        <li class="nav-item mb-2 mt-2">
                            <a href="<?=base_url('admin/dashboard')?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-bell nav-icon"></i>
                                <p>
                                    Verifikasi
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-danger right">1</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?=base_url('admin/notif/pembayaran')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pembayaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelengkapan Data</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('admin/student')?>" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p>
                                    Data CSB
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('admin/payment')?>" class="nav-link">
                                <i class="far fa-credit-card nav-icon"></i>
                                <p>
                                    Payment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('admin/presensi')?>" class="nav-link">
                                <i class="fas fa-qrcode nav-icon"></i>
                                <p>
                                    Presensi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('admin/presensi')?>" class="nav-link">
                                <i class="fa fa-print nav-icon"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Account</li>
                        <li class="nav-item">
                            <a href="<?=base_url('admin/users')?>" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('admin/logs')?>" class="nav-link">
                                <i class="fa fa-history nav-icon"></i>
                                <p>
                                    Activities
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
        <div class="content-wrapper"><?= $this->renderSection('content') ?></div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Dev</b> Yamin
            </div>
            <strong>Copyright &copy; 2023 <a href="#">PSB</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <!-- <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?=base_url()?>assets/dist/js/demo.js"></script> -->
    <script>
    $(document).ready(function() {
        function updateClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            const timeString = `${hours}:${minutes}:${seconds}`;
            $('#time').text(timeString);
        }

        // Panggil fungsi updateClock setiap detik
        setInterval(updateClock, 1000);

        // Jalankan updateClock saat halaman pertama kali dimuat
        updateClock();
    });
    </script>

</body>

</html>