 <!-- summernote -->
 <link rel="stylesheet" href="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.css">
 <!-- Summernote -->
 <script src="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
 <div class="row">
     <div class="col-lg-3">
         <button type="button" onclick="LoadPeriode()" class="btn btn-default btn-sm mb-2"><i
                 class="fa fa-times-circle"></i>
             Close</button>
     </div>
     <div class="col-lg-6">
         <div class="callout">
             <h5>Edit Period</h5>
             <hr>
             <form id="form-periode">
                 <?=csrf_field()?>
                 <input type="hidden" name="id" value="<?=$periode['id']?>">
                 <div class="form-group row mb-1">
                     <label class="col-lg-3"> Periode</label>
                     <div class="col-lg-9">
                         <input type="text" name="periode" class="form-control form-control-sm form-control-border"
                             placeholder="ex : 2024/2025" value="<?=$periode['periode']?>">
                     </div>
                 </div>
                 <div class="form-group row mb-1">
                     <label class="col-lg-3"> Tahap</label>
                     <div class="col-lg-9">
                         <input type="text" name="tahap_daftar" class="form-control form-control-sm form-control-border"
                             placeholder="ex : Gelombang I" value="<?=$periode['tahap_daftar']?>">
                     </div>
                 </div>
                 <div class="form-group row mb-1">
                     <label class="col-lg-12"> Tanggal Penerimaan</label>
                     <div class="col-lg-12">
                         <textarea name="tanggal_penerimaan"
                             id="summernote"><?=$periode['tanggal_penerimaan']?></textarea>
                     </div>
                 </div>
                 <div class="form-group row mb-1">
                     <div class="col-lg-12">
                         <button type="submit" id="btn-save-periode" class="btn btn-default bg-teal"><i
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

$('#form-periode').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/setting/periode/store')?>",
        data: $(this).serialize(),
        dataType: "json",
        // beforeSend: function() {

        // },
        success: function(response) {
            if (response.status == true) {
                toastr.success('Periode Diperbarui..', 'Berhasil')
                LoadPeriode()

            }
        }
    });

});
 </script>