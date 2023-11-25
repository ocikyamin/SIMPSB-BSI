<?= $this->extend('Student/layouts') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0">Biodata</h5>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<script>
// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})
</script>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <?php
// var_dump($status);
// var_dump($dasis);
?>

        <div class="bs-stepper linear">
            <div class="bs-stepper-header table-responsive mb-2" role="tablist">
                <!-- your steps here -->
                <div class="step active" data-target="#biodata-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="biodata-part"
                        id="biodata-part-trigger" aria-selected="true">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Biodata</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#infolus-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="infolus-part"
                        id="infolus-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Status Kelulusan</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#daftarulang-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="daftarulang-part"
                        id="daftarulang-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Daftar Ulang</span>
                    </button>
                </div>

            </div>
            <div class="bs-stepper-content text-sm">
                <!-- your steps content here -->
                <div id="biodata-part" class="content active dstepper-block" role="tabpanel"
                    aria-labelledby="biodata-part-trigger">
                    <!-- Info  -->
                    <div class="callout callout-success py-2">
                        <h5><i class="far fa-check-circle me-2"></i> Terimakasih Ananda telah mengikuti Tes.</h5>
                        <p>Mari lanjutkan dengan mengisi kelengkapan formulir
                            berikut. Harap isi sesuai dengan KK/AKTE/IJAZAH yang valid. Data yang telah dikirim tidak
                            dapat diubah kembali. Pastikan mengisi data dengan teliti dan benar.</p>
                    </div>
                    <!-- Info  -->
                    <!-- Biodata Santri  -->
                    <form id="form-biodata">
                        <?=csrf_field()?>
                        <input type="hidden" name="id" value="<?=$dasis->id?>">
                        <input type="hidden" name="csb_akun_id" value="<?=CSB()->id?>">
                        <div class="form-group row mb-0">
                            <label for="nokk" class="col-lg-2 col-form-label">No.KK <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="text" name="nokk" class="form-control form-control-sm" id="nokk"
                                    placeholder="Nomor Kartu Keluarga" value="<?=$dasis->nokk?>">
                                <div class="invalid-feedback" id="nokk_error"></div>
                            </div>
                            <label for="nik" class="col-lg-2 col-form-label">NIK <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="text" name="nik" class="form-control form-control-sm" id="nik"
                                    placeholder="Nomor Induk Kependudukan" value="<?=$dasis->nik?>">
                                <div class="invalid-feedback" id="nik_error"></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="jumlah_saudara" class="col-lg-2 col-form-label">Jumlah
                                Saudara
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="number" name="jumlah_saudara" class="form-control form-control-sm"
                                    id="jumlah_saudara" placeholder="00" value="<?=$dasis->jumlah_saudara?>">
                            </div>
                            <label for="anak_ke" class="col-lg-2 col-form-label">Anake Ke-
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="number" name="anak_ke" class="form-control form-control-sm" id="anak_ke"
                                    placeholder="00" value="<?=$dasis->anak_ke?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="hobi" class="col-lg-2 col-form-label">Hobi
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="text" name="hobi" class="form-control form-control-sm" id="hobi"
                                    placeholder="Contoh : Membaca, Menulis" value="<?=$dasis->hobi?>">
                            </div>
                            <label for="cita_cita" class="col-lg-2 col-form-label">Cita-cita
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="text" name="cita_cita" class="form-control form-control-sm" id="cita_cita"
                                    placeholder="Contoh : Polisi, Pengusaha" value="<?=$dasis->cita_cita?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="alamat_email" class="col-lg-2 col-form-label">E-Mail
                            </label>
                            <div class="col-lg-4">
                                <input type="text" name="alamat_email" class="form-control form-control-sm"
                                    id="alamat_email" placeholder="Contoh : yamin@gmail.com"
                                    value="<?=$dasis->alamat_email?>">
                            </div>
                            <label for="yang_membiayai_sekolah" class="col-lg-2 col-form-label">Yang
                                Biayai
                                Sekolah ?
                            </label>
                            <div class="col-lg-4">
                                <select name="yang_membiayai_sekolah" class="form-control form-control-sm"
                                    id="yang_membiayai_sekolah">
                                    <option value="">Pilih</option>
                                    <option value="Orang Tua"
                                        <?=$dasis->yang_membiayai_sekolah=='Orang Tua'?'selected':null?>>Orang Tua
                                    </option>
                                    <option value="Wali" <?=$dasis->yang_membiayai_sekolah=='Wali'?'selected':null?>>
                                        Wali
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-lg-2 col-form-label">Kebutuhan
                                Disabilitas
                            </label>
                            <div class="col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="kd-YA" name="kebutuhan_disabilitas" value="Ya"
                                            <?=$dasis->kebutuhan_disabilitas=='Ya' ? 'checked':null ?>>
                                        <label for="kd-YA">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="kd-Tidak" name="kebutuhan_disabilitas" value="Tidak"
                                            <?=$dasis->kebutuhan_disabilitas=='Tidak' ? 'checked':null ?>>
                                        <label for="kd-Tidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <label class="col-lg-2 col-form-label">Kebutuhan
                                Khusus
                            </label>
                            <div class="col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="kk-YA" name="kebutuhan_khusus" value="Ya"
                                            <?=$dasis->kebutuhan_khusus=='Ya'? 'checked':null ?>>
                                        <label for="kk-YA">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="kk-Tidak" name="kebutuhan_khusus" value="Tidak"
                                            <?=$dasis->kebutuhan_khusus=='Tidak'? 'checked':null ?>>
                                        <label for="kk-Tidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Alamat siswa  -->
                        <!-- <div class="alert alert-default bg-teal p-1 mb-1"><i class="fas fa-map-marked-alt"></i> Tempat
                            Tinggal
                            Siswa</div>
                        <div class="form-group row mb-0">
                            <label for="alamat_jalan" class="col-lg-2 col-form-label">Nama Jalan
                            </label>
                            <div class="col-lg-4">
                                <input type="text" name="alamat_jalan" class="form-control form-control-sm"
                                    id="alamat_jalan" placeholder="Contoh : Jl. Melati No.5"
                                    value="">
                            </div>
                            <label for="alamat_pos" class="col-lg-2 col-form-label">Kode POS
                            </label>
                            <div class="col-lg-4">
                                <input type="text" name="alamat_pos" class="form-control form-control-sm"
                                    id="alamat_pos" placeholder="0000" value="">
                            </div>
                        </div> -->

                        <!-- Alamat siswa  -->
                        <!-- Sekolah Asal -->
                        <div class="alert alert-default bg-teal p-1 mb-1"><i class="fas fa-graduation-cap"></i> Sekolah
                            Asal
                            Siswa</div>
                        <div class="form-group row mb-0">
                            <label for="sekolah_nama" class="col-lg-2 col-form-label">Nama Sekolah Asal
                            </label>
                            <div class="col-lg-4">
                                <input type="text" name="sekolah_nama" class="form-control form-control-sm"
                                    id="sekolah_nama" placeholder="Contoh : MIN 1 Mukomuko"
                                    value="<?=$dasis->sekolah_nama?>">
                            </div>
                            <label for="sekolah_npsn" class="col-lg-2 col-form-label">NPSN
                            </label>
                            <div class="col-lg-4">
                                <input type="number" name="sekolah_npsn" class="form-control form-control-sm"
                                    id="sekolah_npsn" placeholder="Nomor Pokok Sekolah Nasional"
                                    value="<?=$dasis->sekolah_npsn?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label class="col-lg-2 col-form-label">Status
                            </label>
                            <div class="col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="status-negeri" name="sekolah_status" value="Negeri"
                                            <?=$dasis->sekolah_status=='Negeri' ? 'checked':null ?>>
                                        <label for="status-negeri">
                                            Negeri
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="status-swasta" name="sekolah_status" value="Swasta"
                                            <?=$dasis->sekolah_status=='Swasta' ? 'checked':null ?>>
                                        <label for="status-swasta">
                                            Swasta
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="sekolah_alamat" class="col-lg-2 col-form-label">Alamat Sekolah
                            </label>
                            <div class="col-lg-10">
                                <textarea name="sekolah_alamat" class="form-control form-control-sm" id="sekolah_alamat"
                                    placeholder="Contoh : Jl. Melati No.5, Desa Sibak, Kec. Ipuh, Kab. Mukomuko, Prov. Bengkulu"><?=$dasis->sekolah_alamat?></textarea>
                            </div>

                        </div>
                        <!-- Sekolah Asal -->


                        <div class="alert alert-default bg-teal p-1 mt-1 mb-1">
                            <i class="fas fa-male"></i> Data Ayah Kandung
                        </div>
                        <div class="form-group row mb-0">
                            <label for="ayah_nama_lengkap" class="col-lg-2 col-form-label">Nama Ayah <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="text" name="ayah_nama_lengkap" class="form-control form-control-sm"
                                    id="ayah_nama_lengkap" placeholder="Contoh : Abdul Yamin"
                                    value="<?=$dasis->ayah_nama_lengkap?>">
                            </div>
                            <label for="ayah_nik" class="col-lg-2 col-form-label">NIK <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="number" name="ayah_nik" class="form-control form-control-sm" id="ayah_nik"
                                    placeholder="Nomor Induk Kependudukan" value="<?=$dasis->ayah_nik?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="ayah_tempat_lahir" class="col-lg-2 col-form-label">Tempat Lahir <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="text" name="ayah_tempat_lahir" class="form-control form-control-sm"
                                    id="ayah_tempat_lahir" placeholder="Contoh : Padang"
                                    value="<?=$dasis->ayah_tempat_lahir?>">
                            </div>
                            <label for="ayah_tanggal_lahir" class="col-lg-2 col-form-label">Tanggal Lahir <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="date" name="ayah_tanggal_lahir" class="form-control form-control-sm"
                                    id="ayah_tanggal_lahir" value="<?=$dasis->ayah_tanggal_lahir?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="ayah_pendidikan_terakhir" class="col-lg-2 col-form-label">Pendidikan
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <select name="ayah_pendidikan_terakhir" class="form-control form-control-sm"
                                    id="ayah_pendidikan_terakhir">
                                    <?php
                                foreach (TabelMaster('m_pendidikan') as $m) {?>
                                    <option value="<?=$m['pendidikan']?>"
                                        <?=$dasis->ayah_pendidikan_terakhir==$m['pendidikan'] ? 'selected':null?>>
                                        <?=$m['pendidikan']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label for="ayah_pekerjaan_utama" class="col-lg-2 col-form-label">Pekerjaan
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <select name="ayah_pekerjaan_utama" class="form-control form-control-sm"
                                    id="ayah_pekerjaan_utama">
                                    <?php
                                foreach (TabelMaster('m_pekerjaan') as $m) {?>
                                    <option value="<?=$m['pekerjaan']?>"
                                        <?=$dasis->ayah_pekerjaan_utama==$m['pekerjaan'] ? 'selected':null ?>>
                                        <?=$m['pekerjaan']?>
                                    </option>
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
                                    <option value="<?=$m['penghasilan']?>"
                                        <?=$dasis->ayah_penghasilan_rata_perbulan==$m['penghasilan']?'selected':null?>>
                                        <?=$m['penghasilan']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="col-lg-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="ayah-H" name="ayah_status" value="Hidup"
                                            <?=$dasis->ayah_status=='Hidup'?'checked':null?>>
                                        <label for="ayah-H">
                                            Hidup
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="ayah-M" name="ayah_status" value="Meninggal"
                                            <?=$dasis->ayah_status=='Meninggal'?'checked':null?>>
                                        <label for="ayah-M">
                                            Meninggal
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <label for="ayah_no_handphone" class="col-lg-2 col-form-label">No.HP <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="number" name="ayah_no_handphone" class="form-control form-control-sm"
                                    id="ayah_no_handphone" placeholder="Nomor HP/WA Aktif"
                                    value="<?=$dasis->ayah_no_handphone?>">
                            </div>
                        </div>
                        <!-- Data Ayah  -->
                        <div class="alert alert-default bg-teal p-1 mt-1 mb-1">
                            <i class="fas fa-female"></i> Data Ibu Kandung
                        </div>
                        <!-- Data Ibu  -->
                        <div class="form-group row mb-0">
                            <label for="ibu_nama_lengkap" class="col-lg-2 col-form-label">Nama Ibu <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="text" name="ibu_nama_lengkap" class="form-control form-control-sm"
                                    id="ibu_nama_lengkap" placeholder="Contoh : Abdul Yamin"
                                    value="<?=$dasis->ibu_nama_lengkap?>">
                            </div>
                            <label for="ibu_nik" class="col-lg-2 col-form-label">NIK <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="number" name="ibu_nik" class="form-control form-control-sm" id="ibu_nik"
                                    placeholder="Nomor Induk Kependudukan" value="<?=$dasis->ibu_nik?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="ibu_tempat_lahir" class="col-lg-2 col-form-label">Tempat Lahir <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="text" name="ibu_tempat_lahir" class="form-control form-control-sm"
                                    id="ibu_tempat_lahir" placeholder="Contoh : Padang"
                                    value="<?=$dasis->ibu_tempat_lahir?>">
                            </div>
                            <label for="ibu_tanggal_lahir" class="col-lg-2 col-form-label">Tanggal Lahir <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="date" name="ibu_tanggal_lahir" class="form-control form-control-sm"
                                    id="ibu_tanggal_lahir" placeholder="Nomor Induk Kependudukan"
                                    value="<?=$dasis->ibu_tanggal_lahir?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="ibu_pendidikan_terakhir" class="col-lg-2 col-form-label">Pendidikan
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <select name="ibu_pendidikan_terakhir" class="form-control form-control-sm"
                                    id="ibu_pendidikan_terakhir">
                                    <?php
                                foreach (TabelMaster('m_pendidikan') as $m) {?>
                                    <option value="<?=$m['pendidikan']?>"
                                        <?=$dasis->ibu_pendidikan_terakhir==$m['pendidikan']?'selected':null?>>
                                        <?=$m['pendidikan']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label for="ibu_pekerjaan_utama" class="col-lg-2 col-form-label">Pekerjaan
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <select name="ibu_pekerjaan_utama" class="form-control form-control-sm"
                                    id="ibu_pekerjaan_utama">
                                    <?php
                                foreach (TabelMaster('m_pekerjaan') as $m) {?>
                                    <option value="<?=$m['pekerjaan']?>"
                                        <?=$dasis->ibu_pekerjaan_utama==$m['pekerjaan']?'selected':null?>>
                                        <?=$m['pekerjaan']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label for="ibu_penghasilan_rata_perbulan" class="col-lg-2 col-form-label">Penghasilan
                                Perbulan<span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <select name="ibu_penghasilan_rata_perbulan" class="form-control form-control-sm"
                                    id="ibu_penghasilan_rata_perbulan">
                                    <?php
                                foreach (TabelMaster('m_penghasilan') as $m) {?>
                                    <option value="<?=$m['penghasilan']?>"
                                        <?=$dasis->ibu_penghasilan_rata_perbulan==$m['penghasilan']?'selected':null?>>
                                        <?=$m['penghasilan']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="col-lg-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="ibu-H" name="ibu_status" value="Hidup"
                                            <?=$dasis->ibu_status=='Hidup'?'checked':null?>>
                                        <label for="ibu-H">
                                            Hidup
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="ibu-M" name="ibu_status" value="Meninggal"
                                            <?=$dasis->ibu_status=='Meninggal'?'checked':null?>>
                                        <label for="ibu-M">
                                            Meninggal
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">

                            <label for="ibu_no_handphone" class="col-lg-2 col-form-label">No.HP <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="number" name="ibu_no_handphone" class="form-control form-control-sm"
                                    id="ibu_no_handphone" placeholder="Nomor HP/WA Aktif"
                                    value="<?=$dasis->ibu_no_handphone?>">
                            </div>
                            <label for="orang_tua_alamat" class="col-lg-2 col-form-label"> Alamat Orang Tua <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <textarea name="orang_tua_alamat" class="form-control form-control-sm"
                                    id="orang_tua_alamat"
                                    placeholder="Contoh : Jl. Melati No. 5, Desa Sibak, Kec. Ipuh, Kab. Mukomuko, Prov. Bengkulu"><?=$dasis->orang_tua_alamat?></textarea>
                            </div>
                        </div>

                        <!-- Data Ibu  -->


                        <!-- Biodata Santri  -->
                        <div class="callout callout-warning mt-3">
                            <h5>Konfirmasi Apakah data sudah benar ?</h5>

                            <p>Saya setuju bahwa seluruh data yang saya isikan dan/atau unggah adalah
                                benar,sah,legal dan / atau sesuai dengan keadaan dan / atau kenyataan
                                sebenarnya.</p>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="confirm" name="confirm" value="Ya">
                                    <label for="confirm">
                                        Ya, Saya Setuju
                                    </label>
                                </div>
                                <div class="text-danger" id="confirm_error"></div>
                            </div>
                            <p>
                                <button type="submit" id="BtnSaveBiodata" class="btn btn-default bg-teal"><i
                                        class="far fa-paper-plane"></i>
                                    Simpan dan
                                    Lanjutkan</button>
                            </p>
                        </div>
                    </form>
                </div>

                <div id="infolus-part" class="content" role="tabpanel" aria-labelledby="infolus-part-trigger">
                    <!-- Info Lulus  -->

                    <div class="card">
                        <div class="card-body text-center">
                            <h1><i class="far fa-check-circle text-teal"></i> <br>
                                <small>Selamat ! <br> <b
                                        class="text-teal"><?=strtoupper(CSB()->nama_lengkap)?></b></small>
                            </h1>
                            <p>
                                Ananda dinyatkan <b class="text-teal">LULUS</b> pada
                                seleksi Penerimaan Santri Baru Pondok Pesantren Madrsah Tarbiyah Islamiyah (MTI)
                                Canduang Tahun Pelajaran <b><?=CSB()->periode?></b> dengan jalur pendaftaran
                                <b><?=strtoupper(CSB()->jalur_name)?></b> pada gelombang pendaftaran
                                <b><?=strtoupper(CSB()->tahap_daftar)?></b>. <br>
                                Silahkan melakukan pendaftaran ulang dimulai dari tanggal
                                <b
                                    class="text-uppercase"><?=date('d - F - Y', strtotime($jadwal_du->tanggal_mulai))?></b>
                                sampai dengan
                                <b
                                    class="text-uppercase"><?=date('d - F - Y', strtotime($jadwal_du->tanggal_akhir))?></b>


                            </p>
                        </div>

                    </div>

                    <div class="text-center mt-3">
                        <form id="formRequestDaftarUlang">
                            <?=csrf_field()?>
                            <input type="hidden" name="id" value="<?=CSB()->id?>">
                            <input type="hidden" name="nama" value="<?=CSB()->nama_lengkap?>">
                            <input type="hidden" name="whatsapp" value="<?=CSB()->whatsapp?>">
                            <input type="hidden" name="nisn" value="<?=CSB()->nisn?>">
                            <input type="hidden" name="gender" value="<?=CSB()->gender?>">
                            <input type="hidden" name="is_asrama" value="<?=CSB()->is_asrama?>">
                            <button type="button" class="btn btn-default" onclick="stepper.previous()"><i
                                    class="fas fa-arrow-left"></i>
                                Sebelumnya</button>
                            <button type="submit" id="RequestDaftarUlang" class="btn btn-default bg-gradient-teal"><i
                                    class="far fa-check-circle"></i> Ya, Saya
                                Bersedia Daftar Ulang ?
                            </button>
                        </form>

                    </div>
                </div>
                <div id="daftarulang-part" class="content" role="tabpanel" aria-labelledby="daftarulang-part-trigger">

                    <?php
                    if (isset($tagihan)) {
                        // Jika belum di selesaikan 
                        if ($tagihan->status_daftar_ulang =='proses' && $tagihan->status_pembayaran=='SUKSES') {
                            ?>
                    <div class="card card-teal card-outline">
                        <div class="card-body text-center">
                            <h2><i class="far fa-check-circle text-teal"></i> <br>
                                <b>Terimakasih Telah melakukan Pembayaran</b>
                            </h2>
                            Bukti Pembayaran telah diterima. Selanjutnya Tim Verifikasi akan membuat dan menerbitkan
                            Nomor
                            dan bukti Pendafatran ulang untuk ananda <b class="text-teal"><?=CSB()->nama_lengkap?></b>.
                            Jika dalam waktku 1x24 jam belum menerima nomor dan bukti daftar ulang, harap lapor ke
                            panitia PSB MTI Canduang. Terimakasih ! <br>

                            <b>WhatsApp : 082122551928</b>
                            </p>
                        </div>
                    </div>
                    <?php
                        }

                        if ($tagihan->status_daftar_ulang=='SELESAI' && $tagihan->status_pembayaran=='SUKSES') {
                            ?>
                    <div class="card card-teal card-outline">
                        <div class="card-body text-center">
                            <h1><i class="far fa-check-circle text-teal"></i> <br>
                                <b>Daftar Ulang Selesai.</b>
                            </h1>
                            <p>Terimakasih <b class="text-teal"><?=CSB()->nama_lengkap?></b> Telah melakukan
                                pendafatran Ulang. <br> Selamat ! Ananda telah diterima sebagai Santri Baru Pondok
                                Pesantren
                                Madrsah
                                Tarbiyah Islamiyah Canduang. Simpan tanda bukti daftar ulang berikut sebagai syarat
                                untuk pengambilan
                                seragam santri baru. Informasi lebih lanjut akan di informasikan melalui WhatsApp Group
                                Santri Baru MTI
                                Canduang.
                            </p>
                            <p>
                                <a href="<?=base_url('print/kartu/du/'. base64_encode(CSB()->id))?>" target="_blank"
                                    class="btn btn-default bg-danger btn-lg shadow"> <i class="fa fa-print"></i>
                                    Download Kartu
                                    Daftar Ulang</a>
                            </p>
                        </div>
                    </div>


                    <?php
                            }else{
                            ?>
                    <div class="form-group">
                        <label for="payment_method">Metode Pembayaran</label>
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="manual" <?=$tagihan->payment_method=='manual'? 'selected' :null?>>
                                Transfer Rekening
                                (Konfirmasi
                                Manual)</option>
                            <option value="va" <?=$tagihan->payment_method=='va'? 'selected' :null?>>Virtual Account
                                (VA)
                                Realtime
                            </option>
                        </select>
                    </div>

                    <div class="mt-3" id="invoice-area"></div>
                    <?php
                            }



                            ?>
                    <script>
                    $(document).ready(function() {
                        var get_payment_method = $('#payment_method').val();
                        LoadInvoice(get_payment_method);
                    });
                    // payment_method
                    $('#payment_method').change(function(e) {
                        e.preventDefault();
                        if ($(this).val() !== "") {
                            LoadInvoice($(this).val());
                        } else {
                            window.location.reload()
                        }


                    });

                    function LoadInvoice(payment_method) {

                        if (payment_method !== "") {
                            $.ajax({
                                type: "post",
                                url: "<?=base_url('payment/method')?>",
                                data: {
                                    csb_akun_id: <?=json_encode(CSB()->id); ?>,
                                    payment_method: payment_method,
                                    jenis_tagihan: 'daftar-ulang',
                                },
                                dataType: "json",
                                success: function(response) {
                                    $('#invoice-area').html(response.form_payment_method)
                                }
                            });
                        }
                    }
                    </script>
                    <?php

                    }
                    ?>


                    <!-- <div id="area-tagihan-daftar-ulang"></div> -->
                </div>

            </div>
        </div>


    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
$(document).ready(function() {
    StatusBiodata()
    // LoadTagihanDaftarUlang(<?php echo json_encode(CSB()->id); ?>)

});



function StatusBiodata() {
    var statusBiodata = <?php echo json_encode($dasis->id); ?>;
    var statusDaftarUlang = <?php echo json_encode($status->status_daftar_ulang); ?>;
    if (statusBiodata !== null) {
        // console.log('aktif kan step pambayaran')
        stepper.next()
        if (statusDaftarUlang !== null) {
            stepper.next()
            if (statusDaftarUlang == 'TERLAMBAT') {
                // alert('okkk')
                Swal.fire({
                    title: 'Mohon Maaf !',
                    text: "Anda dinyatakan Terlambat Melakukan Daftar Ulang. Sistem Telah Membuat Status Daftar Ulang anda menjadi TERLAMBAT. Hubungi Panitia untuk Konfirmasi ini",
                    icon: 'warning',
                })
            }
        }
    }
}

// RequestDaftarUlang

$('#RequestDaftarUlang').click(function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Tindakan ini akan membuat permintaan pendaftaran ulang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#20c997',
        cancelButtonColor: '#FF6347',
        confirmButtonText: 'Ya, Saya Ingin Melanjutkan',
        cancelButtonText: 'Nanti Dulu',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?=base_url('student/req-daftar-ulang')?>",
                data: $('#formRequestDaftarUlang').serialize(),
                dataType: "json",

                beforeSend: function() {
                    $('#RequestDaftarUlang').prop('disabled', true);
                    $('#RequestDaftarUlang').html(
                        `<i class="fa fa-spin fa-spinner"></i>`
                    );
                },
                complete: function() {
                    $('#RequestDaftarUlang').prop('disabled', false);
                    $('#RequestDaftarUlang').html(`<i
                                    class="far fa-check-circle"></i> Ya, Saya
                                Bersedia Daftar Ulang ?`);
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Data berhasil disimpan, tampilkan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Terimakasih !',
                            text: response.message,
                            showCancelButton: false,
                            confirmButtonColor: '#41d1a7',
                            confirmButtonText: 'Lanjutkan !',

                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload()
                                stepper.next()
                            }
                        })

                    }

                }
            });

        }
    })

});


