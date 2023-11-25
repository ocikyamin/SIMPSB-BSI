<div class="callout callout-success p-2">
    Pengaturan <b>Jenjang Pendidikan</b>
</div>
<div class="table-responsive">
    <table class="table table-hover table-sm mid text-sm">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th>Pendidikan</th>
                <th><i class="fa fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <div id="area-input-pddk"></div>
                    <input type="hidden" name="id" id="txtIDPddk">
                    <input type="text" name="pendidikan" id="txtPendidikan" placeholder="Masukkan Jenjang Pendidikan"
                        class="form-control form-control-sm bg-light">
                </td>
                <td>
                    <button type="submit" id="btn-save-pddk" class="btn btn-default btn-sm bg-teal"><i
                            class="fa fa-check-circle"></i>
                        Save</button>
                </td>
            </tr>
            <?php
            $i=1;
            foreach ($list as $d) {?>
            <tr>
                <td class="text-center"><?=$i++?></td>
                <td><?=$d['pendidikan']?></td>
                <td>
                    <a onclick="PendidikanEdit(<?=$d['id']?>)" class="text-teal"><i class="fa fa-edit"></i></a>
                    <a onclick="PendidikanDelete(<?=$d['id']?>)" class="text-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
// simpan Pekerjaan 
$('#btn-save-pddk').click(function(e) {
    e.preventDefault();
    let txtIDPddk = $('#txtIDPddk').val();
    let txtPendidikan = $('#txtPendidikan').val();
    if (txtPendidikan !== "") {
        $('#txtPendidikan').removeClass('is-invalid')
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/master/pendidikan/store')?>",
            data: {
                id: txtIDPddk,
                pendidikan: txtPendidikan
            },
            dataType: "json",
            success: function(response) {
                if (response.status == true) {
                    toastr.success('Pendidikan Ditambahkan', 'Berhasil')
                    LoadPendidikan()
                }
            }
        });
    } else {

        $('#txtPendidikan').addClass('is-invalid')
    }
});

function PendidikanEdit(id) {
    $('#txtIDPddk').val(id)
    $('#area-input-pddk').html('Tuliskan Pendidikan Pengganti')

}


function PendidikanDelete(id) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/master/pendidikan/del')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.status == true) {
                toastr.success('Nama Pekerjaan Dihapus', 'Berhasil')
                LoadPendidikan()
            }
        }
    });
}
</script>