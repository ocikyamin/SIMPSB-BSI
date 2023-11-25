<?= $this->extend('Admin/Layouts') ?>

<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Santri Baru
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Student</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                    href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                    aria-selected="true"><i class="fa fa-cog fa-spin"></i>
                                    Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                    aria-selected="false"><i class="fa fa-graduation-cap"></i> Rapor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                    href="#custom-tabs-four-messages" role="tab"
                                    aria-controls="custom-tabs-four-messages" aria-selected="false"><i
                                        class="fas fa-user-graduate"></i> Biodata</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                                    href="#custom-tabs-four-settings" role="tab"
                                    aria-controls="custom-tabs-four-settings" aria-selected="false"><i
                                        class="fa fa-folder-open"></i> Document</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <!-- Foto  -->
                                        <div class="card card-teal card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title text-teal"><i class="fa fa-search me-2"></i>
                                                    <?=$csb->noreg?>
                                                </h3>
                                            </div>
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                    <?php $foto = $csb->foto==null ? 'no_image.png': $csb->foto;?>
                                                    <img class="profile-user-img img-fluid img-circle"
                                                        src="<?=base_url('files/_foto/'.$foto)?>"
                                                        alt="User profile picture" style="width:90px;height:90px">
                                                </div>
                                                <h3 class="profile-username text-center"><?=$csb->nama_lengkap?></h3>
                                                <p class="text-muted text-center"><?=$csb->nisn?>
                                                </p>
                                                <button onclick="UploadFoto(<?=$csb->id?>)"
                                                    class="btn btn-default bg-navy shadow-sm btn-block"><b><i
                                                            class="fas fa-cloud-upload-alt"></i> Upload
                                                        Foto</b></button>


                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- Foto  -->
                                        <!-- Status  -->
                                        <div class="card card-teal card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title text-teal"><i class="fas fa-list me-2"></i> Status
                                                    Penerimaan
                                                </h3>
                                            </div>
                                            <div class="card-body box-profile">
                                                <div class="form-group mb-1">
                                                    <label for="status_lulus">Status Lulus
                                                        <?php
                                if ($csb->status_lulus=='L') {
                                    echo "<span class='badge badge-pill badge-primary'>LULUS</span>";
                                }else if ($csb->status_lulus=='TL') {
                                    echo "<span class='badge badge-pill badge-danger'>TIDAK LULUS</span>";
                                }else if ($csb->status_lulus=='CD') {
                                    echo "<span class='badge badge-pill badge-secondary'>CADANGAN</span>";
                                }else if ($csb->status_lulus=='TDU') {
                                    echo "<span class='badge badge-pill badge-secondary'>TIDAK DAFTAR ULANG</span>";
                                }else{
                                    echo "<span class='badge badge-pill badge-secondary'>No Status</span>";
                                }

                                ?>

                                                    </label>
                                                    <select class="form-control form-control-sm bg-light pilihstatus"
                                                        id="status_lulus" data-jenis="status_lulus">
                                                        <option value="">Pilih Status</option>
                                                        <option value="L">LULUS</option>
                                                        <option value="TL">TIDAK LULUS</option>
                                                        <option value="CD">CADANGAN</option>
                                                        <option value="R">RESET STATUS</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label for="daftar_ulang">Daftar Ulang <?php
                                if ($csb->status_daftar_ulang=='SELESAI') {
                                    echo "<span class='badge badge-pill badge-primary'>SELESAI</span>";
                                }else if ($csb->status_daftar_ulang=='proses') {
                                    echo "<span class='badge badge-pill badge-warning'>PROSES</span>";
                                }else if ($csb->status_daftar_ulang=='TERLAMBAT') {
                                    echo "<span class='badge badge-pill badge-warning'>TERLAMBAT</span>";
                                }else{
                                    echo "<span class='badge badge-pill badge-secondary'>No Status</span>";
                                }

                                ?></label>
                                                    <select class="form-control form-control-sm bg-light pilihstatus"
                                                        id="daftar_ulang" data-jenis="daftar_ulang">
                                                        <option value="">Pilih Status</option>
                                                        <option value="SELESAI">SELESAI</option>
                                                        <option value="TERLAMBAT">TERLAMBAT</option>
                                                        <option value="R">RESET STATUS</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- Status  -->
                                        <!-- Print  -->

                                        <button type="button"
                                            class="btn btn-dark btn-block btn-sm mt-1 dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-print me-3"></i> Print
                                        </button>

                                        <div class="dropdown-menu w-100" role="menu">
                                            <a class="dropdown-item"
                                                href="<?=base_url('print/kartu/ujian/'. base64_encode($csb->id))?>"
                                                target="_blank">Kartu Ujian</a>
                                            <a class="dropdown-item" href="#" target="_blank">Kartu Daftar Ulang</a>
                                        </div>

                                        <!-- Print  -->


                                    </div>
                                    <!-- col-lg-3 -->
                                    <div class="col-lg-9">
                                        <!-- Pengaturan Penerimaan -->
                                        <div class="card card-teal card-outline">
                                            <div class="card-header border-0">
                                                <h3 class="card-title text-teal"><i class="fa fa-cog me-2"></i> Opsi
                                                    Pendaftaran
                                                </h3>
                                                <div class="float-right">
                                                    <button type="submit" id="btn-save-change"
                                                        class="btn btn-block btn-default bg-teal btn-sm"> <i
                                                            class="far fa-check-circle me-2"></i>
                                                        Save & Changes
                                                    </button>
                                                    <div>
                                                        <span
                                                            class="badge badge-pill badge-dark"><?=date('d/m/Y - H:i:s', strtotime($csb->created_at))?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form id="form-pilihan-daftar">
                                                    <?=csrf_field()?>
                                                    <input type="hidden" name="id" value="<?=$csb->id?>">
                                                    <input type="hidden" name="old_nisn" value="<?=$csb->nisn?>">
                                                    <!-- Identitas  -->
                                                    <div class="form-group row mb-1">
                                                        <label class="col-lg-2" for="nisn">NISN</label>
                                                        <div class="col-lg-4">

                                                            <input type="text" name="nisn" id="nisn"
                                                                class="form-control form-control-sm"
                                                                value="<?=$csb->nisn?>">
                                                        </div>
                                                        <label class="col-lg-2" for="nama_lengkap">Nama</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                                                class="form-control form-control-sm"
                                                                value="<?=$csb->nama_lengkap?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-1">
                                                        <label class="col-lg-2" for="tempat_lahir">Tempat Lahir</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                                class="form-control form-control-sm"
                                                                value="<?=$csb->tempat_lahir?>">
                                                        </div>
                                                        <label class="col-lg-2" for="tanggal_lahir">Tanggal
                                                            Lahir</label>
                                                        <div class="col-lg-4">
                                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                                class="form-control form-control-sm"
                                                                value="<?=$csb->tanggal_lahir?>">
                                                        </div>
                                                    </div>
                                                    <!-- Identitas  -->


                                                    <div class="form-group row mb-1">
                                                        <label class="col-lg-2" for="periode">Periode</label>
                                                        <div class="col-lg-4">
                                                            <select name="master_periode_id"
                                                                class="form-control form-control-sm bg-light"
                                                                id="periode">
                                                                <option value="">Pilih</option>
                                                                <?php
                                    foreach (TabelMaster('master_periode') as $d) {?>
                                                                <option value="<?=$d['id']?>"
                                                                    <?=$d['id']==$csb->master_periode_id?'selected':null?>>
                                                                    <?=$d['periode']?> -
                                                                    <?=$d['tahap_daftar']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <label class="col-lg-2" for="master_jalur_id">Jalur</label>
                                                        <div class="col-lg-4">
                                                            <select name="master_jalur_id"
                                                                class="form-control form-control-sm bg-light"
                                                                id="master_jalur_id">
                                                                <option value="">Pilih</option>
                                                                <?php
                                    foreach (TabelMaster('master_jalur') as $d) {?>
                                                                <option value="<?=$d['id']?>"
                                                                    <?=$d['id']==$csb->master_jalur_id?'selected':null?>>
                                                                    <?=$d['jalur_name']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-1">
                                                        <label class="col-lg-2"
                                                            for="master_school_level_id">Unit</label>
                                                        <div class="col-lg-4">
                                                            <select name="master_school_level_id"
                                                                class="form-control form-control-sm bg-light"
                                                                id="master_school_level_id">
                                                                <option value="">Pilih</option>
                                                                <?php
                                    foreach (TabelMaster('master_school_level') as $d) {?>
                                                                <option value="<?=$d['id']?>"
                                                                    <?=$d['id']==$csb->master_school_level_id?'selected':null?>>
                                                                    <?=$d['level_name']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <label class="col-lg-2" for="master_jenis_sekolah_asal_id">Jenis
                                                            Sekolah</label>
                                                        <div class="col-lg-4">
                                                            <select name="master_jenis_sekolah_asal_id"
                                                                class="form-control form-control-sm bg-light"
                                                                id="master_jenis_sekolah_asal_id">
                                                                <option value="">Pilih</option>
                                                                <?php
                                    foreach (TabelMaster('master_jenis_sekolah_asal') as $d) {?>
                                                                <option value="<?=$d['id']?>"
                                                                    <?=$d['id']==$csb->master_jenis_sekolah_asal_id?'selected':null?>>
                                                                    <?=$d['sttb']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-1">
                                                        <label class="col-lg-2" for="gender">Gender</label>
                                                        <div class="col-lg-4">
                                                            <select name="gender"
                                                                class="form-control form-control-sm bg-light"
                                                                id="gender">
                                                                <option value="">Pilih</option>
                                                                <option value="L"
                                                                    <?=$csb->gender=='L'?'selected':null?>>Laki-laki
                                                                </option>
                                                                <option value="P"
                                                                    <?=$csb->gender=='P'?'selected':null?>>Perempuan
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <label class="col-lg-2" for="is_asrama">Asrama</label>
                                                        <div class="col-lg-4">
                                                            <select name="is_asrama"
                                                                class="form-control form-control-sm bg-light"
                                                                id="is_asrama">
                                                                <option value="">Pilih</option>
                                                                <option value="Y"
                                                                    <?=$csb->is_asrama=='Y'?'selected':null?>>Ya
                                                                </option>
                                                                <option value="N"
                                                                    <?=$csb->is_asrama=='N'?'selected':null?>>Tidak
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-1">
                                                        <label class="col-lg-2" for="whatsapp">Whatsapp</label>
                                                        <div class="col-lg-2">
                                                            <input name="whatsapp"
                                                                class="form-control form-control-sm bg-light mb-1"
                                                                id="whatsapp" type="number" value="<?=$csb->whatsapp?>">
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <button type="button" id="btn-kirim-pesan-wa"
                                                                class="btn btn-success btn-sm btn-block"><i
                                                                    class="fab fa-whatsapp me-3"></i> Kirim
                                                                Pesan</button>
                                                        </div>
                                                        <label class="col-lg-2">Password</label>
                                                        <div class="col-lg-3">
                                                            <div class="input-group">
                                                                <input type="password"
                                                                    class="form-control form-control-sm mb-1"
                                                                    id="password" placeholder="Password"
                                                                    value="<?=$csb->txt_password?>">
                                                                <div class="input-group-append">
                                                                    <div
                                                                        class="input-group-text showpass form-control-sm">
                                                                        <i class="far fa-eye-slash"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <button type="button"
                                                                onclick="ChangePassword(<?=$csb->id?>)"
                                                                class="btn btn-danger btn-sm btn-block"><i
                                                                    class="fa fa-key me-3"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Pengaturan Penerimaan -->
                                        <!-- Pengaturan Tagihan  -->
                                        <div class="card card-teal card-outline">
                                            <div class="card-header border-0">
                                                <h3 class="card-title text-teal"><i class="fas fa-credit-card me-2"></i>
                                                    Tagihan</h3>
                                                <div class="float-right">
                                                    <button class="btn btn-dark btn-sm m-0"><i
                                                            class="fas fa-plus-circle"></i>
                                                        Create</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama Tagihan</th>
                                                                <th>Jumlah</th>
                                                                <th>Status</th>
                                                                <th>File</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                    $i=1;
                                    foreach ($tagihan as $t) {?>
                                                            <tr>
                                                                <td><?=$i++?></td>
                                                                <td><?=$t['nama_biaya']?></td>
                                                                <td><?= 'Rp. '.number_format($t['nominal_tagihan'])?>
                                                                </td>
                                                                <td>
                                                                    <?php
    if ($t['status_pembayaran']=='SUKSES') {
    echo "<span class='badge bg-default bg-teal'>Telah dibayar</span>";
    }else if ($t['status_pembayaran']=='WAITING') {
    echo "<span class='badge bg-default bg-warning'>Harap Periksa</span>";
    }else if ($t['status_pembayaran']=='FAIL') {
    echo "<span class='badge bg-default bg-danger'>Bukti Ditolak</span>";
    }else{
    echo "<span class='badge bg-danger'>Menunggu Pembayaran</span>";
    ?>
                                                                    <div class="mt-1">
                                                                        <button onclick="DeleteTagihan(<?=$t['id']?>)"
                                                                            type="button"
                                                                            class="btn btn-outline-danger btn-xs"><i
                                                                                class="fa fa-trash"></i></button>
                                                                        <button
                                                                            onclick="VerifyBuktiBayar(<?=$t['id']?>)"
                                                                            type="button"
                                                                            class="btn btn-default bg-teal btn-xs"><i
                                                                                class="fas fa-cloud-upload-alt"></i>
                                                                        </button>

                                                                    </div>

                                                                    <?php
    }

    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                            if ($t['payment_method']=='manual') {
                                                ?>
                                                                    <button onclick="VerifyBuktiBayar(<?=$t['id']?>)"
                                                                        type="button"
                                                                        class="btn btn-outline-primary btn-sm"><i
                                                                            class="fas fa-paperclip me-2"></i> Lihat
                                                                        Lampiran</button>

                                                                    <?php
                                            }
                                            
                                            ?>

                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Pengaturan Tagihan  -->

                                    </div>
                                    <!-- col-lg-9  -->

                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-four-profile-tab">
                                <!-- Rapor  -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm mid" style="text-transform:uppercase">
                                        <tr>
                                            <td rowspan="2" class="text-center">Kelas</td>
                                            <td colspan="2" class="text-center">Rata-Rata Semester</td>
                                            <td rowspan="2" class="text-center">Rata-Rata Kelas</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">2</td>
                                        </tr>
                                        <?php
                    $csb_akun_id = $csb->id;
                    $rataRaporList = []; // Inisialisasi array untuk menyimpan rata-rata rapor
                    foreach ($list_kelas as $k) {
                    $rataSemester = RataRataSemester($csb_akun_id, $k['id']);
                    $rataRaporKelas = ($rataSemester->rata_rata_semester_1 + $rataSemester->rata_rata_semester_2) / 2;
                    $rataRaporList[] = $rataRaporKelas; // Simpan rata-rata rapor dalam array
                    ?>
                                        <tr>
                                            <td>
                                                <div class="form-group m-0">
                                                    <div class="icheck-teal d-inline me-3">
                                                        <input type="radio" id="kelas-<?=$k['id']?>" name="kelass"
                                                            onclick="PilihKelas(<?=$k['id']?>)">
                                                        <label for="kelas-<?=$k['id']?>">
                                                            Kelas (<?=$k['kelas']?>)
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center"><?= $rataSemester->rata_rata_semester_1 ?></td>
                                            <td class="text-center"><?= $rataSemester->rata_rata_semester_2 ?></td>
                                            <td class="text-center"><?= $rataRaporKelas ?></td>
                                        </tr>
                                        <?php
                    }
                    $nilai_akhir = array_sum($rataRaporList) / count($rataRaporList);
                    ?>
                                        <tr>
                                            <td>Rata-rata Rapor</td>
                                            <td class="text-center">
                                                <div id="nilai_rapor" data-jalur="<?=$csb->master_jalur_id?>"
                                                    data-nilaijalurmin="<?=$csb->nilai_minimal?>">
                                                    <b><?=$nilai_akhir?></b>
                                                </div>
                                            </td>
                                            <td colspan="2" id="result"></td>
                                        </tr>
                                    </table>
                                </div>


                                <button onclick="ResetNilai(<?=$csb->id?>)"
                                    class="right btn btn-danger btn-sm mb-3 mt-0"><i class="fa fa-undo"></i> Reset
                                    Nilai</button>
                                <div class="mb-4" id="nilai-rapor-siswa"></div>
                                <!-- Rapor  -->
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                aria-labelledby="custom-tabs-four-messages-tab">
                                <div id="biodata-area"></div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                                aria-labelledby="custom-tabs-four-settings-tab">
                                Belum siap lagi :)
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>



            </div>
        </div>

    </div>

</section>
<!-- /.content -->
<div class="modalsview"></div>
<script>
// Buat Status Lulus 

$(document).ready(function() {
    // Fungsi untuk menampilkan atau menyembunyikan password
    $(".showpass").click(function() {
        var input = $("#password");
        var icon = $(this).find("i");

        if (input.attr("type") === "password") {
            input.attr("type", "text");
            icon.removeClass("far fa-eye-slash text-danger").addClass("far fa-eye text-success");
        } else {
            input.attr("type", "password");
            icon.removeClass("far fa-eye text-success").addClass("far fa-eye-slash text-danger");
        }
    });



    // Tangani perubahan status untuk semua elemen select dengan class "custom-status-select"
    $('.pilihstatus').change(function(e) {
        e.preventDefault();
        var status = $(this).val();
        var csb_id = <?=json_encode($csb->id)?>;
        var set_status = '';
        var jenis = $(this).data('jenis'); // Ambil jenis dari atribut data

        // Logika penentuan set_status sesuai dengan jenis
        if (jenis === 'status_lulus') {
            if (status == "L") {
                set_status = 'LULUS';
            } else if (status == "TL") {
                set_status = 'TIDAK LULUS';
            } else if (status == "CD") {
                set_status = 'CADANGAN';
            } else if (status == "R") {
                set_status = 'TANPA STATUS';
            }
        } else if (jenis === 'daftar_ulang') {
            // Logika untuk jenis lainnya
            // Misalnya, jika jenis adalah 'status_lainnya'
            if (status == "SELESAI") {
                set_status = 'SELESAI';
            } else if (status == "TERLAMBAT") {
                set_status = 'TERLAMBAT';
            } else if (status == "R") {
                set_status = 'TANPA STATUS';
            }

        }

        if (status !== "") {
            Swal.fire({
                title: 'Are you sure?',
                html: "Anda akan membuat Status menjadi : <b> <h3> " + set_status + "</h3><b>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Buat Status'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url('admin/student/status')?>",
                        data: {
                            id: csb_id,
                            set_status: status,
                            jenis: jenis,
                        },
                        dataType: "json",
                        success: function(response) {
                            // console.log(response)
                            if (response.status == true) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: response.msg,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then((result) => {
                                    window.location.reload()
                                })
                            }
                        }
                    });
                }
            })
        }
    });
});

