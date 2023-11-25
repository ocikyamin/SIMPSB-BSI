<?= $this->extend('Student/layouts') ?>
<?= $this->section('content') ?>
<script>
// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})
</script>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-lg-6">
                <h1>Biodata</h1>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- /.card -->
        <div class="bs-stepper linear">
            <div class="bs-stepper-header table-responsive" role="tablist">
                <!-- your steps here -->
                <div class="step active" data-target="#dasis-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="dasis-part"
                        id="dasis-part-trigger" aria-selected="true">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Data Siswa</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#nilai-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="nilai-part"
                        id="nilai-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Nilai Rapor</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#pembayaran-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="pembayaran-part"
                        id="pembayaran-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Pembayaran</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#jadwal-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="jadwal-part"
                        id="jadwal-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Jadwal Tes</span>
                    </button>
                </div>

            </div>
            <div class="bs-stepper-content">
                <!-- your steps content here -->
                <div id="dasis-part" class="content active dstepper-block" role="tabpanel"
                    aria-labelledby="dasis-part-trigger">
                    <!-- Data Siswa  -->
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-teal card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="<?=base_url()?>assets/dist/img/user4-128x128.jpg"
                                            alt="User profile picture">
                                    </div>
                                    <?php
                                    // var_dump(CSB());
                                    ?>

                                    <h3 class="profile-username text-center"><?=CSB()->nama_lengkap?></h3>

                                    <p class="text-muted text-center"><?=CSB()->periode?> - <?=CSB()->tahap_daftar?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Jalur</b> <a class="float-right"><?=CSB()->jalur_name?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Unit</b> <a class="float-right"><?=CSB()->level_name?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Asrama</b> <a class="float-right"><?=CSB()->is_asrama?></a>
                                        </li>
                                    </ul>

                                    <a href="#" class="btn btn-primary btn-block"><b>Upload Foto</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-lg-9">
                            <div class="card card card-teal card-outline">
                                <div class="card-body">
                                    <!-- Biodata Awal  -->
                                    <div class="form-group row mb-0">
                                        <label for="nama" class="col-lg-2 col-form-label">Nama Lengkap <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <input type="text" name="nama" class="form-control form-control-sm"
                                                id="nama" value="<?=CSB()->nama_lengkap?>"
                                                placeholder="Contoh : Abdul Yamin">
                                        </div>
                                        <label for="nisn" class="col-lg-2 col-form-label">NISN <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <input type="text" name="nisn" class="form-control form-control-sm"
                                                id="nisn" value="<?=CSB()->nisn?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="tempat_lahir" class="col-lg-2 col-form-label">Tempat Lahir
                                            <span class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <input type="text" name="tampat_lahir" class="form-control form-control-sm"
                                                id="tempat_lahir" placeholder="Contoh : Padang">
                                        </div>
                                        <label for="tanggal_lahir" class="col-lg-2 col-form-label">Tanggal Lahir
                                            <span class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <input type="date" name="tanggal_lahir" class="form-control form-control-sm"
                                                id="tanggal_lahir" placeholder="Contoh : Padang">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="alamat_propinsi" class="col-lg-2 col-form-label">Propinsi
                                        </label>
                                        <div class="col-lg-4">
                                            <select class="form-control form-control-sm" id="provinceSelect">
                                                <option value="">Pilih Provinsi</option>
                                            </select>
                                        </div>
                                        <label for="alamat_kab" class="col-lg-2 col-form-label">Kab /
                                            Kota
                                        </label>
                                        <div class="col-lg-4">
                                            <select class="form-control form-control-sm" id="citySelect">
                                                <option value="">Pilih Kota/Kabupaten</option>
                                            </select>
                                            <div class="text-center">
                                                <div id="loadingCity" class="spinner-border spinner-border-sm"
                                                    role="status" style="display: none;">
                                                    <span class="sr-only">Sedang Memuat Kota/Kabupaten...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="alamat_kec" class="col-lg-2 col-form-label">Kecamatan
                                        </label>
                                        <div class="col-lg-4">
                                            <select class="form-control form-control-sm" id="districtSelect">
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                            <div class="text-center">
                                                <div id="loadingDistrict" class="spinner-border spinner-border-sm"
                                                    role="status" style="display: none;">
                                                    <span class="sr-only">Sedang Memuat Kecamatan...</span>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="alamat_desa" class="col-lg-2 col-form-label">Desa /
                                            Kelurahan
                                        </label>
                                        <div class="col-lg-4">
                                            <select class="form-control form-control-sm" id="villageSelect">
                                                <option value="">Pilih Desa/Kelurahan</option>
                                            </select>
                                            <div class="text-center">
                                                <div id="loadingVillage" class="spinner-border spinner-border-sm"
                                                    role="status" style="display: none;">
                                                    <span class="sr-only">Sedang Memuat Desa/Kelurahan...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-default bg-teal">
                                        Data Ayah Kandung
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="ayah_nama" class="col-lg-2 col-form-label">Nama Ayah <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="ayah_nama" class="form-control form-control-sm"
                                                id="ayah_nama" placeholder="Contoh : Abdul Yamin">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="ayah_pekerjaan_utama" class="col-lg-2 col-form-label">Pekerjaan
                                            <span class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <select name="ayah_pekerjaan_utama" class="form-control form-control-sm"
                                                id="ayah_pekerjaan_utama">
                                                <?php
                                foreach (TabelMaster('m_pekerjaan') as $m) {?>
                                                <option value="<?=$m['pekerjaan']?>"><?=$m['pekerjaan']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label for="ayah_penghasilan_rata_perbulan"
                                            class="col-lg-2 col-form-label">Penghasilan
                                            Perbulan<span class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <select name="ayah_penghasilan_rata_perbulan"
                                                class="form-control form-control-sm"
                                                id="ayah_penghasilan_rata_perbulan">
                                                <?php
                                foreach (TabelMaster('m_penghasilan') as $m) {?>
                                                <option value="<?=$m['penghasilan']?>"><?=$m['penghasilan']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Data Ayah  -->
                                    <div class="alert alert-default bg-teal">
                                        Data Ibu Kandung
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="ibu_nama" class="col-lg-2 col-form-label">Nama Ibu <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="ibu_nama" class="form-control form-control-sm"
                                                id="ibu_nama" placeholder="Contoh : Hamiatul Asmawati">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="ibu_pekerjaan_utama" class="col-lg-2 col-form-label">Pekerjaan <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <select name="ibu_pekerjaan_utama" class="form-control form-control-sm"
                                                id="ibu_pekerjaan_utama">
                                                <?php
                                foreach (TabelMaster('m_pekerjaan') as $m) {?>
                                                <option value="<?=$m['pekerjaan']?>"><?=$m['pekerjaan']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label for="ibu_penghasilan_rata_perbulan"
                                            class="col-lg-2 col-form-label">Penghasilan
                                            Perbulan<span class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <select name="ibu_penghasilan_rata_perbulan"
                                                class="form-control form-control-sm" id="ibu_penghasilan_rata_perbulan">
                                                <?php
                                foreach (TabelMaster('m_penghasilan') as $m) {?>
                                                <option value="<?=$m['penghasilan']?>"><?=$m['penghasilan']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Biodata Awal  -->
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- End Data Siswa  -->
                    <div class="text-right">

                        <button class="btn btn-default bg-teal mt-3 mb-3" onclick="SaveDasis()"> Selanjutnya <i
                                class="fas fa-arrow-right"></i> </button>
                    </div>
                </div>
                <div id="nilai-part" class="content" role="tabpanel" aria-labelledby="nilai-part-trigger">

                    Nilai
                    <div class="row mt-3">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-primary btn-block" onclick="stepper.previous()"><i
                                            class="fas fa-arrow-left"></i> Sebelumnya</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-default bg-teal btn-block"
                                        onclick="stepper.next()">Selanjutnya <i class="fas fa-arrow-right"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Data Orang Tua  -->
                </div>
                <div id="pembayaran-part" class="content" role="tabpanel" aria-labelledby="pembayaran-part-trigger">
                    <!-- Sekolah Asal  -->
                    Pembayaran
                    <div class="row mt-3">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-primary btn-block" onclick="stepper.previous()"><i
                                            class="fas fa-arrow-left"></i> Sebelumnya</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-default bg-teal btn-block"
                                        onclick="stepper.next()">Selanjutnya <i class="fas fa-arrow-right"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sekolah Asal  -->
                </div>
                <div id="jadwal-part" class="content" role="tabpanel" aria-labelledby="jadwal-part-trigger">
                    <!-- Sekolah Asal  -->
                    Jadwal
                    <div class="row mt-3">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-primary btn-block" onclick="stepper.previous()"><i
                                            class="fas fa-arrow-left"></i> Sebelumnya</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-default bg-teal btn-block"
                                        onclick="stepper.next()">Selanjutnya <i class="fas fa-arrow-right"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sekolah Asal  -->
                </div>

            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



<!-- /.content -->
<!-- <script src="<?=base_url()?>assets/js/wilayah.js"></script> -->
<script>
function SaveDasis() {
    stepper.next()
    // alert('ooo')
}
$(document).ready(function() {
    // Di bagian untuk mengambil data provinsi
    $.getJSON('https://ocikyamin.github.io/api-wilayah-indonesia/api/provinces.json', function(data) {
        var $provinceSelect = $('#provinceSelect');
        $.each(data, function(index, province) {
            $provinceSelect.append('<option value="' + province.id + '">' + province.name +
                '</option>');
        });
    });


    // Menggunakan event onChange untuk mengambil data kota/kabupaten saat provinsi dipilih
    $('#provinceSelect').change(function() {
        var selectedProvinceId = $(this).val();
        var $loadingCity = $('#loadingCity');

        if (selectedProvinceId) {
            $loadingCity.show();
            // Mengambil data kota/kabupaten berdasarkan id provinsi
            $.getJSON('https://ocikyamin.github.io/api-wilayah-indonesia/api/regencies/' +
                selectedProvinceId + '.json',
                function(data) {
                    var $citySelect = $('#citySelect');
                    $citySelect.empty().append(
                        '<option value="">Pilih Kota/Kabupaten</option>');
                    $.each(data, function(index, city) {
                        $citySelect.append('<option value="' + city.id + '">' + city
                            .name + '</option>');
                    });
                    $loadingCity.hide();
                });
        } else {
            // Mengosongkan pilihan kota/kabupaten jika provinsi tidak dipilih
            $('#citySelect').empty().append('<option value="">Pilih Kota/Kabupaten</option>');
        }
    });

    // Menggunakan event onChange untuk mengambil data kecamatan saat kota/kabupaten dipilih
    $('#citySelect').change(function() {
        var selectedCityId = $(this).val();
        var $loadingDistrict = $('#loadingDistrict');

        if (selectedCityId) {
            $loadingDistrict.show();
            // Mengambil data kecamatan berdasarkan id kota/kabupaten
            $.getJSON('https://ocikyamin.github.io/api-wilayah-indonesia/api/districts/' +
                selectedCityId + '.json',
                function(data) {
                    var $districtSelect = $('#districtSelect');
                    $districtSelect.empty().append('<option value="">Pilih Kecamatan</option>');
                    $.each(data, function(index, district) {
                        $districtSelect.append('<option value="' + district.id + '">' +
                            district.name + '</option>');
                    });
                    $loadingDistrict.hide();
                });

        } else {
            // Mengosongkan pilihan kecamatan jika kota/kabupaten tidak dipilih
            $('#districtSelect').empty().append('<option value="">Pilih Kecamatan</option>');
        }
    });

    // Menggunakan event onChange untuk mengambil data desa/kelurahan saat kecamatan dipilih
    $('#districtSelect').change(function() {
        var selectedDistrictId = $(this).val();
        var $loadingVillage = $('#loadingVillage');
        if (selectedDistrictId) {
            $loadingVillage.show();

            // Mengambil data desa/kelurahan berdasarkan id kecamatan
            $.getJSON('https://ocikyamin.github.io/api-wilayah-indonesia/api/villages/' +
                selectedDistrictId + '.json',
                function(data) {
                    var $villageSelect = $('#villageSelect');
                    $villageSelect.empty().append(
                        '<option value="">Pilih Desa/Kelurahan</option>');
                    $.each(data, function(index, village) {
                        $villageSelect.append('<option value="' + village.id + '">' +
                            village.name + '</option>');
                    });
                    $loadingVillage.hide();
                });
        } else {
            // Mengosongkan pilihan desa/kelurahan jika kecamatan tidak dipilih
            $('#villageSelect').empty().append('<option value="">Pilih Desa/Kelurahan</option>');
        }
    });
});
</script>
<?= $this->endSection() ?>