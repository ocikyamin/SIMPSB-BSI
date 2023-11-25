<?= $this->extend('Landing/Template') ?>

<?= $this->section('content') ?>
<!-- Header Start -->
<div class="container-fluid hero-header py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h2>Portal Pendaftaran</h2>
                <h1 class="display-4 mb-3 animated slideInDown">
                    <div>PONDOK
                        PESANTREN</div>
                    <div><strong
                            style="-webkit-text-stroke: 2px black;text-shadow: 0px 4px 4px #282828;color:#FFE900">مدرسة
                            التربية
                            الإسلامية
                            جندونج</strong></div>
                </h1>
                <!-- <h1 class="display-4 mb-3 animated slideInDown"><em>Pilihan</em> <b class="text-primary">CERDAS</b>
                    <em>Generasi</em>
                    <b class="text-warning">EMAS</b>
                </h1> -->
                <p class="animated slideInDown">Telah Dibuka Penerimaan Santri Baru TP. 2024-2025.
                    Ayo segera daftar ! Kuota Terbatas.</p>
                <a href="<?=base_url('register')?>" class="btn btn-primary py-3 px-4 animated slideInDown"
                    style="border-radius:50px"><i class="far fa-paper-plane"></i>
                    Daftar Sekarang !</a>
                <a href="#" id="btn-install-app" style="display:none;border-radius:50px"
                    class="btn btn-dark py-3 px-4 animated slideInDown"><i class="fas fa-mobile-alt"></i>
                    Install
                    Aplikasi</a>
            </div>
            <div class="col-lg-6 text-center">
                <div id="slide-images" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#slide-images" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#slide-images" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#slide-images" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?=base_url()?>/assets/gambar/slide/1.png" class="animated fadeIn d-block w-100"
                                alt="Slide Hero.">
                        </div>
                        <div class="carousel-item">
                            <img src="<?=base_url()?>/assets/gambar/slide/2.png" class="animated fadeIn d-block w-100"
                                alt="Slide Hero.">
                        </div>
                        <div class="carousel-item">
                            <img src="<?=base_url()?>/assets/gambar/slide/3.png" class="animated fadeIn d-block w-100"
                                alt="Slide Hero.">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#slide-images"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slide-images"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


                <!-- <video width="100%" height="500" controls autoplay muted>
                    <source src="<?=base_url()?>/assets/video/01.mp4" type="video/mp4">
                </video> -->
                <!-- <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;"
                    src="<?=base_url()?>/assets/landing/img/hero-1.png" alt="Hero"> -->
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Roadmap Start -->
<div class="container mt-3 mb-0">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Alur Pendaftaran</h1>
            <p class="text-primary mb-5">Alur pendaftaran calon santri baru mengacu pada serangkaian langkah yang
                harus diikuti oleh calon santri atau wali/orang tua calon santri untuk mendaftar</p>
        </div>
        <div class="owl-carousel roadmap-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Step 1</h5>
                <span>Calon Santri Membuat Akun Baru</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Step 2</h5>
                <span>Mengisi Nilai Rapor dan Upload Foto</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Step 3</h5>
                <span>Melakukan Pembayaran Pendaftaran Rp.250,000,- pada nomor VA</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Step 4</h5>
                <span>Mencetak Kartu Tanda Peserta Ujian</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Step 5</h5>
                <span>Mengikuti Rangkaian Tes Seleksi Masuk sesuai dengan jadwal yang telah ditentukan</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Step 6</h5>
                <span>Melihat Hasil Tes / pengumuman kelulusan Calon santri baru </span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Step 7</h5>
                <span>Melakukan Pendaftaran Ulang Sesuai jadwal yang telah ditentukan.</span>
            </div>
        </div>
    </div>
</div>
<!-- Roadmap End -->


