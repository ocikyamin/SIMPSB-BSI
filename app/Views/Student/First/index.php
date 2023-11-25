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
        <div class="row mb-2">
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
                <!-- <div class="line"></div> -->
                <div class="step" data-target="#ortu-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="ortu-part"
                        id="ortu-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Data Orang Tua</span>
                    </button>
                </div>
                <div class="step" data-target="#nilai-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="nilai-part"
                        id="nilai-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Nilai Rapor</span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <!-- your steps content here -->
                <div id="dasis-part" class="content active dstepper-block" role="tabpanel"
                    aria-labelledby="dasis-part-trigger">
                    <!-- Data Siswa  -->

                    <div class="form-group row mb-0">
                        <label for="nama" class="col-lg-2 col-form-label">Nama Lengkap <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="nama" class="form-control form-control-sm" id="nama"
                                placeholder="Contoh : Abdul Yamin">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="nokk" class="col-lg-2 col-form-label">No.KK <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="nokk" class="form-control form-control-sm" id="nokk"
                                placeholder="Nomor Kartu Keluarga">
                        </div>
                        <label for="nik" class="col-lg-2 col-form-label">NIK <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="nik" class="form-control form-control-sm" id="nik"
                                placeholder="Nomor Induk Kependudukan">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="nisn" class="col-lg-2 col-form-label">NISN <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="nisn" class="form-control form-control-sm" id="nisn"
                                placeholder="Nomor Induk Siswa Nasional">
                        </div>
                        <label for="kip" class="col-lg-2 col-form-label">KIP</label>
                        <div class="col-lg-4">
                            <input type="text" name="kip" class="form-control form-control-sm" id="kip"
                                placeholder="Kartu Indonesia Pintar">
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
                        <label for="jumlah_saudara" class="col-lg-2 col-form-label">Jumlah
                            Saudara
                            <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="number" name="jumlah_saudara" class="form-control form-control-sm"
                                id="jumlah_saudara" placeholder="00">
                        </div>
                        <label for="anak_ke" class="col-lg-2 col-form-label">Anake Ke-
                            <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="number" name="anak_ke" class="form-control form-control-sm" id="anak_ke"
                                placeholder="00">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="hobi" class="col-lg-2 col-form-label">Hobi
                            <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="hobi" class="form-control form-control-sm" id="hobi"
                                placeholder="Contoh : Membaca, Menulis">
                        </div>
                        <label for="cita_cita" class="col-lg-2 col-form-label">Cita-cita
                            <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="cita_cita" class="form-control form-control-sm" id="cita_cita"
                                placeholder="Contoh : Polisi, Pengusaha">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="no_handphone" class="col-lg-2 col-form-label">No.HP
                        </label>
                        <div class="col-lg-4">
                            <input type="number" name="no_handphone" class="form-control form-control-sm"
                                id="no_handphone" placeholder="Contoh : 6282214607669">
                        </div>
                        <label for="alamat_email" class="col-lg-2 col-form-label">E-Mail
                        </label>
                        <div class="col-lg-4">
                            <input type="text" name="alamat_email" class="form-control form-control-sm"
                                id="alamat_email" placeholder="Contoh : yamin@gmail.com">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="yang_biayai_sekolah" class="col-lg-2 col-form-label">Yang
                            Biayai
                            Sekolah ?
                        </label>
                        <div class="col-lg-10">
                            <select name="yang_biayai_sekolah" class="form-control form-control-sm"
                                id="yang_biayai_sekolah">
                                <option value="">Pilih</option>
                                <option value="">Orang Tua</option>
                                <option value="">Wali</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row mb-0">
                        <label for="kebutuhan_disabilitas" class="col-lg-2 col-form-label">Kebutuhan
                            Disabilitas
                        </label>
                        <div class="col-lg-4">
                            <select name="kebutuhan_disabilitas" class="form-control form-control-sm"
                                id="kebutuhan_disabilitas">
                                <option value="">Pilih</option>
                                <option value="">Orang Tua</option>
                                <option value="">Wali</option>
                            </select>
                        </div>
                        <label for="kebutuhan_khusus" class="col-lg-2 col-form-label">Kebutuhan
                            Khusus
                        </label>
                        <div class="col-lg-4">
                            <select name="kebutuhan_khusus" class="form-control form-control-sm" id="kebutuhan_khusus">
                                <option value="">Pilih</option>
                                <option value="">Orang Tua</option>
                                <option value="">Wali</option>
                            </select>
                        </div>
                    </div>
                    <div class="alert alert-default bg-teal mt-2">Tempat Tinggal Siswa</div>
                    <div class="form-group row mb-0">
                        <label for="alamat_jalan" class="col-lg-2 col-form-label">Nama Jalan
                        </label>
                        <div class="col-lg-4">
                            <input type="number" name="alamat_jalan" class="form-control form-control-sm"
                                id="alamat_jalan" placeholder="Contoh : 6282214607669">
                        </div>
                        <label for="alamat_pos" class="col-lg-2 col-form-label">Kode POS
                        </label>
                        <div class="col-lg-4">
                            <input type="text" name="alamat_pos" class="form-control form-control-sm" id="alamat_pos"
                                placeholder="0000">
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
                        <label for="alamat_kab" class="col-lg-2 col-form-label">Kabupaten /
                            Kota
                        </label>
                        <div class="col-lg-4">
                            <select class="form-control form-control-sm" id="citySelect">
                                <option value="">Pilih Kota/Kabupaten</option>
                            </select>
                            <div class="text-center">
                                <div id="loadingCity" class="spinner-border spinner-border-sm" role="status"
                                    style="display: none;">
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
                                <div id="loadingDistrict" class="spinner-border spinner-border-sm" role="status"
                                    style="display: none;">
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
                                <div id="loadingVillage" class="spinner-border spinner-border-sm" role="status"
                                    style="display: none;">
                                    <span class="sr-only">Sedang Memuat Desa/Kelurahan...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-default bg-teal mt-2">Data Sekolah Asal</div>
                    <!-- Sekolah Asal  -->

                    <div class="form-group row mb-0">
                        <label for="sekolah_nama" class="col-lg-2 col-form-label">Nama Sekolah<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="sekolah_nama" class="form-control form-control-sm"
                                id="sekolah_nama" placeholder="Contoh : MIN 1 Mukomuko">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="sekolah_npsn" class="col-lg-2 col-form-label">NPSN<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="sekolah_npsn" class="form-control form-control-sm"
                                id="sekolah_npsn" placeholder="00000">
                        </div>
                        <label for="sekolah_status" class="col-lg-2 col-form-label">Status<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select name="sekolah_status" class="form-control form-control-sm" id="sekolah_status">
                                <option value="">Pilih</option>
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">

                        <label for="sekolah_alamat" class="col-lg-2 col-form-label">Alamat Sekolah<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="sekolah_alamat" class="form-control form-control-sm"
                                id="sekolah_alamat"
                                placeholder="Contoh : Jl. Melati No.5 Desa Sibak, Kec. Ipuh, Kab. Mukomuko, Prov. Bengkulu">
                        </div>
                    </div>

                    <!-- End Data Siswa  -->
                    <div class="text-right">

                        <button class="btn btn-default bg-teal mt-3 mb-3" onclick="SaveDasis()"> Selanjutnya <i
                                class="fas fa-arrow-right"></i> </button>
                    </div>


                </div>
                <div id="ortu-part" class="content" role="tabpanel" aria-labelledby="ortu-part-trigger">
                    <!-- Data Orang Tua  -->
                    <p>
                    <div class="alert alert-default bg-teal">
                        Data Ayah Kandung
                    </div>
                    </p>
                    <div class="form-group row mb-0">
                        <label for="ayah_nama" class="col-lg-2 col-form-label">Nama Lengkap Ayah <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="ayah_nama" class="form-control form-control-sm" id="ayah_nama"
                                placeholder="Contoh : Abdul Yamin">
                        </div>
                        <label for="ayah_nik" class="col-lg-2 col-form-label">NIK <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="number" name="ayah_nik" class="form-control form-control-sm" id="ayah_nik"
                                placeholder="Nomor Induk Kependudukan">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="ayah_tempat_lahir" class="col-lg-2 col-form-label">Tempat Lahir<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="ayah_tempat_lahir" class="form-control form-control-sm"
                                id="ayah_tempat_lahir" placeholder="Contoh : Jakrta">
                        </div>
                        <label for="ayah_tanggal_lahir" class="col-lg-2 col-form-label">Tanggal Lahir <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="date" name="ayah_tanggal_lahir" class="form-control form-control-sm"
                                id="ayah_tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="ayah_pendidikan_terakhir" class="col-lg-2 col-form-label">Pendidikan Terakhir<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="ayah_pendidikan_terakhir" class="form-control form-control-sm"
                                id="ayah_pendidikan_terakhir" placeholder="Contoh : S1">
                        </div>
                        <label for="ayah_pekerjaan_utama" class="col-lg-2 col-form-label">Pekerjaan <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select name="ayah_pekerjaan_utama" class="form-control form-control-sm"
                                id="ayah_pekerjaan_utama">
                                <?php
                                foreach (TabelMaster('m_pekerjaan') as $m) {?>
                                <option value="<?=$m['pekerjaan']?>"><?=$m['pekerjaan']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="ayah_penghasilan_rata_perbulan" class="col-lg-2 col-form-label">Penghasilan
                            Perbulan<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select name="ayah_penghasilan_rata_perbulan" class="form-control form-control-sm"
                                id="ayah_penghasilan_rata_perbulan">
                                <?php
                                foreach (TabelMaster('m_penghasilan') as $m) {?>
                                <option value="<?=$m['penghasilan']?>"><?=$m['penghasilan']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="ayah_no_handphone" class="col-lg-2 col-form-label">No. Handphone <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="ayah_no_handphone" class="form-control form-control-sm"
                                id="ayah_no_handphone" placeholder="Contoh : 622122551928">
                        </div>
                    </div>
                    <!-- Data Ayah  -->
                    <p>
                    <div class="alert alert-default bg-teal">
                        Data Ibu Kandung
                    </div>
                    </p>
                    <div class="form-group row mb-0">
                        <label for="ibu_nama" class="col-lg-2 col-form-label">Nama Lengkap Ibu <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="ibu_nama" class="form-control form-control-sm" id="ibu_nama"
                                placeholder="Contoh : Hamiatul Asmawati">
                        </div>
                        <label for="ibu_nik" class="col-lg-2 col-form-label">NIK <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="number" name="ibu_nik" class="form-control form-control-sm" id="ibu_nik"
                                placeholder="Nomor Induk Kependudukan">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="ibu_tempat_lahir" class="col-lg-2 col-form-label">Tempat Lahir<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="ibu_tempat_lahir" class="form-control form-control-sm"
                                id="ibu_tempat_lahir" placeholder="Contoh : Jakrta">
                        </div>
                        <label for="ibu_tanggal_lahir" class="col-lg-2 col-form-label">Tanggal Lahir <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="date" name="ibu_tanggal_lahir" class="form-control form-control-sm"
                                id="ibu_tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="ibu_pendidikan_terakhir" class="col-lg-2 col-form-label">Pendidikan Terakhir<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="ibu_pendidikan_terakhir" class="form-control form-control-sm"
                                id="ibu_pendidikan_terakhir" placeholder="Contoh : S1">
                        </div>
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
                    </div>
                    <div class="form-group row mb-0">
                        <label for="ibu_penghasilan_rata_perbulan" class="col-lg-2 col-form-label">Penghasilan
                            Perbulan<span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select name="ibu_penghasilan_rata_perbulan" class="form-control form-control-sm"
                                id="ibu_penghasilan_rata_perbulan">
                                <?php
                                foreach (TabelMaster('m_penghasilan') as $m) {?>
                                <option value="<?=$m['penghasilan']?>"><?=$m['penghasilan']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="ibu_no_handphone" class="col-lg-2 col-form-label">No. Handphone <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="ibu_no_handphone" class="form-control form-control-sm"
                                id="ibu_no_handphone" placeholder="Contoh : 622122551928">
                        </div>
                    </div>

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
                <div id="nilai-part" class="content" role="tabpanel" aria-labelledby="nilai-part-trigger">
                    <!-- Sekolah Asal  -->

                    <div class="form-group row mb-0">
                        <label for="sekolah_nama" class="col-lg-2 col-form-label">Nama Sekolah<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="sekolah_nama" class="form-control form-control-sm"
                                id="sekolah_nama" placeholder="Contoh : MIN 1 Mukomuko">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="sekolah_npsn" class="col-lg-2 col-form-label">NPSN<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" name="sekolah_npsn" class="form-control form-control-sm"
                                id="sekolah_npsn" placeholder="00000">
                        </div>
                        <label for="sekolah_status" class="col-lg-2 col-form-label">Status<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select name="sekolah_status" class="form-control form-control-sm" id="sekolah_status">
                                <option value="">Pilih</option>
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">

                        <label for="sekolah_alamat" class="col-lg-2 col-form-label">Alamat Sekolah<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="sekolah_alamat" class="form-control form-control-sm"
                                id="sekolah_alamat"
                                placeholder="Contoh : Jl. Melati No.5 Desa Sibak, Kec. Ipuh, Kab. Mukomuko, Prov. Bengkulu">
                        </div>
                    </div>

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