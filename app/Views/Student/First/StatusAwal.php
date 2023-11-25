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
            <div class="col-lg-12">
                <h1>Welcome</h1>
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
            <div class="bs-stepper-header table-responsive mb-3" role="tablist">
                <!-- your steps here -->
                <div id="nilai-div" class="step active" data-target="#nilai-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="nilai-part"
                        id="nilai-part-trigger" aria-selected="true">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Nilai Rapor</span>
                    </button>
                </div>
                <div class="line"></div>
                <div id="pembayaran-div" class="step" data-target="#pembayaran-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="pembayaran-part"
                        id="pembayaran-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Pembayaran</span>
                    </button>
                </div>
                <div class="line"></div>
                <div id="jadwal-div" class="step" data-target="#jadwal-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="jadwal-part"
                        id="jadwal-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Jadwal Tes</span>
                    </button>
                </div>

            </div>
            <div class="bs-stepper-content text-sm">
                <!-- your steps content here -->
                <div id="nilai-part" class="content active dstepper-block" role="tabpanel"
                    aria-labelledby="nilai-part-trigger">

                    <!-- Data Siswa  -->
                    <div class="row">

                        <div class="col-lg-9">
                            <div class="card card card-teal card-outline">
                                <div class="card-body text-sm">
                                    <p>
                                        Terimakasih Ayah / Bunda telah melakukan pendaftaran pada
                                        Sistem Penerimaan Santri Baru MTI Canduang. Lanjutkan pendaftaran dengan mengisi
                                        nilai rapor dan
                                        mengunggah foto calon santri.


                                    </p>


                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm mid"
                                            style="text-transform:uppercase">
                                            <tr>
                                                <td rowspan="2">Kelas</td>
                                                <td colspan="2" class="text-center">Rata-Rata Semester</td>
                                                <td rowspan="2" class="text-center">Rata-Rata Kelas</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">2</td>
                                            </tr>
                                            <?php
                            $csb_akun_id = $csb->id;
                            // var_dump($rataRaporList);
                            $rataRaporList = []; // Inisialisasi array untuk menyimpan rata-rata rapor
                            foreach ($list_kelas as $k) {
                            $rataSemester = RataRataSemester($csb->id, $k['id']);
                            // var_dump($status);
                            $rataRaporKelas = ($rataSemester->rata_rata_semester_1 + $rataSemester->rata_rata_semester_2) / 2;
                            $rataRaporList[] = $rataRaporKelas; // Simpan rata-rata rapor dalam array
                            ?>
                                            <tr>
                                                <td>
                                                    <!-- <?= $k['kelas'] ?> -->
                                                    <div class="form-group m-0">
                                                        <div class="icheck-teal d-inline">
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
                                        <p>
                                        <div id="change_jalur"></div>
                                        </p>

                                    </div>
                                    <div id="nilai-mapel-area"></div>
                                    <!-- Biodata Awal  -->
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-teal card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <?php
                                        $foto = $status_foto==null ? 'no_image.png': $status_foto;
                                        ?>
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="<?=base_url('files/_foto/'.$foto)?>" alt="User profile picture"
                                            style="width:90px;height:90px">
                                    </div>

                                    <h3 class="profile-username text-center"><?=$csb->nama_lengkap?></h3>

                                    <p class="text-muted text-center"><?=$csb->nisn?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <!-- <li class="list-group-item">
                                            <b>Periode</b> <a class="float-right"><?=$csb->periode?> -
                                                <?=$csb->tahap_daftar?></a>
                                        </li> -->
                                        <li class="list-group-item">
                                            <b>Jalur</b> <a class="float-right"><?=$csb->jalur_name?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Unit</b> <a class="float-right"><?=$csb->level_name?></a>
                                        </li>
                                    </ul>
                                    <div>


                                        <button onclick="UploadFoto(<?=$csb->id?>)"
                                            class="btn btn-default bg-navy shadow-sm btn-block"><b><i
                                                    class="fas fa-cloud-upload-alt"></i> Upload Foto</b></button>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <?php
                            // Aktifkan Tombol Ke pembayaran jika telah mengisi nili dan upload foto
                            if ($status_nilai==NULL || $nilai_akhir < $csb->nilai_minimal  || $status_foto==NULL) {

                            ?>
                            <button class="btn btn-default btn-block bg-teal mb-3" disabled>
                                Selanjutnya
                                <i class="fas fa-arrow-right"></i> </button>
                            <?php
                            }else{
                            ?>
                            <button class="btn btn-default btn-block bg-teal mb-3" onclick="stepper.next()">
                                Selanjutnya
                                <i class="fas fa-arrow-right"></i> </button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-- End Data Siswa  -->

                </div>

                <div id="pembayaran-part" class="content" role="tabpanel" aria-labelledby="pembayaran-part-trigger">
                    <!-- Pembayaran  -->
                    <div class="form-group">
                        <label for="payment_method">Metode Pembayaran</label>
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="manual" <?=$tagihan->payment_method=='manual'? 'selected' :null?>>
                                Transfer Rekening
                                (Konfirmasi
                                Manual)</option>
                            <option value="va" <?=$tagihan->payment_method==NULL? 'selected' :null?>>Virtual Account
                                (VA)
                                Realtime
                            </option>
                        </select>
                    </div>
                    <div class="mt-3" id="invoice-area"></div>


                    <div class="row mt-3">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-default btn-block mb-3" onclick="stepper.previous()"><i
                                            class="fas fa-arrow-left"></i> Sebelumnya</button>
                                </div>
                                <div class="col-lg-6">
                                    <?php
                                // Aktifkan Tombol Ke jadwal
                                if ($tagihan->status_pembayaran=='SUKSES') {
                                    ?>
                                    <!-- <input type="text"> -->
                                    <button class="btn btn-default btn-block mb-3 bg-teal" onclick="stepper.next()">
                                        Selanjutnya
                                        <i class="fas fa-arrow-right"></i> </button>
                                    <?php
                              
                                }else{
                                    ?>
                                    <button class="btn btn-default btn-block mb-3 bg-teal" disabled>Selanjutnya
                                        <i class="fas fa-arrow-right"></i> </button>
                                    <?php
                                   
                                }
                                ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pembayaran  -->
                </div>
                <div id="jadwal-part" class="content" role="tabpanel" aria-labelledby="jadwal-part-trigger">
                    <!-- Jadwal Tes  -->
                    <?php
                                // Aktifkan Tombol Ke jadwal
                                if ($tagihan->status_pembayaran=='SUKSES') {
                                    ?>

                    <div class="row">
                        <!-- <div class="col-lg-1"></div> -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row border-2 mb-3">
                                        <div class="col-lg-7 text-center">
                                            <h3 class="text-teal">KARTU TANDA PESERTA UJIAN
                                                <div>
                                                    <small class="text-dark">
                                                        CALON SANTRI BARU MTI CANDUANG TP.<?=$csb->periode?>
                                                    </small>
                                                </div>
                                            </h3>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="text-center mt-3">
                                                <?=$barcode?>
                                            </div>
                                        </div>

                                    </div>
                                    <table class="table table-sm mid text-xs text-uppercase">
                                        <tr>
                                            <td>No.Reg / Nomor Peserta</td>
                                            <td>:</td>
                                            <td><?=$csb->noreg?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama / NISN</td>
                                            <td>:</td>
                                            <td><?=$csb->nama_lengkap?> / <?=$csb->nisn?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat & Tanggal Lahir</td>
                                            <td>:</td>
                                            <td><?=$csb->tempat_lahir?> ,
                                                <?=date('d-m-Y', strtotime($csb->tanggal_lahir))?></td>
                                        </tr>
                                        <tr>
                                            <td>Periode Pendaftaran</td>
                                            <td>:</td>
                                            <td><?=$csb->periode?>-<?=$csb->tahap_daftar?></td>
                                        </tr>
                                        <tr>
                                            <td>Jalur Pendaftaran</td>
                                            <td>:</td>
                                            <td><?=$csb->jalur_name?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Ujian</td>
                                            <td>:</td>
                                            <td><?=date('d/m/Y', strtotime($jadwal->tanggal_ujian))?></td>
                                        </tr>
                                        <tr>
                                            <td>Waktu / Tempat Ujian</td>
                                            <td>:</td>
                                            <td><?=$jadwal->waktu_ujian?> / <?=$jadwal->tempat_ujian?></td>
                                        </tr>

                                    </table>

                                </div>

                            </div>

                        </div>
                        <!-- <div class="col-lg-2"></div> -->
                    </div>


                    <div class="row mt-3 mb-3">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-default btn-block mt-2" onclick="stepper.previous()"><i
                                            class="fas fa-arrow-left"></i> Sebelumnya</button>
                                </div>
                                <div class="col-lg-6">
                                    <a target="_blank"
                                        href="<?=base_url('print/kartu/ujian/'.base64_encode($csb->id))?>"
                                        class="btn btn-danger btn-block mt-2">
                                        <i class="fas fa-cloud-download-alt me-3"></i> Download Kartu Ujian
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                              
                                }else{
                                    ?>
                    <div class="alert alert-warning">
                        Jadwal ujian dapat di akses apabila telah melakukan pembayaran.
                    </div>
                    <?php
                                   
                                }
                                ?>

                    <!-- Jadwal Tes  -->
                </div>

            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="modal-view"></div>

<!-- /.content -->
<!-- <script src="<?=base_url()?>assets/js/wilayah.js"></script> -->
<script>
$(document).ready(function() {
    // LoadNilaiMapel(<?=json_encode($csb->id)?>)
    StatusNilai()
    var get_payment_method = $('#payment_method').val();
    LoadInvoice(get_payment_method);
});

// Upload Foto 
function UploadFoto(id) {
    $.ajax({
        url: "<?=base_url('uploads/form-foto-student')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            $('.modal-view').html(response.form_foto).show()
            $('#modal-foto').modal('show');
        }
    });
}

// nilai-mapel-area
// function LoadNilaiMapel(csb_akun_id) {
//     $.ajax({
//         url: "<?=base_url('student/status-nilai-mapel')?>",
//         data: {
//             csb_akun_id: csb_akun_id
//         },
//         dataType: "json",
//         success: function(response) {
//             console.log(response)
//             $('#nilai-mapel-area').html(response.nilai_mapel)
//         }
//     });

// }

function LoadMapelList(kelas_id) {
    //
    $.ajax({
        url: "<?=base_url('form-nilai-mapel')?>",
        data: {
            kelas_id: kelas_id,
            csb_akun_id: <?=json_encode($csb->id)?>,
            sttb_id: <?=json_encode($csb->master_jenis_sekolah_asal_id)?>,
        },
        dataType: "json",
        success: function(response) {
            $('#nilai-mapel-area').html(response.mapel)
        }
    });


}

function PilihKelas(kelas_id) {
    LoadMapelList(kelas_id)

}


function StatusNilai() {
    var Nilai = <?php echo json_encode($status_nilai); ?>;
    var statusFoto = <?php echo json_encode($status_foto); ?>;
    var statusTagihan = <?php echo json_encode($tagihan->status_pembayaran); ?>;
    // console.log(Nilai)
    if (Nilai !== null && statusFoto !== null || statusTagihan !== null) {
        // console.log('aktif kan step pambayaran')
        stepper.next()

        // Aktifkan jadwal
        if (statusTagihan == 'SUKSES') {
            stepper.next()
        }
    }
}

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
                csb_akun_id: <?=json_encode($csb->id)?>,
                payment_method: payment_method,
                jenis_tagihan: 'daftar',
            },
            dataType: "json",
            success: function(response) {
                $('#invoice-area').html(response.form_payment_method)
            }
        });
    }
}
</script>
<script>
$(document).ready(function() {
    var $nilai_rapor = $("#nilai_rapor");
    var jalur = $nilai_rapor.data("jalur");
    var nilaijalurmin = $nilai_rapor.data("nilaijalurmin");
    var nilai_rapor = parseFloat($nilai_rapor.text());

    var nilaiAkhir = <?=json_encode($nilai_akhir)?>;
    if (nilaiAkhir < nilaijalurmin) {
        stepper.previous()
    }

    console.log(nilaiAkhir)
    if (nilaiAkhir > 0 && nilaiAkhir < nilaijalurmin) {
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
                    "<div class='text-center'>Maaf ! Nilai Rapor Tidak Layak. Nilai minimal untuk Jalur ini adalah <b>(" +
                    nilaijalurmin + ")</b>. </div>");
                $('#change_jalur').html(
                    '<em>Perhatian</em> : <div>Jika semua nilai rapor telah di isi dan tetap dinyatakan tidak layak/ tidak mencapai nilai minimum syarat. Maka Panitia akan merubah jalur pendaftaran anda ke jalur Reguler </div>'
                )

            }


        }
    }


});
</script>


<?= $this->endSection() ?>