<!-- About Start -->
<div class="container py-2">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" src="<?=base_url()?>/assets/landing/img/about.webp" width="366px" height="366px"
                    alt="About Img">
                <div>
                    #MTICANDUANG Keren
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6">Jalur Pendaftaran</h1>
                    <p>Tersedia Jalur Pendaftaran Prestasi dan reguler, pilihlah jalur pendaftaran
                        sesuai dengan syarat dan ketentuan yang berlaku.</p>

                    <?php
                        foreach (TabelMasterStatus('master_jalur') as $m) {?>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span><?=$m['jalur_name']?></span>
                    </div>
                    <?php
                        }
                        ?>
                    <a class="btn btn-primary py-3 px-4" href="">#BanggaJadiSantri</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-xxl bg-light py-5 my-5 shadow-sm" style="border-radius:50px">
    <div class="container py-1 text-center">
        <h1 class="display-6">Visi</h1>
        <div>
            <h5>
                “Menjadi Lembaga Pendidikan yang Terkemuka Berlandaskan Ahlus Sunnah Wal Jamaah dan Bermazhab
                Syafi’i dalam Mewujudkan Generasi Muslim Tafaqquh Fi al-din dan Iqamah al-din.“
            </h5>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Program Pendidikan</h1>
            <p class="text-primary mb-5">Program Pendidikan Pondok Pesantren Madrasah Tarbiyah Islamiyah (MTI) Canduang
                merupakan
                gabungan antara sistem pondok pesantren dan pendidikan formal madrasah. MTI Canduang memiliki program
                pendidikan sebagai berikut:</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="<?=base_url()?>/assets/landing/img/icon-64.webp"
                        width="64px" height="64px" alt="img-programs">
                    <div class="ps-4">
                        <h5 class="mb-3">Kitab Kuning + Madrasah Tsanawiyah</h5>
                        <span>Tingkat Tsanawiyah, dimulai dari kelas II – IV Tarbiyah.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" width="64px" height="64px" alt="img-programs"
                        src="<?=base_url()?>/assets/landing/img/icon-64.webp" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Kitab Kuning + Madrasah Aliyah</h5>
                        <span>Tingkat Aliyah dimulai dari kelas V – VII Tarbiyah.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" width="64px" height="64px" alt="img-programs"
                        src="<?=base_url()?>/assets/landing/img/icon-64.webp" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Ma'had Aly Syekh Sulaiaman Arrasuli</h5>
                        <span>Program Takhassus (S1 - Bahasa dan Sastra Arab)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->

<!-- Rincian Biaya  -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Biaya Pendidikan</h1>
            <p class="text-primary fs-5 mb-5">Rincian Biaya Pendidikan Santri Baru TP. 2024/2025.</p>
        </div>
        <div class="row g-5">
            <img class="img-fluid animated pulse infinite mb-3" style="animation-duration: 3s;border-radius:10px"
                src="<?=base_url('assets/gambar/Rincian.webp')?>" alt="Rincian Biaya">
        </div>
    </div>
</div>
<!-- Rincian Biaya  -->


