<table class="table table-bordered table-striped table-sm text-sm mid">
    <thead>
        <tr>
            <th colspan="2">Jalur Daftar</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($jadwal_list as $j) {
            ?>
        <tr class="bg-dark">
            <td colspan="2" class="text-bold"><?=$j['jalur_name']?></td>
            <td><?=date('d F Y', strtotime($j['tanggal_ujian']))?></td>
        </tr>
        <?php
        $no =1;
        foreach (PesertaUjian($j['master_jalur_id']) as $s) {?>
        <tr>
            <td class="text-center text-bold"><?=$no++?>.</td>
            <td><?=$s['nama_lengkap']?></td>
            <td>
                <a href="<?=base_url('admin/student/detail/'.$s['id'])?>" class="btn btn-default btn-sm">Detail</a>
                <a href="<?=base_url('print/kartu/ujian/'. base64_encode($s['id']))?>" target="_blank"
                    class="btn btn-default btn-xs"><i class="fa fa-print"></i></a>

            </td>
        </tr>
        <?php } ?>
        <?php } ?>
    </tbody>
</table>