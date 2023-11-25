 <?= $this->extend('Student/layouts') ?>

 <?= $this->section('content') ?>
 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h5 class="m-0">Assalamu'alaikum, <code><?=CSB()->nama_lengkap?></code></h5>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <?php
        //  var_dump($status);
         if ($status->status_lulus=='TL') {
            // Status Berdasrkan Jalur Daftar 
            if ($status->master_jalur_id != 4) {
               ?>
         <div class="callout callout-danger">
             <h5>Mohon Maaf ! </h5>
             <p>Berdasarkan hasil keputusan panitia penerimaan santri baru pondok pesantren MTI Canduang, ananda
                 dinyatakan tidak <b>LULUS</b> untuk jalur Pendaftaran <b><?=CSB()->jalur_name?></b>. Jangan khwawatir
                 ananda mempunyai kesempatan untuk mengikuti
                 seleksi masuk pada jalur <b>Reguler</b> tanpa membayar biaya pendaftaran. Jika bersedia untuk
                 mengikuti
                 seleksi masuk pada jalur <b>Reguler</b> silahkan mengubah jalur pendaftaran dengan cara klik tombol
                 dibawah ini : <br> <button id="confrim-pindah-jalur" class="btn btn-default bg-teal shadow-sm mt-3">
                     Ubah
                     dan Ikuti Tes Jalur
                     Reguler.</button>
             </p>
         </div>

         <?php
            }else{
                ?>
         <div class="card card-danger card-outline">
             <div class="card-body">
                 <h5><em>Subject</em>: <b>Hasil Seleksi Santri Baru MTI Candung</b> </h5>
                 <p>
                 <h5>Isi:</h5>

                 Assalamualaikum warahmatullahi wabarakatuh, <br>
                 Dengan ini kami sampaikan hasil seleksi santri baru MTI Candung tahun ajaran <?=CSB()->periode?>. <br>
                 Berdasarkan hasil seleksi yang telah kami lakukan, kami sampaikan bahwa Ananda [
                 <b><?=CSB()->nama_lengkap?></b> ]
                 tidak lulus seleksi santri baru MTI Candung tahun ajaran <?=CSB()->periode?>. <br>

                 Kami memahami bahwa Ananda telah berusaha dengan keras untuk mengikuti seleksi ini. Kami ucapkan
                 terima kasih atas minat dan partisipasi Ananda. <br>

                 Kami berharap Ananda tidak berkecil hati atas hasil seleksi ini. Kami yakin Ananda memiliki
                 potensi yang besar dan dapat diterima di lembaga pendidikan lainnya. <br>

                 Semoga Allah SWT senantiasa memberikan kemudahan dan kelancaran dalam segala urusan kita. <br>

                 Wassalamu'alaikum warahmatullahi wabarakatuh. <br>


                 </p>
                 <p>
                     Best Regards <br>
                     <em><b>Panitia Seleksi Santri Baru MTI Candung</b></em>
                 </p>

             </div>

         </div>

         <?php
            }
         }
?>
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->
 <script>
$('#confrim-pindah-jalur').click(function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "Tindakan ini akan merubah jalur pendaftaran Reguler.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Lanjutkan!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?=base_url('student/change-jalur')?>",
                data: {
                    csb_akun_id: <?=json_encode($status->id)?>,
                    jalur_id: 4
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            window.location = response.status_jadwal
                        })
                    }
                }
            });
        }
    })

});
 </script>

 <?= $this->endSection() ?>