 <!-- summernote -->
 <link rel="stylesheet" href="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.css">
 <script src="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
 <div class="row">
     <div class="col-lg-3">
         <button type="button" onclick="LoadJalur()" class="btn btn-default btn-sm mb-2"><i
                 class="fa fa-times-circle"></i>
             Close</button>
     </div>
     <div class="col-lg-6">
         <div class="callout">
             <h5>Edit Jalur</h5>
             <hr>
             <form id="form-jalur">
                 <?=csrf_field()?>
                 <input type="hidden" name="id" value="<?=$jalur['id']?>">
                 <div class="form-group row mb-1">
                     <div class="col-lg-12">
                         <label>Nama Jalur Daftar</label>
                         <input type="text" name="jalur_name" class="form-control form-control-sm form-control-border"
                             placeholder="ex : Reguler" value="<?=$jalur['jalur_name']?>">
                     </div>
                 </div>
                 <div class="form-group row mb-1">
                     <div class="col-lg-12">
                         <label>Nilai Rapor Minimal</label>
                         <input type="number" name="nilai_minimal"
                             class="form-control form-control-sm form-control-border" placeholder="ex : 70"
                             value="<?=$jalur['nilai_minimal']?>">
                     </div>
                 </div>
                 <div class="form-group row mb-1">
                     <label class="col-lg-12"> Deskripsi</label>
                     <div class="col-lg-12">
                         <textarea name="deskripsi" id="summernote"><?=$jalur['deskripsi']?></textarea>
                     </div>
                     <div class="form-group row mb-1">
                         <div class="col-lg-12">
                             <button type="submit" id="btn-save-school" class="btn btn-default bg-teal"><i
                                     class="fa fa-check-circle"></i>
                                 Perbarui</button>

                         </div>
                     </div>
             </form>
         </div>
     </div>
 </div>
 <script>
$(function() {
    // Summernote
    $('#summernote').summernote()
    airMode: true
});

$('#form-jalur').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/jalur/store')?>",
        data: $(this).serialize(),
        dataType: "json",
        success: function(response) {
            if (response.status == true) {
                toastr.success('Jalur Baru Diperbarui..', 'Berhasil')
                LoadJalur()

            }
        }
    });

});
 </script>