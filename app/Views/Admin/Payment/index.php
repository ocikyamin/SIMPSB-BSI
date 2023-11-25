<?= $this->extend('Admin/Layouts') ?>
<?= $this->section('content') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Payment</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Payment</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-payment" class="table table-bordered table-striped table-sm mid text-sm">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Noreg</th>
                                <th>Nama</th>
                                <th>Nominal</th>
                                <th>Tagihan</th>
                                <th>Metode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            $i=1;
            foreach ($list as $d) {?>
                            <tr>
                                <td class="text-center"><?=$i++?>.</td>
                                <td><a href="<?=base_url('admin/student/detail/'.$d['id'])?>"
                                        class="text-teal text-bold"><i class="fas fa-search-plus me-2"></i>
                                        <?=$d['noreg']?></a></td>
                                <td><?=$d['nama_lengkap']?></td>
                                <td><?='Rp.'.number_format($d['nominal_tagihan']) ?></td>
                                <td><?=$d['nama_biaya']?></td>
                                <td><?=$d['payment_method']?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Main content -->
<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
$(function() {
    $("#table-payment").DataTable()
});
</script>

<?= $this->endSection() ?>