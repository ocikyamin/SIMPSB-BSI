<div class="callout callout-success p-2">
    Pengaturan <b>Nama Pekerjaan</b>
</div>
<div class="table-responsive">
    <table class="table table-hover table-sm mid text-sm">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th>Nama Pekerjaan</th>
                <th><i class="fa fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <div id="area-input-pkj"></div>
                    <input type="hidden" name="id" id="txtIDpkj">
                    <input type="text" name="pekerjaan" id="txtpekerjaan" placeholder="Masukkan Nama Pekerjaan"
                        class="form-control form-control-sm bg-light">
                </td>
                <td>
                    <button type="submit" id="btn-save-pekerjaan" class="btn btn-default btn-sm bg-teal"><i
                            class="fa fa-check-circle"></i>
                        Save</button>
                </td>
            </tr>
            <?php
            $i=1;
            foreach ($list as $d) {?>
            <tr>
                <td class="text-center"><?=$i++?></td>
                <td><?=$d['pekerjaan']?></td>
                <td>
                    <a onclick="PekerjaanEdit(<?=$d['id']?>)" class="text-teal"><i class="fa fa-edit"></i></a>
                    <a onclick="PekerjaanDelete(<?=$d['id']?>)" class="text-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
// simpan Pekerjaan 
$('#btn-save-pekerjaan').click(function(e) {
    e.preventDefault();
    let txtIDpkj = $('#txtIDpkj').val();
    let txtPekerjaan = $('#txtpekerjaan').val();
    if (txtPekerjaan !== "") {
        $('#txtpekerjaan').removeClass('is-invalid')
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/master/pekerjaan/store')?>",
            data: {
                id: txtIDpkj,
                pekerjaan: txtPekerjaan
            },
            dataType: "json",
            success: function(response) {
                if (response.status == true) {
                    toastr.success('Nama Pekerjaan Ditambahkan', 'Berhasil')
                    LoadPekerjaan()
                }
            }
        });
    } else {

        $('#txtpekerjaan').addClass('is-invalid')
    }
});

function PekerjaanEdit(id) {
    $('#txtIDpkj').val(id)
    $('#area-input-pkj').html('Tuliskan Nama Pekerjaan Pengganti')

}


function PekerjaanDelete(id) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/master/pekerjaan/del')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.status == true) {
                toastr.success('Nama Pekerjaan Dihapus', 'Berhasil')
                LoadPekerjaan()
            }
        }
    });
}
</script>