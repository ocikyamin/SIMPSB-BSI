<?= $this->extend('Landing/Template') ?>

<?= $this->section('content') ?>
<!-- icheck bootstrap -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css">
<!-- Header Start -->
<div class="container-fluid hero-header bg-light mb-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <h1 class="display-6 mb-1 mt-3 animated slideInDown">Register</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-3">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<?php
    // Get Nomor Pendaftaran 
     $nomorReg = nomorRegister();
if (StatusPeriode()==NULL) {
?>
<div class="text-center">
    <img src="<?=base_url('assets/logo/status.png')?>" class="mt-3 mb-2" alt="Status Daftar">
    <div>
        <h3>Mohon Maaf !
            <div><b>Pendaftaran Telah ditutup / Belum dibuka !</b></div>
        </h3>
    </div>
    <div>
        <a href="<?=base_url()?>" class="btn btn-default shadow"><i class="fa fa-home"></i> Kembali</a>
    </div>
</div>

<?php
}else{
    // Tampilkan Form jija status pendaftaran Aktif 
    ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="bs-stepper linear">
                <div class="bs-stepper-header table-responsive" role="tablist">
                    <!-- your steps here -->
                    <div class="step active" data-target="#daftar-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="daftar-part"
                            id="daftar-part-trigger" aria-selected="true">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Opsi Pendaftaran</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#akun-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="akun-part"
                            id="akun-part-trigger" aria-selected="false" disabled="disabled">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">indentitas</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#alamat-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="alamat-part"
                            id="alamat-part-trigger" aria-selected="false" disabled="disabled">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Alamat</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content px-2">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <p>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Perhatian !</strong> Harap mengisi data dengan teliti dan benar. Siapkan
                                KK dan RAPOR untuk memudahkan proses pengisian data.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            </p>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <form method="post" id="register-form" novalidate>
                        <?= csrf_field() ?>
                        <input type="hidden" name="master_periode_id" value="<?=StatusPeriode()->id?>">
                        <input type="hidden" name="noreg" id="noreg" class="form-control" value="<?= $nomorReg ?>">
                        <!-- your steps content here -->
                        <div id="daftar-part" class="content active dstepper-block" role="tabpanel"
                            aria-labelledby="daftar-part-trigger">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">

                                    <div class="form-group row mb-2">
                                        <label for="master_jalur_id" class="col-lg-3">Jalur Pendaftaran</label>
                                        <div class="col-lg-4">
                                            <select name="master_jalur_id" class="form-select bg-light"
                                                id="master_jalur_id">
                                                <option value="">Pilih Jalur Pendaftaran</option>
                                                <?php
                                        foreach (TabelMasterStatus('master_jalur') as $m) {?>
                                                <option value="<?=$m['id']?>"><?=$m['jalur_name']?></option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                            <div class="invalid-feedback" id="master_jalur_id_error"></div>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-2">
                                        <label for="master_school_level_id" class="col-lg-3">Jenjang Pendidikan
                                            Tujuan</label>
                                        <div class="col-lg-4">
                                            <select name="master_school_level_id" class="form-select bg-light"
                                                id="master_school_level_id">
                                                <option value="">Pilih Jenjang Pendidikan
                                                    Tujuan</option>
                                                <?php
                                        foreach (TabelMasterStatus('master_school_level') as $m) {?>
                                                <option value="<?=$m['id']?>"><?=$m['level_name']?>
                                                    (<?=$m['description']?>)
                                                </option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                            <div class="invalid-feedback" id="master_school_level_id_error"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label for="master_jenis_sekolah_asal_id" class="col-lg-3">Jenis Sekolah
                                            Asal</label>
                                        <div class="col-lg-4">
                                            <select name="master_jenis_sekolah_asal_id" class="form-select bg-light"
                                                id="master_jenis_sekolah_asal_id">
                                                <option value="">Pilih Jenis Sekolah Asal</option>
                                                <?php
                                        foreach (TabelMaster('master_jenis_sekolah_asal') as $m) {?>
                                                <option value="<?=$m['id']?>"><?=$m['sttb']?>
                                                </option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                            <div class="invalid-feedback" id="master_jenis_sekolah_asal_id_error"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label for="m_referensi_id" class="col-lg-3">Referensi (Sumber
                                            Informasi)</label>
                                        <div class="col-lg-4">
                                            <select name="m_referensi_id" class="form-select bg-light"
                                                id="m_referensi_id">
                                                <option value="">Pilih Sumber
                                                    Informasi</option>
                                                <?php
                                        foreach (TabelMaster('m_referensi') as $m) {?>
                                                <option value="<?=$m['id']?>"><?=$m['nama_referensi']?>
                                                </option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                            <div class="invalid-feedback" id="m_referensi_id_error"></div>
                                        </div>
                                    </div>



                                    <div class="form-group row mb-2">
                                        <label for="whatsapp" class="col-lg-3">Nomor WhatsApp (Aktif)</label>
                                        <div class="col-lg-4">
                                            <small class="text-success text-wrap">Pastikan nomor WA aktif dan benar
                                                sesuai
                                                dengan
                                                format contoh. Sistem akan
                                                mengirim Notifikasi untuk berbagai informasi pendafataran.
                                            </small>
                                            <input type="number" name="whatsapp" id="whatsapp"
                                                class="form-control bg-light" placeholder="Contoh : 082122551928">
                                            <div class="invalid-feedback" id="whatsapp_error"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3"></label>
                                        <div class="col-lg-4">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" type="button"
                                                    onclick="stepper.next()">Lanjutkan
                                                    <i class="fas fa-arrow-right me-2"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="akun-part" class="content" role="tabpanel" aria-labelledby="akun-part-trigger">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3">Nomor Induk Siswa Nasional (NISN)</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-graduation-cap"></i></span>
                                                <input type="text" name="nisn" id="nisn" class="form-control bg-light"
                                                    placeholder="Contoh : 10011993009">
                                                <div class="invalid-feedback" id="nisn_error"></div>
                                            </div>
                                            <small>
                                                <div>Cek NISN:
                                                    <a href="https://nisn.data.kemdikbud.go.id/"
                                                        target="_blank">https://nisn.data.kemdikbud.go.id/</a>
                                                </div>
                                            </small>
                                        </div>

                                    </div>
                                    <!-- NISN -->

                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3">Nama Lengkap Calon Santri</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                    class="form-control bg-light"
                                                    placeholder="Contoh : Mizyana Abella Umni">
                                                <div class="invalid-feedback" id="nama_lengkap_error"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3">Tempat Lahir</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-map-marker-alt"></i></span>
                                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                    class="form-control" placeholder="Contoh : Jakarta">
                                                <div class="invalid-feedback" id="tempat_lahir_error"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3">Tanggal Lahir</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                    class="form-control bg-light">
                                                <div class="invalid-feedback" id="tanggal_lahir_error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Nama Lengkap -->

                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3">Gender</label>
                                        <div class="col-lg-4">
                                            <div class="text-danger text-sm" id="gender_error"></div>
                                            <div class="input-group">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-info d-inline">
                                                        <input type="radio" id="jk-lk" name="gender" value="L">
                                                        <label for="jk-lk">
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" id="jk-pr" name="gender" value="P">
                                                        <label for="jk-pr">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-lg-3">Rencana Tinggal Asrama ?</label>
                                        <!-- <div class="col-lg-4">
                                            <div class="text-danger text-sm mt-0" id="is_asrama_error"></div>
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="asrama-ya" name="is_asrama" value="Y">
                                                    <label for="asrama-ya">
                                                        Ya
                                                    </label>
                                                </div>
                                                <div class="icheck-warning d-inline">
                                                    <input type="radio" id="asrama-no" name="is_asrama" value="N">
                                                    <label for="asrama-no">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->


                                        <div class="col-lg-4">
                                            <select name="is_asrama" class="form-select bg-light" id="is_asrama">
                                                <option value="">Pilih Rencana Tinggal</option>
                                                <option value="Y">Ya</option>
                                                <option value="N">Tidak</option>
                                            </select>
                                            <div class="invalid-feedback" id="is_asrama_error"></div>
                                        </div>
                                    </div>
                                    <!-- Gender -->
                                    <div class="form-group row mt-3">
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-4">
                                            <button type="button" class="btn btn-default"
                                                onclick="stepper.previous()"><i class="fas fa-arrow-left me-2"></i>
                                                Sebelumnya</button>
                                            <button class="btn btn-primary" type="button"
                                                onclick="stepper.next()">Lanjutkan
                                                <i class="fas fa-arrow-right me-2"></i></button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="alamat-part" class="content" role="tabpanel" aria-labelledby="alamat-part-trigger">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">

                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3" for="provinsi_id">Propinsi </label>
                                        <div class="col-lg-4">
                                            <select name="provinsi_id" class="form-control bg-light" id="provinsi_id">
                                                <option value="">Pilih Provinsi</option>
                                            </select>
                                            <div class="invalid-feedback" id="provinsi_id_error"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3" for="kabupaten_id">Kota /
                                            Kabupaten</label>
                                        <div class="col-lg-4">
                                            <select name="kabupaten_id" class="form-control bg-light" id="kabupaten_id"
                                                data-bs-toggle="spinner" data-bs-size="sm">
                                                <option value="">Pilih Kota/Kabupaten</option>
                                            </select>
                                            <div class="invalid-feedback" id="kabupaten_id_error"></div>
                                            <div class="text-center">
                                                <div id="loadingCity"
                                                    class="spinner-border text-primary spinner-border-sm" role="status"
                                                    style="display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3" for="kecamatan_id">Kecamatan
                                        </label>
                                        <div class="col-lg-4">
                                            <select name="kecamatan_id" class="form-control bg-light" id="kecamatan_id">
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                            <div class="invalid-feedback" id="kecamatan_id_error"></div>
                                            <div class="text-center">
                                                <div id="loadingDistrict"
                                                    class="spinner-border text-primary spinner-border-sm" role="status"
                                                    style="display: none;">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3" for="desa_id">Desa /
                                            Kelurahan
                                        </label>
                                        <div class="col-lg-4">
                                            <select name="desa_id" class="form-control bg-light" id="desa_id">
                                                <option value="">Pilih Desa/Kelurahan</option>
                                            </select>
                                            <div class="invalid-feedback" id="desa_id_error"></div>
                                            <div class="text-center">
                                                <div id="loadingVillage"
                                                    class="spinner-border text-primary spinner-border-sm" role="status"
                                                    style="display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-lg-3" for="alamat_jalan">Nama Jalan / Dusun / Jorong
                                        </label>
                                        <div class="col-lg-4">
                                            <input type="text" name="alamat_jalan" id="alamat_jalan"
                                                class="form-control bg-light"
                                                placeholder="Contoh : Jl. Pendidikan No.1">
                                            <div class="invalid-feedback" id="alamat_jalan_error"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-lg-3" for="alamat_pos">Kode POS
                                        </label>
                                        <div class="col-lg-4">
                                            <input type="number" name="alamat_pos" id="alamat_pos"
                                                class="form-control bg-light" placeholder="0000">
                                            <div class="invalid-feedback" id="alamat_pos_error"></div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-4">
                                            <button type="button" class="btn btn-default"
                                                onclick="stepper.previous()"><i class="fas fa-arrow-left me-2"></i>
                                                Sebelumnya</button>
                                            <button type="submit" id="RegisterNow" class="btn btn-primary"><i
                                                    class="far fa-check-circle me-2"></i> Daftar Sekarang
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3 mb-3">
                Saya Sudah Mendaftar ? <a href="<?=base_url('login')?>" class="text-center text-primary"> Login </a>

            </div>

        </div>
        <!-- /.form-box -->

    </div><!-- /.card -->

</div>
<!-- /.register-box -->

<?php


}
?>


<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- BS-Stepper -->
<script src="<?=base_url()?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
<script>
$(document).ready(function() {
    OpsiProvinsi()
});

function OpsiProvinsi() {
    $.ajax({
        url: "<?=base_url('wilayah/provinsi')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            if (response.prov) {
                $('#provinsi_id').html('<option value="">Pilih Provinsi</option>' + response
                    .prov)
            } else {
                $('#provinsi_id').html('<option value="">Pilih Provinsi</option>')
            }
        }
    });
}

// Ketika Provinsi dipilih 
$('#provinsi_id').change(function(e) {
    e.preventDefault();
    if ($(this).val() !== "") {
        $('#loadingCity').show(); // Tampilkan spinner saat AJAX dimulai
        $.ajax({
            url: "<?= base_url('wilayah/kabupaten') ?>",
            data: {
                prov_id: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.kab) {
                    $('#kabupaten_id').html('<option value="">Pilih Kabupaten</option>' + response
                        .kab)
                } else {
                    $('#kabupaten_id').html('<option value="">Pilih Kabupaten</option>')
                }
            },
            complete: function() {
                $('#loadingCity').hide(); // Sembunyikan spinner setelah AJAX selesai
            }
        });
    } else {
        $('#kabupaten_id').html('<option value="">Pilih Kabupaten</option>')
        $('#kecamatan_id').html('<option value="">Pilih Kecamatan</option>')
        $('#desa_id').html('<option value="">Pilih Desa / Kelurahan</option>')
    }
});

// Ketika Kabupaten dipilih 
$('#kabupaten_id').change(function(e) {
    e.preventDefault();
    if ($(this).val() !== "") {
        $('#loadingDistrict').show();
        $.ajax({
            url: "<?=base_url('wilayah/kecamatan')?>",
            data: {
                kab_id: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.kec) {
                    $('#kecamatan_id').html('<option value="">Pilih Kecamatan</option>' + response
                        .kec)
                } else {
                    $('#kecamatan_id').html('<option value="">Pilih Kecamatan</option>')
                }
            },
            complete: function() {
                $('#loadingDistrict').hide();
            }
        });
    } else {
        $('#kecamatan_id').html('<option value="">Pilih Kecamatan</option>')
        $('#desa_id').html('<option value="">Pilih Desa / Kelurahan</option>')

    }



});
// Ketika Kecamatan dipilih 
$('#kecamatan_id').change(function(e) {
    e.preventDefault();
    if ($(this).val() !== "") {
        $('#loadingVillage').show()
        $.ajax({
            url: "<?=base_url('wilayah/desa')?>",
            data: {
                kec_id: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.desa) {
                    $('#desa_id').html('<option value="">Pilih Desa / Kelurahan</option>' +
                        response
                        .desa)
                } else {
                    $('#desa_id').html('<option value="">Pilih Desa / Kelurahan</option>')
                }
            },
            complete: function() {
                $('#loadingVillage').hide();

            }
        });
    } else {
        $('#desa_id').html('<option value="">Pilih Desa / Kelurahan</option>')

    }


});
</script>