// save-changes
$('#btn-save-change').click(function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "Tindakan ini akan melakukan perubahan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Lanjutkan!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?=base_url('admin/student/save-pilihan')?>",
                data: $('#form-pilihan-daftar').serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.status == 'error') {
                        for (var field in response) {
                            if (field !== "status" && response[field]) {
                                toastr.error(response[field])
                            }
                        }
                    }

                    if (response.status == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Selesai',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            window.location.reload()
                        })
                    }
                }
            });
        }
    })

});


function LoadMapelList(kelas_id) {
    //
    $.ajax({
        url: "<?=base_url('form-nilai-mapel')?>",
        data: {
            kelas_id: kelas_id,
            csb_akun_id: <?=json_encode($csb->id)?>,
            sttb_id: <?=json_encode($csb->master_jenis_sekolah_asal_id)?>
        },
        dataType: "json",
        success: function(response) {
            $('#nilai-rapor-siswa').html(response.mapel)
        }
    });


}

function PilihKelas(kelas_id) {
    LoadMapelList(kelas_id)

}
</script>
<script>
$(document).ready(function() {
    LoadBiodata(<?=json_encode($csb->id)?>)
    var $nilai_rapor = $("#nilai_rapor");
    var jalur = $nilai_rapor.data("jalur");
    var nilaijalurmin = $nilai_rapor.data("nilaijalurmin");
    var nilai_rapor = parseFloat($nilai_rapor.text());

    // console.log(nilai_rapor)
    // console.log(jalur)
    // console.log(nilaijalurmin)

    if (isNaN(nilai_rapor) || isNaN(jalur) || isNaN(nilaijalurmin)) {
        $("#result").text("Data tidak valid.");
    } else {

        // Cek nilai 
        if (nilai_rapor >= nilaijalurmin) {
            $("#result").addClass('bg-success');
            $("#result").html(
                "<div class='text-white text-center'>Nilai Rapor Layak</div>"
            );
        } else {
            $("#result").removeClass('bg-success');
            $("#result").addClass('bg-danger');
            $("#result").html(
                "<div class='text-center'>Maaf ! Nilai Rapor Tidak Layak. Nilai minimal untuk Jalur ini adalah : " +
                nilaijalurmin + "</div>");

        }


    }


});


