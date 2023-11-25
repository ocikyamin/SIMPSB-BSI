<div class="callout callout-success p-2">
    Pengaturan <b>Referensi</b>
</div>
<div class="table-responsive">
    <table class="table table-hover table-sm mid text-sm">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th>Nama Referensi</th>
                <th><i class="fa fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <div id="area-input-ref"></div>
                    <input type="hidden" name="id" id="txtIDRef">
                    <input type="text" id="txtReferensi" placeholder="Masukkan Nama Referensi"
                        class="form-control form-control-sm bg-light">
                </td>
                <td>
                    <button type="submit" id="btn-save-referensi" class="btn btn-default btn-sm bg-teal"><i
                            class="fa fa-check-circle"></i>
                        Save</button>
                </td>
            </tr>
            <?php
            $i=1;
            foreach ($list as $d) {?>
            <tr>
                <td class="text-center"><?=$i++?></td>
                <td><?=$d['nama_referensi']?></td>
                <td>
                    <a onclick="ReferensiEdit(<?=$d['id']?>)" class="text-teal"><i class="fa fa-edit"></i></a>
                    <a onclick="ReferensiDelete(<?=$d['id']?>)" class="text-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
// simpan Pekerjaan 
$('#btn-save-referensi').click(function(e) {
    e.preventDefault();
    let txtIDRef = $('#txtIDRef').val();
    let txtReferensi = $('#txtReferensi').val();
    if (txtReferensi !== "") {
        $('#txtReferensi').removeClass('is-invalid')
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/master/referensi/store')?>",
            data: {
                id: txtIDRef,
                referensi: txtReferensi
            },
            dataType: "json",
            success: function(response) {
                if (response.status == true) {
                    toastr.success('Referensi Ditambahkan', 'Berhasil')
                    LoadReferensi()
                }
            }
        });
    } else {

        $('#txtReferensi').addClass('is-invalid')
    }
});

function ReferensiEdit(id) {
    $('#txtIDRef').val(id)
    $('#area-input-ref').html('Tuliskan Referensi Pengganti')

}


function ReferensiDelete(id) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/master/referensi/del')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.status == true) {
                toastr.success('Nama Referensi Dihapus', 'Berhasil')
                LoadReferensi()
            }
        }
    });
}
</script>