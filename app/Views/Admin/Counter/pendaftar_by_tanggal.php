<p>
    Tanggal : <b><?=date('d F Y', strtotime($tanggal))?></b>
</p>
<?php
if ($list) {
    ?>

<table class="table table-sm table-hover">
    <tbody>
        <?php
        $i=1;
        foreach ($list as $d) {?>
        <tr>
            <td class="text-center"><?=$i++?>.</td>
            <td><a href="<?=base_url('admin/student/detail/'.$d['id'])?>" class="text-teal text-sm"><i
                        class="fas fa-search-plus me-2"></i>
                    <?=$d['noreg']?></a></td>
            <td><?=$d['nama_lengkap']?></td>
            <td class="text-center"><?=$d['gender']?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php
}else{
    ?>
<div class="alert alert-warning p-1 text-center">Belum ada pendaftar</div>
<?php
}
?>