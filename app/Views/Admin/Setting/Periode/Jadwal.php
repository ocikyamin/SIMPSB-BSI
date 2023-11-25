 <div class="row">
     <div class="col-lg-1">
         <button type="button" onclick="LoadPeriode()" class="btn btn-default btn-sm mb-2"><i
                 class="fa fa-times-circle"></i>
             Close</button>
     </div>
     <div class="col-lg-9">
         <div class="callout callout-success">
             Pengaturan Jadwal Periode : <b><?=$periode['periode']?> - <?=$periode['tahap_daftar']?></b>
         </div>
         <div>
             <div class="form-group clearfix">
                 <div class="icheck-primary d-inline">
                     <input type="radio" id="j-ujian" name="type_jadwal" onclick="ListJadwal(1)">
                     <label for="j-ujian">
                         Jadwal Ujian
                     </label>
                 </div>
                 <div class="icheck-primary d-inline">
                     <input type="radio" id="j-du" name="type_jadwal" onclick="ListJadwal(2)">
                     <label for="j-du">
                         Daftar Ulang
                     </label>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div id="area-atur-jadwal">

 </div>

 <script>
function ListJadwal(type) {
    $.ajax({
        url: "<?=base_url('admin/setting/periode/jadwal/list')?>",
        data: {
            type: type,
            periode_id: <?=json_encode($periode['id'])?>
        },
        dataType: "json",
        success: function(response) {

            $("#area-atur-jadwal").html(response.list_jadwal);
        }
    });
}
 </script>