<!-- Service Start -->
<!-- <div class="container-xxl bg-light py-5 my-5">
    <div class="container py-5">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Biaya Pendidikan</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">

                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <tbody>
                            <tr style="background: #ffc400;color:black">
                                <td height="29">
                                    <div align="center"><strong>NO</strong></div>
                                </td>
                                <td colspan="2"><strong>NAMA BIAYA</strong></td>
                                <td><strong>PUTRA</strong></td>
                                <td><strong>PUTRI</strong></td>
                            </tr>
                            <tr class="text-warning">
                                <td>
                                    <div align="center"><strong>1</strong></div>
                                </td>
                                <td colspan="4"><b>Uang Tahunan</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center"><span></span></div>
                                </td>
                                <td>
                                    <div align="center">
                                        <div align="center">a</div>
                                    </div>
                                </td>
                                <td><span>Pembangunan (Waqaf) Minimal </span></td>
                                <td><span>Rp. 5.000.000</span></td>
                                <td><span>Rp. 5.000.000</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center"><span></span></div>
                                </td>
                                <td>
                                    <div align="center">
                                        <div align="center">b</div>
                                    </div>
                                </td>
                                <td><span>Osti</span></td>
                                <td><span>Rp. 70.000</span></td>
                                <td><span>Rp. 70.000</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center"><span></span></div>
                                </td>
                                <td>
                                    <div align="center">
                                        <div align="center">c</div>
                                    </div>
                                </td>
                                <td><span>Pustaka</span></td>
                                <td><span>Rp. 20.000</span></td>
                                <td><span>Rp. 20.000</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center"><span></span></div>
                                </td>
                                <td>
                                    <div align="center">
                                        <div align="center">d</div>
                                    </div>
                                </td>
                                <td><span>Sosial</span></td>
                                <td><span>Rp. 30.000</span></td>
                                <td><span>Rp. 30.000</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center"><span></span></div>
                                </td>
                                <td>
                                    <div align="center">
                                        <div align="center">e</div>
                                    </div>
                                </td>
                                <td><span>Kartu Pelajar</span></td>
                                <td><span>Rp. 15.000</span></td>
                                <td><span>Rp. 15.000</span></td>
                            </tr>
                            <tr>
                                <td><span></span></td>
                                <td>
                                    <div align="center"><span>f</span></div>
                                </td>
                                <td><span>Rapor</span></td>
                                <td><span>Rp. 125.000</span></td>
                                <td><span>Rp. 125.000</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center"><span></span></div>
                                </td>
                                <td>
                                    <div align="center">
                                        <div align="center">g</div>
                                    </div>
                                </td>
                                <td><span>Wadi'ah / Koppontren </span></td>
                                <td><span>Rp. 40.000</span></td>
                                <td><span>Rp. 40.000</span></td>
                            </tr>
                            <tr class="text-warning">
                                <td>
                                    <div align="center"><strong>2</strong></div>
                                </td>
                                <td colspan="4"><span><strong>Biaya Mondok di
                                            Asrama</strong></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center"><span></span></div>
                                </td>
                                <td>
                                    <div align="center">a</div>
                                </td>
                                <td><span>Sewa Asrama&nbsp; Perbulan </span></td>
                                <td><span>Rp. 150.000</span></td>
                                <td><span>Rp. 150.000</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center"><span></span></div>
                                </td>
                                <td>
                                    <div align="center">b</div>
                                </td>
                                <td><span>Catering Perbulan </span></td>
                                <td><span>Rp. 600.000</span></td>
                                <td><span>Rp. 600.000</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center"><span></span></div>
                                </td>
                                <td>
                                    <div align="center">c</div>
                                </td>
                                <td><span>Uang Perlengkapan Asrama</span></td>
                                <td><span>Rp. 1.480.000</span></td>
                                <td><span>Rp. 1.480.000</span></td>
                            </tr>
                            <tr class="text-warning">
                                <td>
                                    <div align="center"><strong>3</strong></div>
                                </td>
                                <td colspan="2"><span><strong>SPP Perbulan </strong></span></td>
                                <td><span>Rp. 250.000</span></td>
                                <td><span>Rp. 250.000</span></td>
                            </tr>
                            <tr class="text-warning">
                                <td>
                                    <div align="center"><strong>4</strong></div>
                                </td>
                                <td colspan="2"><span><strong>Seragam&nbsp;
                                            Madrasah</strong></span></td>
                                <td><span>Rp. 1.357.000</span></td>
                                <td><span>Rp. 1.467.000</span></td>
                            </tr>
                            <tr>
                                <td colspan="5"><span></span></td>
                            </tr>
                            <tr style="background: #ffc400;color:black">
                                <td colspan="3"><strong>Total Biaya Santri Non Asrama</strong></td>
                                <td><strong>Rp.&nbsp; 6.907.000</strong></td>
                                <td><strong>Rp.&nbsp; 7.017.000</strong></td>
                            </tr>
                            <tr style="background: #ffc400;color:black">
                                <td colspan="3"><strong>Total Biaya Santri Asrama</strong></td>
                                <td><strong>Rp.&nbsp; 9.137.000</strong></td>
                                <td><strong>Rp.&nbsp; 9.247.000</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Service End -->


<?= $this->endSection() ?>