// function RequestDaftarUlang(id) {

// }



$('#form-biodata').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?=base_url('student/save-biodata')?>",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
            $('#BtnSaveBiodata').prop('disabled', true);
            $('#BtnSaveBiodata').html(
                `<i class="fa fa-spin fa-spinner"></i>`
            );
        },
        complete: function() {
            $('#BtnSaveBiodata').prop('disabled', false);
            $('#BtnSaveBiodata').html(`<i
                                        class="far fa-paper-plane"></i>
                                    Simpan dan
                                    Lanjutkan`);
        },
        success: function(response) {
            if (response.status === 'success') {
                // Data berhasil disimpan, tampilkan pesan sukses
                Swal.fire({
                    icon: 'success',
                    title: 'Terimakasih !',
                    text: response.message,
                    showCancelButton: false,
                    confirmButtonColor: '#41d1a7',
                    confirmButtonText: 'Lanjutkan',

                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload()
                        stepper.next()
                    }
                })

            } else if (response.status === 'error') {
                // Validasi gagal, tampilkan pesan kesalahan
                toastr.error('Isian formulir masih belum lengkap.')

                // Reset semua inputan dari kelas is-invalid
                $('.is-invalid').removeClass('is-invalid');

                // Tampilkan pesan kesalahan di bawah input yang sesuai
                $.each(response.message, function(key, value) {
                    $('#' + key).addClass('is-invalid');
                    $('#' + key + '_error').html(value);
                });
            }
        }
    });


});

// area-tagihan-daftar-ulang
// function LoadTagihanDaftarUlang(id) {
//     $.ajax({
//         type: "post",
//         url: "<?=base_url('student/tagihan-daftar-ulang')?>",
//         data: {
//             id: id
//         },
//         dataType: "json",
//         success: function(response) {
//             $('#area-tagihan-daftar-ulang').html(response.tagihan_du)
//         }
//     });

// }
</script>

<?= $this->endSection() ?>