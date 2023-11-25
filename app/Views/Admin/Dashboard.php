<?= $this->extend('Admin/Layouts') ?>

<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">

                <div class="col-lg-4">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-teal"><i class="far fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Selesai Daftar Ulang</span>
                            <span class="info-box-number">xx</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-lg-4">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-teal"><i class="far fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Santri Putra</span>
                            <span class="info-box-number">xx</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-lg-4">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-teal"><i class="far fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Santri Putri</span>
                            <span class="info-box-number">xx</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>

        </div>
        <div class="col-lg-4">

            <div class="card card-teal card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-calendar-check me-3"></i> Register Today</h3>
                </div>
                <div class="card-body">
                    <div class="input-group mt-0 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="date" id="tanggal" class="form-control form-control-sm" value="<?=date('Y-m-d')?>"
                            placeholder="00-00-0000">
                    </div>
                    <div id="list-reg-day"></div>

                    <div id="loading-reg-day" style="display: none;">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-grow spinner-grow-sm text-teal" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- By Kab  -->
            <div class="card card-teal card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-map-marked-alt me-3"></i> Register Kabupaten</h3>
                </div>
                <div class="card-body">
                    <div id="list-reg-kab"></div>

                    <div id="loading-reg-kab" style="display: none;">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-grow spinner-grow-sm text-teal" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Default box -->

    <!-- /.card -->

</section>
<!-- /.content -->
<script>
$(document).ready(function() {
    var tanggal = $('#tanggal').val();
    $('#tanggal').change(function(e) {
        e.preventDefault();
        RegisterToday($(this).val());

    });
    RegisterToday(tanggal);
    RegisterByKab()

});

function RegisterToday(tanggal) {
    $('#loading-reg-day').show();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/counter/reg-today')?>",
        data: {
            tanggal: tanggal
        },
        dataType: "json",
        success: function(response) {
            $('#loading-reg-day').hide();
            $('#list-reg-day').html(response.reg_today);
        },
        error: function() {
            $('#loading-reg-day').hide();
        }
    });

}

function RegisterByKab() {
    // Tampilkan spinner
    $('#loading-reg-kab').show();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/counter/reg-kab')?>",
        dataType: "json",
        success: function(response) {
            $('#loading-reg-kab').hide();
            $('#list-reg-kab').html(response.reg_kab);
        },
        error: function() {
            $('#loading-reg-kab').hide();
        }
    });

}
</script>
<?= $this->endSection() ?>