// biodata-area
function LoadBiodata(id) {
    $.ajax({
        url: "<?=base_url('admin/student/form-biodata')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            $('#biodata-area').html(response.form_biodata)
        }
    });

}

// VerifyBuktiBayar
function VerifyBuktiBayar(id) {

    $.ajax({
        url: "<?=base_url('payment/view-bukti')?>",
        data: {
            id: id,
            whatsapp: <?=json_encode($csb->whatsapp)?>,
        },
        dataType: "json",
        success: function(response) {
            $('.modalsview').html(response.form_bukti_bayar).show()
            $('#modal-bukti-bayar').modal('show')
        }
    });
}

// Upload Foto 
function UploadFoto(id) {
    $.ajax({
        url: "<?=base_url('uploads/form-foto-student')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            $('.modalsview').html(response.form_foto).show()
            $('#modal-foto').modal('show');
        }
    });
}


// Reset Nilai

function ResetNilai(id) {
    Swal.fire({
        title: 'Reset Nilai?',
        text: "Reset Nilai akan menghapus seluruh data nilai yang telah ada. anda dapat entry data nilai yang baru",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Reset it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?=base_url('admin/student/hapus-nilai')?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        Swal.fire(
                            'Deleted!',
                            'Your Grade has been deleted.',
                            'success'
                        ).then((result) => {
                            window.location.reload()
                        })
                    }
                }
            });

        }
    })
}

