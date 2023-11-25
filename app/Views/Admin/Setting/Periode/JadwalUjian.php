<form id="form-jadwal-ujian">
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
                <th>Tanggal Ujian</th>
                <th>Waktu Ujian</th>
                <th>Tempat Ujian</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $i=1;
        foreach ($jalur_list as $j) {
            $jadwal = GetJadwalUjian($periode_id, $j['id']);
            ?>
            <tr class="<?=$jadwal == null ? 'bg-danger': null?>">
                <td class="text-center"><?=$i++?>.</td>
                <td class="text-bold"><?=$j['jalur_name']?></td>
                <td>
                    <input type="hidden" name="id[]" value="<?=$jadwal == null ? null: $jadwal->id?>">
                    <input type="hidden" name="master_jalur_id[]" value="<?=$j['id']?>">
                    <input type="date" name="tanggal_ujian[]" class="form-control form-control-sm"
                        value="<?=$jadwal == null ? null: $jadwal->tanggal_ujian?>">
                </td>
                <td>
                    <input type="text" name="waktu_ujian[]" class="form-control form-control-sm"
                        value="<?=$jadwal == null ? null: $jadwal->waktu_ujian?>">
                </td>
                <td>
                    <input type="text" name="tempat_ujian[]" class="form-control form-control-sm"
                        value="<?=$jadwal == null ? null: $jadwal->tempat_ujian?>">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</form>
<script>
$('#form-jadwal-ujian').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/periode/jadwal/save/ujian')?>",
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