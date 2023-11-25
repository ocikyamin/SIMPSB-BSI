<div class="row">
    <di class="col-lg-12">
        <button type="button" onclick="LoadJalur()" class="btn btn-default btn-sm mb-2"><i
                class="fa fa-times-circle"></i>
            Close</button>
        <div class="callout callout-success mt-2 mb-2">
            <h5><?=$jalur['jalur_name']?></h5>

            <p>Tuliskan Persyaratan untuk <?=$jalur['jalur_name']?> dibawah ini, untuk ditampilkan sebagai informasi
                bagi calon pendaftar ketika memilih jalur</p>
        </div>
        <form id="form-syarat">
            <?=csrf_field()?>
            <table class="table table-sm table-hover text-sm">
                <thead>
                    <tr>
                        <input type="hidden" name="master_jalur_id" value="<?=$jalur['id']?>">
                        <td>

                        </td>
                        <td>
                            <input type="text" name="syarat" class="form-control form-control-sm"
                                placeholder="Masukkan Item Syarat" required>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-check-circle"></i>
                                Save</button>
                        </td>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Item Syarat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        if ($syarat ==null) {
        echo "<tr class='bg-warning text-center'><td colspan='3'>Belum ada data ..</td></tr>";
        }
        $i =1;
        foreach ($syarat as $d) {?>
                    <tr>
                        <td><?=$i++?>.</td>
                        <td><?=$d['syarat']?></td>
                        <td>
                            <button type="button" onclick="SyaratDelete(<?=$d['id']?>)"
                                class="btn btn-default btn-sm shadow-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </di>
</div>
<script>
$('#form-syarat').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/jalur/syarat/store')?>",
        data: $(this).serialize(),
        dataType: "json",
        success: function(response) {
            if (response.status == true) {
                toastr.success('Item Persyaratan Ditambahkan', 'Berhasil')
                JalurSyarat(<?=json_encode($jalur['id'])?>)
            }
        }
    });

});

function SyaratDelete(id) {
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
                url: "<?=base_url('admin/setting/jalur/syarat/delete')?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        toastr.success('Item Syarat Dihapus..', 'Berhasil')
                        // LoadJalur()
                        JalurSyarat(<?=json_encode($jalur['id'])?>)
                    }
                }
            });
        }
    });

}
</script>