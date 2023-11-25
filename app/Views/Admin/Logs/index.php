<?= $this->extend('Admin/Layouts') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Logs</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Logs</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                        aria-selected="true">Pesan Terkirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                        href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                        aria-selected="false">Login Panitia</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                    aria-labelledby="custom-tabs-four-home-tab">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-striped text-sm table-logs">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th><i class="fa fa-user"></i> Pengirim</th>
                                    <th><i class="fa fa-user"></i> Penerima</th>
                                    <th>Pesan</th>
                                    <th><i class="fa fa-history"></i> Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            $i=1;
            foreach ($pesan as $d) {?>
                                <tr>
                                    <td><?=$i++?>.</td>
                                    <td><?=$d['fullname']?></td>
                                    <td><?=$d['nama_lengkap']?></td>
                                    <td><?=$d['pesan']?></td>
                                    <td><?=date('d/m/Y H:i:s', strtotime($d['created_at']))?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="table-responsive">
                        <table class="table-logs table table-sm table-bordered table-striped text-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th><i class="fa fa-user"></i> User</th>
                                    <th><i class="fa fa-history"></i> Time</th>
                                    <th>Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            $i=1;
            foreach ($login as $d) {?>
                                <tr>
                                    <td><?=$i++?>.</td>
                                    <td><?=$d['fullname']?></td>
                                    <td><?=date('d/m/Y H:i:s', strtotime($d['created_at']))?></td>
                                    <td><?=$d['activity']?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-four-messages-tab">
                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id
                    mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac
                    tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                    condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique.
                    Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est
                    libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum
                    metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                    aria-labelledby="custom-tabs-four-settings-tab">
                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac,
                    ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi
                    euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum
                    placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc
                    et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex
                    sit amet facilisis.
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>


</section>
<!-- /.content -->
<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
$(function() {
    $(".table-logs").DataTable()
});
</script>

<?= $this->endSection() ?>