// Kirim Pesan WA 
$('#btn-kirim-pesan-wa').click(function(e) {
    e.preventDefault();
    Swal.fire({
        // title: 'Tuliskan Pesan Anda :',
        // input: 'input: 'textarea',',
        input: 'textarea',
        inputLabel: 'Tuliskan Pesan Anda :',
        inputPlaceholder: 'Type your message here...',
        inputAttributes: {
            'aria-label': 'Type your message here'
        },
        showCancelButton: true,
        confirmButtonColor: '#63cb77',
        confirmButtonText: 'Kirim Pesan WhatsApp',
    }).then((result) => {
        if (result.isConfirmed) {
            const keterangan = result.value; // Mengambil nilai dari input textarea

            $.ajax({
                type: "post",
                url: "<?=base_url('admin/student/send-whatsapp')?>",
                data: {
                    csb_id: <?=json_encode($csb->id)?>,
                    pesan: keterangan,
                    whatsapp: <?=json_encode($csb->whatsapp)?>
                },
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.msg,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.reload()
                    })
                }
            });
        }
    })

});

// Ganti Password 
function ChangePassword(id) {
    Swal.fire({
        // title: 'Tuliskan Pesan Anda :',
        // input: 'input: 'textarea',',
        input: 'text',
        inputLabel: 'Password Baru',
        inputPlaceholder: 'Masukkan Password Baru',
        showCancelButton: true,
        // confirmButtonColor: '#63cb77',
        confirmButtonText: 'Change Password',
    }).then((result) => {
        if (result.isConfirmed) {
            const input_password = result.value; // Mengambil nilai dari input textarea

            $.ajax({
                type: "post",
                url: "<?=base_url('admin/student/change-password')?>",
                data: {
                    csb_id: id,
                    new_password: input_password,
                    whatsapp: <?=json_encode($csb->whatsapp)?>
                },
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.msg,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.reload()
                    })
                }
            });
        }
    })
}

// Hapus Tagihan 
function DeleteTagihan(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Tagihan akan dihapus secara permanent !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?=base_url('admin/student/del-tagihan')?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.msg,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.reload()
                    })
                }
            });
        }
    })
}
</script>
<?= $this->endSection() ?>