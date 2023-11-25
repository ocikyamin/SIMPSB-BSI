<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="table-responsive">
    <table id="student-list" class="table table-bordered table-striped table-sm text-sm mid">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th><i class="far fa-user me-2"></i> No.Reg</th>
                <th>Nama</th>
                <th class="text-center">L/P</th>
                <th>Jalur</th>
                <th>Unit</th>
                <th class="text-center">Asrama</th>
                <th>Tagihan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            foreach ($student_list as $d) {                
                ?>
            <tr>
                <td class="text-center"><?=$i++?>.</td>
                <td><a href="<?=base_url('admin/student/detail/'.$d['id'])?>"
                        class="btn btn-default btn-sm m-0 shadow-sm text-bold">
                        <i class="far fa-user"></i>
                        <?=$d['noreg']?></a></td>
                <td><?=$d['nama_lengkap']?></td>
                <td class="text-center"><?=$d['gender']?></td>
                <td><?=$d['jalur_name']?></td>
                <td><?=$d['level_name']?></td>
                <td class="text-center"><?=$d['is_asrama']?></td>
                <td>
                    <?php
                    foreach (StatusBayar($d['id']) as $b) {?>
                    <li class="m-0"><?=ucfirst($b['jenis_biaya'])?> :
                        <?php
            if ($b['status_pembayaran']=='SUKSES') {
            echo "<span class='badge bg-default bg-teal'>Telah dibayar</span>";
            }else if ($b['status_pembayaran']=='WAITING') {
            echo "<span class='badge bg-default bg-warning'>Harap Periksa</span>";
            }else if ($b['status_pembayaran']=='FAIL') {
            echo "<span class='badge bg-default bg-danger'>Bukti Ditolak</span>";
            }else{
            echo "<span class='badge bg-danger'>Menunggu Pembayaran</span>";
            }

            ?>
                    </li>
                    <?php } ?>
                </td>
                <td>
                    <li class="m-0"> Kelulusan :
                        <?php
                if ($d['status_lulus']=='L') {
                    echo "<span class='badge badge-pill badge-default bg-teal'>LULUS</span>";
                }elseif ($d['status_lulus']=='TL') {
                    echo "<span class='badge badge-pill badge-danger'>TL</span>";
                }else{
                    echo "<span class='badge badge-pill badge-warning'>No Status</span>";
                }
                
                ?>
                    </li>
                    <li> Daftar Ulang :
                        <?php
                if ($d['status_daftar_ulang']=='SELESAI') {
                    echo "<span class='badge badge-pill badge-default bg-teal'>SELESAI</span>";
                }elseif ($d['status_daftar_ulang']=='proses') {
                    echo "<span class='badge badge-pill badge-danger'>PROSES</span>";
                }else{
                    echo "<span class='badge badge-pill badge-warning'>No Status</span>";
                }
                
                ?>
                    </li>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
$(function() {
    $("#student-list").DataTable();
});
</script>