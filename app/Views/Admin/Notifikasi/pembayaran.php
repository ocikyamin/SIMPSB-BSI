<?= $this->extend('Admin/Layouts') ?>

<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pembayaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pembayaran</li>
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
            <h3 class="card-title"><i class="far fa-bell"></i> List Bukti Pembayaran</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- DataTables -->
            <link rel="stylesheet"
                href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <div class="table-responsive">
                <table id="list-pembayaran" class="table table-bordered table-striped table-sm text-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th><i class="fa fa-cog"></i> No.Reg</th>
                            <th>Nama</th>
                            <th>Pembayaran</th>
                            <th>Jumlah dibayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $i=1;
            foreach ($tagihan_bayar as $d) {?>
                        <tr>
                            <td><?=$i++?>.</td>
                            <td><a href="<?=base_url('admin/student/detail/'.$d['csb_akun_id'])?>"
                                    class="text-teal text-bold"><i class="fas fa-search-plus me-2"></i>
                                    <?=$d['noreg']?></a></td>
                            <td><?=$d['nama_lengkap']?></td>
                            <td><?=$d['nama_biaya']?></td>
                            <td><?=$d['jumlah_transfer']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- DataTables -->
            <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script>
            $(function() {
                $("#list-pembayaran").DataTable();
            });
            </script>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<?= $this->endSection() ?>