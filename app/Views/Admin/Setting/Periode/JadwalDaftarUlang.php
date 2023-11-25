<form id="form-jadwal-daftar-ulang">
    <?=csrf_field()?>
    <input type="hidden" name="master_periode_id" value="<?=$periode_id?>">
    <div>
        <button type="submit" class="btn btn-default btn-sm mb-3"><i class="fa fa-check-circle"></i>
            Save</button>
    </div>
    <table class="table table-hover table-sm text-sm mid">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th>Jalur Pendaftaran</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $i=1;
        foreach ($jalur_list as $j) {
            $jadwal = GetJadwalDU($periode_id, $j['id']);
            ?>
            <tr class="<?=$jadwal == null ? 'bg-danger': null?>">
                <td class="text-center"><?=$i++?>.</td>
                <td class="text-bold"><?=$j['jalur_name']?></td>
                <td>
                    <input type="hidden" name="id[]" value="<?=$jadwal == null ? null: $jadwal->id?>">
                    <input type="hidden" name="master_jalur_id[]" value="<?=$j['id']?>">
                    <input type="date" name="tanggal_mulai[]" class="form-control form-control-sm"
                        value="<?=$jadwal == null ? null: $jadwal->tanggal_mulai?>">
                </td>
                <td>
                    <input type="date" name="tanggal_akhir[]" class="form-control form-control-sm"
                        value="<?=$jadwal == null ? null: $jadwal->tanggal_akhir?>">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</form>
<script>
$('#form-jadwal-daftar-ulang').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/periode/jadwal/save/du')?>",
        data: $(this).serialize(),
        dataType: "json",
        success: function(response) {
            if (response.status = true) {
                toastr.success(response.msg, 'Berhasil')
                LoadPeriode()
            }
        }
    });

});
</script>