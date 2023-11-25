<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<div class="table-responsive">
    <table id="table-daftar-ulang" class="table table-bordered table-striped table-sm text-sm mid">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th><i class="far fa-user me-2"></i> No.Reg</th>
                <th>Nama</th>
                <th class="text-center">L/P</th>
                <!-- <th>Jalur</th>
                <th>Unit</th> -->
                <!-- <th class="text-center">Asrama</th> -->
                <th>Tagihan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            foreach ($daftar_ulang_list as $d) {                
                ?>
            <tr>
                <td class="text-center"><?=$i++?>.</td>
                <td><a href="<?=base_url('admin/student/detail/'.$d['id'])?>"
                        class="btn btn-default btn-sm m-0 shadow-sm text-bold">
                        <i class="far fa-user"></i>
                        <?=$d['noreg']?></a></td>
                <td><?=$d['nama_lengkap']?></td>
                <td class="text-center"><?=$d['gender']?></td>
                <!-- <td><?=$d['jalur_name']?></td>
                <td><?=$d['level_name']?></td> -->
                <!-- <td class="text-center"><?=$d['is_asrama']?></td> -->
                <td>
                    <?php
                    $status_du = StatusBayarDu($d['id']);
                    // var_dump($status_du);
                    if ($status_du) {
                        echo "<div><b>Rp.".number_format($status_du->nominal_tagihan,2)."</b> </div>";
                        if ($status_du->status_pembayaran=='SUKSES') {
                            # code...
                            echo "<span class='badge badge-pill badge-default bg-teal'>Telah Bayar</span>";
                        }elseif ($status_du->status_pembayaran=='WAITING') {
                            # code...
                            echo "<span class='badge badge-pill badge-warning'>Harap Periksa</span>";
                        }elseif ($status_du->status_pembayaran=='FAIL') {
                            # code...
                            echo "<span class='badge badge-pill badge-warning'>Bukti Ditolak</span>";
                        }elseif ($status_du->status_pembayaran==NULL) {
                            # code...
                            echo "<span class='badge badge-pill badge-danger'>Belum Dibayar</span>";
                        }

                        // csb_tagihan_pembayaran.nominal_tagihan,
                        // csb_tagihan_pembayaran.status_pembayaran,
                        # code...
                    }else{
                        echo "Belum ada tagihan";
                    }
                    ?>



                    </li>
                </td>
                <td><?php
                if ($d['status_daftar_ulang']=='SELESAI') {
                    echo "<span class='badge badge-pill badge-default bg-teal'>SELESAI</span>";
                }elseif ($d['status_daftar_ulang']=='proses') {
                    echo "<span class='badge badge-pill badge-warning'>PROSES</span>";
                }else{
                    echo "<span class='badge badge-pill badge-danger'>BELUM DAFTAR ULANG</span>";
                }
                
                ?></td>

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
    $("#table-daftar-ulang").DataTable();
});
</script>