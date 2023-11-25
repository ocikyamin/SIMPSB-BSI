<?= $this->extend('Admin/Layouts') ?>

<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Presensi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <form id="form-presensi" method="post">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                            </div>
                            <input type="text" name="nisn" class="form-control bg-light" id="input-scan"
                                placeholder="Scan Barcode / NISN" autocomplete="off">

                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="form-group mb-2">
                            <!-- <label for="periode">Periode Pendaftaran</label> -->
                            <select name="periode_id" class="custom-select" id="periode">
                                <option value="all">Semua Periode</option>
                                <?php
                            foreach (TabelMaster('master_periode') as $p) {?>
                                <option value="<?=$p['id']?>" <?=$p['is_active']==1? 'selected':null?>>
                                    <?=$p['periode']?>-<?=$p['tahap_daftar']?>
                                    <?=$p['is_active']==1 ? '( Aktif )':null?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="p-2 shadow-sm mt-0 bg-light" style="border:2px dotted;border-radius:50px">
                            <div class="form-group clearfix m-0">
                                <div class="icheck-teal d-inline">
                                    <input type="radio" id="type-masuk" name="type_scan" value="MASUK">
                                    <label for="type-masuk">
                                        MASUK
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="type-keluar" name="type_scan" value="KELUAR">
                                    <label for="type-keluar">
                                        KELUAR
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </form>
        </div>
        <div class="card-body">
            <div id="list-presensi" class="table-responsive"></div>
            <div id="loading-list-presensi" style="display: none;">
                <div class="d-flex justify-content-center">
                    <div class="spinner-grow spinner-grow-lg text-teal" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- Menambahkan script jQuery untuk mengarahkan kursor ke input -->
<!-- Menambahkan script jQuery untuk mempertahankan fokus pada input -->
<script>
$(document).ready(function() {
    var inputElement = $("#input-scan");
    // Fokuskan kursor ke input saat halaman dimuat
    inputElement.focus();
    // Periksa apakah input kehilangan fokus (blur)
    inputElement.on("blur", function() {
        // Jika kehilangan fokus, kembalikan fokus ke input
        inputElement.focus();
    });
    // Select Periode 
    var periode = $('#periode').val();
    $('#periode').change(function(e) {
        e.preventDefault();
        LoadListPresensi($(this).val());
    });
    LoadListPresensi(periode)
});

$('#form-presensi').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/presensi/store')?>",
        data: $(this).serialize(),
        dataType: "json",
        success: function(response) {
            if (response.status == false) {
                // console.log(response)
                $("#input-scan").focus()
                $("#input-scan").val('')
                $("#input-scan").addClass('is-invalid')
                if (response.nisn) {
                    toastr.warning(response.nisn, 'Warning')
                }
                if (response.type_scan) {
                    toastr.warning(response.type_scan, 'Warning')
                }
            }
            if (response.status == true) {
                $("#input-scan").focus()
                $("#input-scan").val('')
                $("#input-scan").removeClass('is-invalid')
                toastr.success('Presensi ' + response.type_scan + ' atas Nama ' + response.nama +
                    ' Direkam', 'Berhasil')
                LoadListPresensi(response.periode_id)
            }
        }
    });


});

function LoadListPresensi(periode) {
    $('#loading-list-presensi').show();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/presensi/list')?>",
        data: {
            periode_id: periode
        },
        dataType: "json",
        success: function(response) {
            $('#loading-list-presensi').hide();
            $('#list-presensi').html(response.list_presensi)
        },
        error: function() {
            $('#loading-list-presensi').hide();
        }
    });

}
</script>
<!-- /.content -->
<?= $this->endSection() ?>