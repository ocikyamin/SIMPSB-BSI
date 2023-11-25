<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Masters</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Masters</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <!-- END ALERTS AND CALLOUTS -->
        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card card-teal card-outline">
                    <div class="card-header bg-light d-flex p-0">
                        <h3 class="card-title p-3"><i class="fa fa-cogs"></i> Pengaturan Data Master</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_pekerjaan" data-toggle="tab">
                                    <i class="fas fa-user-md"></i> Pekerjaan
                                </a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="#tab_penghasilan" data-toggle="tab">
                                    <i class="fas fa-search-dollar"></i>
                                    Penghasilan
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tab_pendidikan" data-toggle="tab">
                                    <i class="fas fa-user-graduate"></i>
                                    Pendidikan
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tab_referensi" data-toggle="tab">
                                    <i class="fas fa-info-circle"></i>
                                    Referensi
                                </a>
                            </li>



                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_pekerjaan">
                                <div id="area_pekerjaan"></div>
                            </div>
                            <div class="tab-pane" id="tab_penghasilan">
                                <div id="area_penghasilan"></div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_pendidikan">
                                <div id="area_pendidikan"></div>
                            </div>
                            <div class="tab-pane" id="tab_referensi">
                                <div id="area_referensi"></div>
                            </div>
                            <!-- /.tab-pane -->


                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
    </div><!-- /.container-fluid -->
</section>


<script>
$(document).ready(function() {
    LoadPekerjaan()
    LoadPenghasilan()
    LoadPendidikan()
    LoadReferensi()
});
// Pekerjaan 
function LoadPekerjaan() {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/master/pekerjaan')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('#area_pekerjaan').html(response.index)
        }
    });
}
// Penghasilan 
function LoadPenghasilan() {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/master/penghasilan')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('#area_penghasilan').html(response.index)
        }
    });
}
// Pendidikan 
function LoadPendidikan() {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/master/pendidikan')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('#area_pendidikan').html(response.index)
        }
    });
}
// Referensi 
function LoadReferensi() {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/master/referensi')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('#area_referensi').html(response.index)
        }
    });
}
</script>

<?= $this->endSection() ?>