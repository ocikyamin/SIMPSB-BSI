<div class="callout callout-success p-2">
    Pengaturan <b>Besaran Penghasilan</b>
</div>
<div class="table-responsive">
    <table class="table table-hover table-sm mid text-sm">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th>Jumlah Penghasilan</th>
                <th><i class="fa fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <div id="area-input-phsl"></div>
                    <input type="hidden" name="id" id="txtIDPhsl">
                    <input type="text" name="penghasilan" id="txtPenghasilan" placeholder="Masukkan Rentang Penghasilan"
                        class="form-control form-control-sm bg-light">
                </td>
                <td>
                    <button type="submit" id="btn-save-penghasilan" class="btn btn-default btn-sm bg-teal"><i
                            class="fa fa-check-circle"></i>
                        Save</button>
                </td>
            </tr>
            <?php
            $i=1;
            foreach ($list as $d) {?>
            <tr>
                <td class="text-center"><?=$i++?></td>
                <td><?=$d['penghasilan']?></td>
                <td>
                    <a onclick="PenghasilanEdit(<?=$d['id']?>)" class="text-teal"><i class="fa fa-edit"></i></a>
                    <a onclick="PenghasilanDelete(<?=$d['id']?>)" class="text-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
// simpan Pekerjaan 
$('#btn-save-penghasilan').click(function(e) {
    e.preventDefault();
    let txtIDPhsl = $('#txtIDPhsl').val();
    let txtPenghasilan = $('#txtPenghasilan').val();
    if (txtPenghasilan !== "") {
        $('#txtPenghasilan').removeClass('is-invalid')
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/master/penghasilan/store')?>",
            data: {
                id: txtIDPhsl,
                penghasilan: txtPenghasilan
            },
            dataType: "json",
            success: function(response) {
                if (response.status == true) {
                    toastr.success('Penghasilan Ditambahkan', 'Berhasil')
                    LoadPenghasilan()
                }
            }
        });
    } else {

        $('#txtPenghasilan').addClass('is-invalid')
    }
});

function PenghasilanEdit(id) {
    $('#txtIDPhsl').val(id)
    $('#area-input-phsl').html('Tuliskan Penghasilan Pengganti')

}


function PenghasilanDelete(id) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/master/penghasilan/del')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.status == true) {
                toastr.success('Nama Pekerjaan Dihapus', 'Berhasil')
                LoadPenghasilan()
            }
        }
    });
}
</script>