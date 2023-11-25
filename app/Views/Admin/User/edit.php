<div class="modal fade" id="user-form">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-user-data">
                <?=csrf_field()?>
                <input type="hidden" name="id" value="<?=$user['id']?>">
                <input type="hidden" name="old_email" value="<?=$user['email']?>">
                <div class="modal-body">
                    <div class="form-group mb-1">
                        <label for="fullname"> Nama Lengkap</label>
                        <input name="fullname" id="fullname" type="text" class="form-control form-control-sm"
                            placeholder="ex : Abdul Yamin" value="<?=$user['fullname']?>">
                    </div>
                    <div class="form-group mb-1">
                        <label for="email"> Email</label>
                        <input name="email" id="email" type="text" class="form-control form-control-sm"
                            placeholder="ex : yamin@mtic.sch.id" value="<?=$user['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="whatsapp"> Whatsapp</label>
                        <input name="whatsapp" id="whatsapp" type="number" class="form-control form-control-sm"
                            placeholder="ex : 082122551928" value="<?=$user['whatsapp']?>">
                    </div>
                    <div class="form-group mb-1">
                        <label> Role Akses</label>
                        <div class="form-group clearfix">
                            <?php
                        foreach (TabelMaster('users_level') as $d) {?>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="id-<?=$d['id']?>" name="user_level_id" value="<?=$d['id']?>"
                                    <?=$d['id']==$user['user_level_id']? 'checked':null?>>
                                <label for="id-<?=$d['id']?>">
                                    <?=$d['level_name']?>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn-user-update" class="btn btn-primary"><i
                            class="far fa-check-circle"></i>
                        Save Changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
$('#form-user-data').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/users/update')?>",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
            $('#btn-user-update').prop('disabled', true);
            $('#btn-user-update').html(
                `<i class="fa fa-spin fa-spinner"></i>`
            );
        },
        complete: function() {
            $('#btn-user-update').prop('disabled', false);
            $('#btn-user-update').html(`<i class="far fa-check-circle"></i> Save Changes`);
        },
        success: function(response) {
            if (response.status == true) {
                toastr.success(response.msg)
                window.location.reload();
            }
            if (response.status == false) {
                toastr.error('Isian Data Belum lengkap')
            }
        }
    });

});
</script>