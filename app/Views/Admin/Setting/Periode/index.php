<div>
    <button onclick="PeriodeAdd()" class="btn btn-default btn-sm mb-3"><i class="fa fa-plus-circle"></i>
        Add</button>
</div>
<div class="table-responsive">
    <table class="table table-hover table-sm mid text-sm">
        <thead class="bg-light">
            <tr>
                <th class="text-center">No</th>
                <th>Periode / TP</th>
                <th>Tahap / Gelombang</th>
                <th>Status Pendaftaran</th>
                <th><i class="fa fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            foreach ($list as $d) {?>
            <tr>
                <td class="text-center"><?=$i++?>.</td>
                <td><?=$d['periode']?></td>
                <td><?=$d['tahap_daftar']?></td>
                <td>
                    <div class="form-group m-0">
                        <div class="custom-control custom-switch">
                            <input onclick="SetStatusPeriode(<?=$d['id']?>,<?=$d['is_active']?>)" type="checkbox"
                                class="custom-control-input" id="set-periode-<?=$d['id']?>"
                                <?=$d['is_active']==1 ? 'checked':null?>>
                            <label class="custom-control-label"
                                for="set-periode-<?=$d['id']?>"><?=$d['is_active']==1 ? '<span class="badge badge-success">Aktif</span>':'<span class="badge badge-danger">No Aktif</span>' ?></label>
                        </div>
                    </div>
                </td>
                <td>
                    <button onclick="Penjadwalan(<?=$d['id']?>)" class="btn btn-default btn-sm shadow-sm"><i
                            class="fa fa-calendar"></i> Atur Jadwal</button>
                    <button onclick="PeriodeEdit(<?=$d['id']?>)" class="btn btn-default btn-sm shadow-sm"><i
                            class="fa fa-edit"></i></button>
                    <button onclick="PeriodeDelete(<?=$d['id']?>)" class="btn btn-default btn-sm shadow-sm"><i
                            class="fa fa-trash"></i></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
// Add Periode 
function PeriodeAdd() {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/periode/add')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('#area_periode').html(response.add).show()
        }
    });
}

function PeriodeEdit(id) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/periode/edit')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            $('#area_periode').html(response.edit).show()
        }
    });
}


function PeriodeDelete(id) {
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
                url: "<?=base_url('admin/setting/periode/delete')?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        toastr.success('Periode Dihapus..', 'Berhasil')
                        LoadPeriode()
                    }
                }
            });
        }
    });

}

// Set Status 
function SetStatusPeriode(id, status) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/periode/status')?>",
        data: {
            id: id,
            status: status,
        },
        dataType: "json",
        success: function(response) {
            if (response.status == true) {
                toastr.success(response.msg, 'Berhasil')
                LoadPeriode()
            }
        }
    });
}
// Penjadwalan

function Penjadwalan(id) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/periode/jadwal')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            $('#area_periode').html(response.jadwal).show()
        }
    });
}
</script>