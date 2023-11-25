<?= $this->extend('Landing/Template') ?>
<?= $this->section('content') ?>
<!-- Header Start -->
<div class="container-fluid hero-header bg-light mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4 mb-3 animated slideInDown">Persyaratan</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Persyaratan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
<!-- FAQs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                PERSYARATN UMUM
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ol>
                                    <li>Tamatan/lulusan SD/MI atau Tamatan/lulusan SMP/MTs.</li>
                                    <li>Mampu membaca al-Qur’an, kecuali bagi muallaf.</li>
                                    <li>Bersedia mentaati peraturan/ketentuan yang berlaku di MTI Canduang.</li>
                                    <li>Sehat jasmani dan rohani dibuktikan dengan Surat Keterangan Sehat</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                PERSYARATN KHUSUS
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ol>
                                    <li>Membuat Akun Calon Santri Baru pada situs https://psb.mticanduang.sch.id/</li>
                                    <li>Mengisi Nilai Rapor & Upload Foto Terbaru</li>
                                    <li>Melakukan Pembayaran Biaya Pendaftaran Rp. 250, 000,-</li>
                                    <li>Upload dokumen jika ada</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                MEMBAWA BERKAS SAAT MENGIKUTI TES
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ol>
                                    <li>Print Out Kartu Ujian
                                    </li>
                                    <li>Printout NISN dari DAPODIK/EMIS
                                    </li>
                                    <li>Foto Copy Akte Kelahiran

                                    </li>
                                    <li>Foto Copy Kartu Keluarga</li>
                                    <li>Foto Copy KTP Kedua Orang Tua
                                    </li>
                                    <li>Printout NISN dari DAPODIK / EMIS
                                    </li>
                                    <li>Foto Copy Rapor Kelas 4, 5 bagi tamatan SD/MI, Kelas 7, 8 bagi tamatan SMP/MTs
                                        Semester 1 dan 2 yang telah dilegalisir kepala sekolah
                                    </li>
                                    <li>Foto Copy Kartu BPJS, KIP, dan PKH bagi yang memiliki,
                                    </li>
                                    <li>Surat Izin Tinggal Sementara dari pihak yang berwenang, bagi WNA</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQs Start -->
<?= $this->endSection() ?>