<!-- <script src="<?=base_url()?>assets/js/wilayah.js"></script> -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})
$('#register-form').submit(function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Konfirmasi Apakah data sudah benar ?',
        text: ` Saya setuju bahwa seluruh data yang saya isikan dan/atau unggah adalah
            benar,
            sah,
            legal dan / atau sesuai dengan keadaan dan / atau kenyataan
            sebenarnya.
            `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#20c997',
        cancelButtonColor: '#1f2937',
        confirmButtonText: 'Ya, Lanjutkan Pendaftaran',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('register/create') ?>', // Sesuaikan dengan URL controller Anda
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#RegisterNow').prop('disabled', true);
                    $('#RegisterNow').html(
                        `<i class="fa fa-spin fa-spinner"></i>`
                    );
                },
                complete: function() {
                    // $('#RegisterNow').show();
                    $('#RegisterNow').prop('disabled', false);
                    $('#RegisterNow').html(`<i
                                        class="far fa-check-circle"></i> Daftar Sekarang`);
                },
                success: function(response) {
                    // response = JSON.parse(response); 
                    // Parse respons JSON

                    if (response.status === "error") {
                        $('.is-invalid').removeClass('is-invalid');
                        // Terdapat kesalahan validasi
                        for (var field in response) {
                            if (field !== "status" && response[field]) {
                                toastr.error(response[field])
                                // Tampilkan pesan kesalahan pada elemen dengan ID yang sesuai
                                $("#" + field + "_error").html(response[field]);
                                $('#' + field).addClass('is-invalid');
                                // $('#' + field + '_error').html(value);
                            }
                        }
                    } else if (response.status === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terimakasih ! Anda Telah Berhasil Membuat Akun Baru',
                            text: response.message,
                            showCancelButton: false,
                            confirmButtonColor: '#41d1a7',
                            confirmButtonText: 'Login Now !',

                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = './login';
                            }
                        })

                    }


                    // if (response.status === 'success') {
                    //     // Data berhasil disimpan, tampilkan pesan sukses
                    //     Swal.fire({
                    //         icon: 'success',
                    //         title: 'Terimakasih ! Anda Telah Berhasil Membuat Akun Baru',
                    //         text: response.message,
                    //         showCancelButton: false,
                    //         confirmButtonColor: '#41d1a7',
                    //         confirmButtonText: 'Login Now !',

                    //     }).then((result) => {
                    //         if (result.isConfirmed) {
                    //             window.location = './login';
                    //         }
                    //     })

                    // } else if (response.status === 'error') {
                    //     // Validasi gagal, tampilkan pesan kesalahan
                    //     // showToast(response.message, 'error');
                    //     toastr.error('Isian formulir masih belum lengkap.')

                    //     // Reset semua inputan dari kelas is-invalid
                    //     $('.is-invalid').removeClass('is-invalid');

                    //     // Tampilkan pesan kesalahan di bawah input yang sesuai
                    //     $.each(response.message, function(key, value) {
                    //         $('#' + key).addClass('is-invalid');
                    //         $('#' + key + '_error').html(value);
                    //     });
                    // }
                }
            });
        }
    })


});

// Ketentuan Jalur Pendaftaran 
$('#master_jalur_id').change(function(e) {
    info_jalur = $('#info-jalur');
    e.preventDefault();
    if ($(this).val() !== "") {
        $.ajax({
            type: "POST",
            url: "<?=base_url('register/info-syarat')?>",
            data: {
                id: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.info !== false) {
                    Swal.fire({
                        // position: 'top-end',Z
                        title: 'Syarat Jalur <strong class="text-info">' +
                            response.jalur
                            .jalur_name +
                            '</strong>',
                        // title: '<strong>HTML <u>example</u></strong>',
                        icon: 'info',
                        html: "<div class='text-left'><ol>" + response.info +
                            "</ol></div>",
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ya, Saya Memenuhi Persyaratan!',
                        // confirmButtonAriaLabel: 'Thumbs up, great!',
                        cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                        // cancelButtonAriaLabel: 'Thumbs down',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                }
            }
        });
    } else {
        $('#info-list').html('')
    }
});
</script>
<?= $this->endSection() ?>