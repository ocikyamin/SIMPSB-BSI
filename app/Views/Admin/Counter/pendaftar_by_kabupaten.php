<table class="table table-sm text-sm">
    <tr>
        <td>#</td>
        <td>Nama Kabupaten</td>
        <td class="text-center">Jumlah</td>
    </tr>
    <?php
    $i=1;
    foreach ($kab_list as $d) {
        // $jml = countRegistrationsByKabupaten($d['id']);
        ?>
    <tr>
        <td><?=$i++?></td>
        <td><a href="<?=base_url('admin/student/kab/'.base64_encode($d['id']))?>"><?=$d['name']?></a></td>
        <td class="text-center"><?=$d['jml']?></td>
    </tr>
    <?php } ?>

</table>