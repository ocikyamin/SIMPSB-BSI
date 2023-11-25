<form id="form-biodata">
    <?=csrf_field()?>
    <input type="hidden" name="id" value="<?=$dasis->id?>">
    <input type="hidden" name="csb_akun_id" value="<?=$csb->id?>">
    <div class="form-group row mb-0">
        <label for="nokk" class="col-lg-2 col-form-label">No.KK <span class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="text" name="nokk" class="form-control form-control-sm" id="nokk"
                placeholder="Nomor Kartu Keluarga" value="<?=$dasis->nokk?>">
            <div class="invalid-feedback" id="nokk_error"></div>
        </div>
        <label for="nik" class="col-lg-2 col-form-label">NIK <span class="text-danger">*</span></label>
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
            <input type="number" name="jumlah_saudara" class="form-control form-control-sm" id="jumlah_saudara"
                placeholder="00" value="<?=$dasis->jumlah_saudara?>">
        </div>
        <label for="anak_ke" class="col-lg-2 col-form-label">Anake Ke-
            <span class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="number" name="anak_ke" class="form-control form-control-sm" id="anak_ke" placeholder="00"
                value="<?=$dasis->anak_ke?>">
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
            <input type="text" name="alamat_email" class="form-control form-control-sm" id="alamat_email"
                placeholder="Contoh : yamin@gmail.com" value="<?=$dasis->alamat_email?>">
        </div>
        <label for="yang_membiayai_sekolah" class="col-lg-2 col-form-label">Yang
            Biayai
            Sekolah ?
        </label>
        <div class="col-lg-4">
            <select name="yang_membiayai_sekolah" class="form-control form-control-sm" id="yang_membiayai_sekolah">
                <option value="">Pilih</option>
                <option value="Orang Tua" <?=$dasis->yang_membiayai_sekolah=='Orang Tua'?'selected':null?>>Orang Tua
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


    <!-- Sekolah Asal -->
    <div class="alert alert-default bg-teal p-1 mb-1"><i class="fas fa-graduation-cap"></i> Sekolah
        Asal
        Siswa</div>
    <div class="form-group row mb-0">
        <label for="sekolah_nama" class="col-lg-2 col-form-label">Nama Sekolah Asal
        </label>
        <div class="col-lg-4">
            <input type="text" name="sekolah_nama" class="form-control form-control-sm" id="sekolah_nama"
                placeholder="Contoh : MIN 1 Mukomuko" value="<?=$dasis->sekolah_nama?>">
        </div>
        <label for="sekolah_npsn" class="col-lg-2 col-form-label">NPSN
        </label>
        <div class="col-lg-4">
            <input type="number" name="sekolah_npsn" class="form-control form-control-sm" id="sekolah_npsn"
                placeholder="Nomor Pokok Sekolah Nasional" value="<?=$dasis->sekolah_npsn?>">
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
            <input type="text" name="ayah_nama_lengkap" class="form-control form-control-sm" id="ayah_nama_lengkap"
                placeholder="Contoh : Abdul Yamin" value="<?=$dasis->ayah_nama_lengkap?>">
        </div>
        <label for="ayah_nik" class="col-lg-2 col-form-label">NIK <span class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="number" name="ayah_nik" class="form-control form-control-sm" id="ayah_nik"
                placeholder="Nomor Induk Kependudukan" value="<?=$dasis->ayah_nik?>">
        </div>
    </div>
    <div class="form-group row mb-0">
        <label for="ayah_tempat_lahir" class="col-lg-2 col-form-label">Tempat Lahir <span
                class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="text" name="ayah_tempat_lahir" class="form-control form-control-sm" id="ayah_tempat_lahir"
                placeholder="Contoh : Padang" value="<?=$dasis->ayah_tempat_lahir?>">
        </div>
        <label for="ayah_tanggal_lahir" class="col-lg-2 col-form-label">Tanggal Lahir <span
                class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="date" name="ayah_tanggal_lahir" class="form-control form-control-sm" id="ayah_tanggal_lahir"
                value="<?=$dasis->ayah_tanggal_lahir?>">
        </div>
    </div>
    <div class="form-group row mb-0">
        <label for="ayah_pendidikan_terakhir" class="col-lg-2 col-form-label">Pendidikan
            <span class="text-danger">*</span></label>
        <div class="col-lg-4">
            <select name="ayah_pendidikan_terakhir" class="form-control form-control-sm" id="ayah_pendidikan_terakhir">
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
            <select name="ayah_pekerjaan_utama" class="form-control form-control-sm" id="ayah_pekerjaan_utama">
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
        <label for="ayah_no_handphone" class="col-lg-2 col-form-label">No.HP <span class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="number" name="ayah_no_handphone" class="form-control form-control-sm" id="ayah_no_handphone"
                placeholder="Nomor HP/WA Aktif" value="<?=$dasis->ayah_no_handphone?>">
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
            <input type="text" name="ibu_nama_lengkap" class="form-control form-control-sm" id="ibu_nama_lengkap"
                placeholder="Contoh : Abdul Yamin" value="<?=$dasis->ibu_nama_lengkap?>">
        </div>
        <label for="ibu_nik" class="col-lg-2 col-form-label">NIK <span class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="number" name="ibu_nik" class="form-control form-control-sm" id="ibu_nik"
                placeholder="Nomor Induk Kependudukan" value="<?=$dasis->ibu_nik?>">
        </div>
    </div>
    <div class="form-group row mb-0">
        <label for="ibu_tempat_lahir" class="col-lg-2 col-form-label">Tempat Lahir <span
                class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="text" name="ibu_tempat_lahir" class="form-control form-control-sm" id="ibu_tempat_lahir"
                placeholder="Contoh : Padang" value="<?=$dasis->ibu_tempat_lahir?>">
        </div>
        <label for="ibu_tanggal_lahir" class="col-lg-2 col-form-label">Tanggal Lahir <span
                class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="date" name="ibu_tanggal_lahir" class="form-control form-control-sm" id="ibu_tanggal_lahir"
                placeholder="Nomor Induk Kependudukan" value="<?=$dasis->ibu_tanggal_lahir?>">
        </div>
    </div>
    <div class="form-group row mb-0">
        <label for="ibu_pendidikan_terakhir" class="col-lg-2 col-form-label">Pendidikan
            <span class="text-danger">*</span></label>
        <div class="col-lg-4">
            <select name="ibu_pendidikan_terakhir" class="form-control form-control-sm" id="ibu_pendidikan_terakhir">
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
            <select name="ibu_pekerjaan_utama" class="form-control form-control-sm" id="ibu_pekerjaan_utama">
                <?php
                                foreach (TabelMaster('m_pekerjaan') as $m) {?>
                <option value="<?=$m['pekerjaan']?>" <?=$dasis->ibu_pekerjaan_utama==$m['pekerjaan']?'selected':null?>>
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

        <label for="ibu_no_handphone" class="col-lg-2 col-form-label">No.HP <span class="text-danger">*</span></label>
        <div class="col-lg-4">
            <input type="number" name="ibu_no_handphone" class="form-control form-control-sm" id="ibu_no_handphone"
                placeholder="Nomor HP/WA Aktif" value="<?=$dasis->ibu_no_handphone?>">
        </div>
        <label for="orang_tua_alamat" class="col-lg-2 col-form-label"> Alamat Orang Tua <span
                class="text-danger">*</span></label>
        <div class="col-lg-4">
            <textarea name="orang_tua_alamat" class="form-control form-control-sm" id="orang_tua_alamat"
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
            <button type="submit" id="BtnSaveBiodata" class="btn btn-default bg-teal"><i class="far fa-paper-plane"></i>
                Simpan dan
                Lanjutkan</button>
        </p>
    </div>
</form>
<script>
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
</script>