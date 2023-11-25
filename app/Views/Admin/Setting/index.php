<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
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
                        <h3 class="card-title p-3"><i class="fa fa-cogs"></i> Pengaturan Pendaftaran</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_school" data-toggle="tab"><i
                                        class="fa fa-graduation-cap me-3"></i> Unit Sekolah</a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="#tab_periode" data-toggle="tab"><i
                                        class="fa fa-calendar me-3"></i> Periode Daftar</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tab_jalur" data-toggle="tab"><i
                                        class="far fa-star ne-3 "></i> Jalur Daftar</a>
                            </li>



                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_school">
                                <div id="area_school"></div>
                            </div>
                            <div class="tab-pane" id="tab_periode">
                                <div id="area_periode"></div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_jalur">
                                <div id="area_jalur"></div>
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
    <div class="modalsviews"></div>
</section>

<script>
$(document).ready(function() {
    LoadSchool()
    LoadPeriode()
    LoadJalur()
});
// Unit 
function LoadSchool() {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/school')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('#area_school').html(response.index)
        }
    });
}
// Periode 
function LoadPeriode() {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/periode')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('#area_periode').html(response.index)
        }
    });
}
// Jalur 
function LoadJalur() {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/jalur')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('#area_jalur').html(response.index)
        }
    });
}
</script>

<?= $this->endSection() ?>