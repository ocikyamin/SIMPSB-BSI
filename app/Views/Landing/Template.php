<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="theme-color" content="#16D5FF" />
    <meta name="description"
        content="Selamat datang di layanan Pendaftaran Santri Baru Online! Nikmati kemudahan daftar santri dengan sistem terintegrasi pembayaran Virtual Akun. Daftarkan putra/putri Anda secara aman, cepat, dan praktis. Bergabunglah dengan ribuan orang yang telah menamatkan pendidikan di MTI canduang." />
    <meta name="keywords"
        content="pendaftaran santri baru, online, pembayaran virtual akun bank, daftar santri, Host to Host, PPDB, PSB, MTI Canduang, PSB MTI Canduang, Pesantren Terbaik, Pesantren tertua, Kitab Kuning, Pesantren Unggulan, Program Unggulan Pesantren, Sumatera Barat, Agam, Bukittinggi" />
    <meta name="author" content="Abdul Yamin, S.Pd, M.Kom" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?=base_url()?>" />
    <!-- Open Graph Tags (Untuk Media Sosial) -->
    <meta property="og:title" content="Sistem Penerimaan Santri Baru MTI Canduang" />
    <meta property="og:description"
        content="Selamat datang di layanan Pendaftaran Santri Baru Online! Nikmati kemudahan daftar santri dengan sistem terintegrasi pembayaran Virtual Akun. Daftarkan putra/putri Anda secara aman, cepat, dan praktis. Bergabunglah dengan ribuan orang yang telah menamatkan pendidikan di MTI canduang." />
    <meta property="og:image" content="<?=base_url()?>assets/landing/img/img600600.jpg" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?=base_url()?>" />
    <meta name="google-site-verification" content="p-6SNE1SWuzmTo-vekTO4uoQOiBkZptiMd6C1EgI1Iw" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/favicon_io/favicon-16x16.png">
    <!-- <link rel="manifest" href="<?=base_url()?>/assets/favicon_io/site.webmanifest"> -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="<?=base_url()?>/assets/landing/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/landing/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=base_url()?>/assets/landing/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="<?=base_url()?>/assets/landing/css/style.css" rel="stylesheet">
    <link rel="manifest" href="<?=base_url()?>manifest.json">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <!-- <a href="<?=base_url()?>" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary"><img class="img-fluid me-2" src="<?=base_url()?>/assets/logo/brandSIMPSB.png"
                    alt="Brand" style="width:35px">PSB Portal</h2>
        </a> -->
        <a href="<?=base_url()?>" class="navbar-brand d-flex align-items-center">
            <img class="me-2" src="<?=base_url()?>/assets/logo/PSB_brand.png" alt="logo PSB">
            <div>
                <h3 class="text-primary m-0" style="line-height: 16px;font-weight: bold;">PSB Portal
                    <div class="text-dark"><em style="font-size: 12px;">- Management System</em></div>
                </h3>
            </div>

        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="<?=base_url()?>" class="nav-item nav-link active"><i class="fa fa-home"></i> Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fas fa-info-circle"></i>
                        Informasi</a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="<?=base_url('brosur')?>" class="dropdown-item"><i class="far fa-circle"></i> Brosur</a>
                        <a href="<?=base_url('persyaratan')?>" class="dropdown-item"><i class="far fa-circle"></i>
                            Persyaratan</a>
                        <a href="<?=base_url('cara-daftar')?>" class="dropdown-item"><i class="far fa-circle"></i> Cara
                            Daftar</a>
                        <a href="<?=base_url('kelulusan')?>" class="dropdown-item"><i class="far fa-circle"></i>
                            Kelulusan</a>
                    </div>
                </div>
                <!-- <a href="<?=base_url('syarat')?>" class="nav-item nav-link">Syarat</a> -->
                <!-- <a href="<?=base_url('brosur')?>" class="nav-item nav-link"><i class="far fa-bookmark"></i>
                    Brosur</a> -->
                <a href="<?=base_url('cara-bayar')?>" class="nav-item nav-link"><i class="fas fa-comment-dollar"></i>
                    Smart Billing</a>
                <!-- <a href="<?=base_url('info')?>" class="nav-item nav-link">Pengumuman</a> -->
                <a href="<?=base_url('login')?>" class="nav-item nav-link">
                    <b><i class="fas fa-sign-in-alt"></i>
                        Login</b></a>
            </div>
            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2"
                    href="https://www.instagram.com/mticanduang_official/" target="_blank"><i
                        class="fab fa-instagram"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2"
                    href="https://www.facebook.com/mticanduangofficial/" target="_blank"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2"
                    href="https://www.youtube.com/c/MTICANDUANG" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <?= $this->renderSection('content') ?>
    <!-- Footer Start -->
    <div class="container-fluid bg-light footer mt-5 pt-3 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h1 class="text-primary">Kampus.</h1>
                    Jln. Syekh Sulaiman Arrasuli, Jorong Lubuak Aua, Canduang Koto Laweh, Candung, Agam Regency, West
                    Sumatra 26192
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Kontak</h5>
                    <p><i class="fa fa-phone-alt me-3"></i> Phone: +6275228115</p>
                    <p><i class="fa fa-envelope me-3"></i>Email: mticanduang@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Follow Us</h5>
                    <div class="d-flex">
                        <a class="btn btn-square rounded-circle bg-light text-primary me-2"
                            href="https://www.instagram.com/mticanduang_official/" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-square rounded-circle bg-light text-primary me-2"
                            href="https://www.facebook.com/mticanduangofficial/" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square rounded-circle bg-light text-primary me-2"
                            href="https://www.youtube.com/c/MTICANDUANG" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">PSB - <?=date('Y')?></a>. All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Develop By <a href="https://github.com/ocikyamin">ICT - MTIC</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a> -->
    <a href="https://wa.me/6282122551928?text=Halo!." target="_blank"
        class="btn btn-lg btn-success btn-lg-square rounded-circle back-to-top">
        <i class="fab fa-whatsapp"></i>
    </a>
    <!-- Tambahkan tombol chat ke halaman web Anda -->
    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/assets/landing/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/landing/lib/wow/wow.min.js"></script>
    <script src="<?=base_url()?>/assets/landing/lib/easing/easing.min.js"></script>
    <script src="<?=base_url()?>/assets/landing/lib/waypoints/waypoints.min.js"></script>
    <script src="<?=base_url()?>/assets/landing/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>/assets/landing/lib/counterup/counterup.min.js"></script>
    <!-- Template Javascript -->
    <script src="<?=base_url()?>/assets/landing/js/main.js"></script>
    <script src="<?=base_url()?>assets/js/pwa.js"></script>
    <script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('<?=base_url()?>service-worker.js')
            .then(function(registration) {
                // console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch(function(error) {
                // console.error('Service Worker registration failed:', error);
            });
    }
    </script>


</body>

</html>