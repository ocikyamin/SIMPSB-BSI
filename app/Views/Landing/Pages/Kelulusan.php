<?= $this->extend('Landing/Template') ?>
<?= $this->section('content') ?>
<!-- Header Start -->
<div class="container-fluid hero-header bg-light mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4 mb-3 animated slideInDown">Kelulusan</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kelulusan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container py-5">
    <p class="text-center text-success">
        Informasi kelulusan dapat dilihat pada akun masing-masing calon santri. Pilih login atau klik link berikut untuk
        login <a href="<?=base_url('login')?>">Login Calon Santri</a>
    </p>
</div>
<?= $this->endSection() ?>