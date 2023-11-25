<?= $this->extend('Admin/Layouts') ?>

<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-list"></i> User List</h3>

            <div class="card-tools">
                <button type="button" onclick="AddUser()" class="btn btn-default bg-teal btn-sm">
                    <i class="fa fa-plus me-3"></i> Add User
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-sm mid text-sm">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Email</th>
                        <!-- <th>Whatsapp</th> -->
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            $i=1;
            foreach ($user_list as $d) {?>
                    <tr>
                        <td class="text-center"><?=$i++?>.</td>
                        <td><?=$d['email']?></td>
                        <!-- <td><?=$d['whatsapp']?></td> -->
                        <td><?=$d['fullname']?></td>
                        <td><?=$d['level_name']?></td>
                        <td>
                            <div class="form-group m-0">
                                <div class="custom-control custom-switch">
                                    <input onclick="SetStatus(<?=$d['id']?>,<?=$d['is_active']?>)" type="checkbox"
                                        class="custom-control-input" id="activ-<?=$d['id']?>"
                                        <?=$d['is_active']==1 ? 'checked':null?>>
                                    <label class="custom-control-label"
                                        for="activ-<?=$d['id']?>"><?=$d['is_active']==1 ? '<span class="badge badge-success">Aktif</span>':'<span class="badge badge-danger">No Aktif</span>' ?></label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button onclick="UserEdit(<?=$d['id']?>)" class="btn btn-default bg-teal btn-xs"><i
                                    class="fa fa-edit me-3"></i></button>
                            <button onclick="UserDel(<?=$d['id']?>)" class="btn btn-danger btn-xs"><i
                                    class="fa fa-trash me-3"></i>
                                Del</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="usermodal"></div>
</section>
<!-- /.content -->
<script>
function AddUser() {
    $.ajax({
        url: "<?=base_url('admin/users/add')?>",
        data: "data",
        dataType: "json",
        success: function(response) {
            $('.usermodal').html(response.form_user).show();
            $('#user-form').modal('show')
        }
    });
}

function UserEdit(id) {
    $.ajax({
        url: "<?=base_url('admin/users/edit')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            $('.usermodal').html(response.form_user).show();
            $('#user-form').modal('show')
        }
    });
}

function UserDel(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?=base_url('admin/users/del')?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        Swal.fire(
                            'Deleted!',
                            'Your row has been deleted.',
                            'success'
                        ).then((result) => {
                            window.location.reload()
                        })

                    }
                }
            });


        }
    })
}

// Pentauran Status 
function SetStatus(id, status) {
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/users/status')?>",
        data: {
            id: id,
            status: status
        },
        dataType: "json",
        success: function(response) {
            if (response.status == true) {
                window.location.reload()
            }
        }
    });


}
</script>
<?= $this->endSection() ?>