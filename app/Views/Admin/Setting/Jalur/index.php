<div>
    <button onclick="JalurAdd()" class="btn btn-default btn-sm mb-3"><i class="fa fa-plus-circle"></i>
        Add</button>
</div>
<div class="table-responsive">
    <table class="table table-hover table-sm mid text-sm">
        <thead class="bg-light">
            <tr>
                <th class="text-center">No</th>
                <th>Nama Jalur Daftar</th>
                <th>Nilai Minimal</th>
                <th>Status</th>
                <th><i class="fa fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            foreach ($list as $d) {?>
            <tr>
                <td class="text-center"><?=$i++?>.</td>
                <td><?=$d['jalur_name']?></td>
                <td><?=$d['nilai_minimal']?></td>
                <td>
                    <div class="form-group m-0">
                        <div class="custom-control custom-switch">
                            <input onclick="JalurSetStatus(<?=$d['id']?>,<?=$d['is_active']?>)" type="checkbox"
                                class="custom-control-input" id="set-jalur-<?=$d['id']?>"
                                <?=$d['is_active']==1 ? 'checked':null?>>
                            <label class="custom-control-label"
                                for="set-jalur-<?=$d['id']?>"><?=$d['is_active']==1 ? '<span class="badge badge-success">Aktif</span>':'<span class="badge badge-danger">No Aktif</span>' ?></label>
                        </div>
                    </div>
                </td>
                <td>
                    <button onclick="JalurSyarat(<?=$d['id']?>)" class="btn btn-default btn-sm shadow-sm"><i
                            class="fa fa-list"></i> Syarat Jalur</button>
                    <button onclick="JalurEdit(<?=$d['id']?>)" class="btn btn-default btn-sm shadow-sm"><i
                            class="fa fa-edit"></i></button>
                    <button onclick="JalurDelete(<?=$d['id']?>)" class="btn btn-default btn-sm shadow-sm"><i
                            class="fa fa-trash"></i></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
// Add Jalur 
function JalurAdd() {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/jalur/add')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('#area_jalur').html(response.add).show()
        }
    });
}

function JalurEdit(id) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/jalur/edit')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            $('#area_jalur').html(response.edit).show()
        }
    });
}


function JalurDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?=base_url('admin/setting/jalur/delete')?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        toastr.success('Unit Sekolah Dihapus..', 'Berhasil')
                        LoadJalur()
                    }
                }
            });
        }
    });

}

// Set Status 
function JalurSetStatus(id, status) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/jalur/status')?>",
        data: {
            id: id,
            status: status,
        },
        dataType: "json",
        success: function(response) {
            if (response.status == true) {
                toastr.success(response.msg, 'Berhasil')
                LoadJalur()
            }
        }
    });
}

function JalurSyarat(id) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/jalur/syarat')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            $('#area_jalur').html(response.syarat).show()
        }
    });
}
</script>