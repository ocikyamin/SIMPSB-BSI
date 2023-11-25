<div class="modal fade" id="modal-bukti-bayar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-cloud-upload-alt me-2"></i> Bukti
                    (<?=$tagihan['nama_biaya']?>)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('payment/upload')?>" id="upload-form-bukti">
                    <?php
                // echo "<pre>";
                // print_r($tagihan);
                // echo "</pre>";

                ?>
                    <?=csrf_field()?>
                    <input type="hidden" id="tagihan_id" name="tagihan_id" value="<?=$id?>">
                    <input type="hidden" id="bukti_bayar_id" name="id"
                        value="<?=$bukti_bayar==null?null : $bukti_bayar['id'] ?>">
                    <input type="hidden" name="old_image_name"
                        value="<?=$bukti_bayar==null?null:$bukti_bayar['lampiran']?>">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Tanggal Transaksi</label>
                            <input type="date" name="tanggal_transaksi" class="form-control"
                                value="<?=$bukti_bayar==null?null:$bukti_bayar['tanggal_transaksi']?>">
                        </div>
                        <div class="col-lg-6">
                            <label>Waktu Transaksi</label>
                            <input type="text" name="waktu_transaksi" class="form-control"
                                placeholder="Contoh : 09.30 : 30"
                                value="<?=$bukti_bayar==null?null:$bukti_bayar['waktu_transaksi']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Nama Pengirim</label>
                            <input type="text" name="nama_pengirim" class="form-control"
                                placeholder="Contoh : Abdul Yamin"
                                value="<?=$bukti_bayar==null?null:$bukti_bayar['nama_pengirim']?>">
                        </div>
                        <div class="col-lg-6">
                            <label>No.Rek Pengirim</label>
                            <input type="number" name="norek_pengirim" class="form-control" placeholder="0"
                                value="<?=$bukti_bayar==null?null:$bukti_bayar['norek_pengirim']?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>BANK / Channel Pembayaran</label>
                                <input type="text" name="bank_channel" class="form-control"
                                    placeholder="Contoh : BSI / E-BANKING / BRI LINK"
                                    value="<?=$bukti_bayar==null?null:$bukti_bayar['bank_channel']?>">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Transfer</label>
                                <input type="number" name="jumlah_transfer" class="form-control"
                                    placeholder="Contoh : 250000"
                                    value="<?=$bukti_bayar==null?null:$bukti_bayar['jumlah_transfer']?>">
                            </div>
                            <div class="form-group">
                                <label>Lampiran Bukti <small class="text-danger">(JPG , JPEG , PNG)</small></label>
                                <div class="p-3 bg-teal" style="border:2px dotted;border-radius:10px">
                                    <input name="image" type="file">
                                </div>
                            </div>
                            <div class="div mt-2">
                                <button type="button" id="reset-preview" class="btn btn-danger btn-block"><i
                                        class="fas fa-sync-alt me-2"></i> Reset</button>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="bg-light text-center py-3 mt-3" style="border:2px dotted;border-radius:10px"
                                id="preview-gambar">
                                <?php
                                if ($bukti_bayar !==null) {
                                    ?>
                                <img src="<?=base_url('files/_bukti_bayar/'.$bukti_bayar['lampiran'])?>"
                                    class="img-fluid">
                                <div class="mt-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="no_kirim">
                                            <label class="custom-control-label" for="no_kirim"> Jangan Kirim Notif
                                                WA</label>
                                        </div>
                                    </div>
                                    <input type="hidden" id="status_info">

                                    <!-- <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="status_info">
                                            <label for="status_info">
                                                Jangan Kirim Notif WA
                                            </label>
                                        </div>
                                    </div> -->

                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                        <label class="btn bg-olive">
                                            <input type="radio" class="bukti-terima" value="Y" autocomplete="off">
                                            Terima
                                        </label>
                                        <label class="btn bg-danger">
                                            <input type="radio" class="bukti-terima" value="N" autocomplete="off">
                                            Tolak
                                        </label>
                                    </div>
                                </div>
                                <?php
                                }else{
                                    echo " Gambar akan
                                    tampil disini..";
                                }
                                
                                ?>

                            </div>
                            <div class="progress" style="display: none;">
                                <div class="progress-bar" id="upload-progress" role="progressbar" style="width: 0%;"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                            <div id="response"></div>
                            <div class="div mt-3">
                                <button type="submit" id="btn-upload-bukti" class="btn btn-primary btn-block"><i
                                        class="fas fa-cloud-upload-alt me-2"></i>
                                    Upload Bukti</button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
$(document).ready(function() {
    // Fungsi untuk menampilkan priview gambar saat file dipilih
    $('input[type="file"]').change(function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Tampilkan gambar yang dipilih dalam elemen dengan class "preview-gambar"
                $('#preview-gambar').html('<img src="' + e.target.result +
                    '" class="img-fluid">');
                $('#btn-upload-bukti').show()
                $('#reset-preview').show()
            };
            reader.readAsDataURL(file);
        }
    });

    // Sembunyikan tombol "Simpan" saat halaman dimuat
    $('#btn-upload-bukti').hide()
    $('#reset-preview').hide()

    // Fungsi untuk menghapus priview gambar
    $('#reset-preview').click(function() {
        // Hapus priview gambar
        $('#preview-gambar').html('Gambar akan tampil disini..');
        // Sembunyikan tombol "Simpan"
        $('#btn-upload-bukti').hide()
        $('#reset-preview').hide()
        // Kosongkan input file
        $('input[type="file"]').val('');
    });




    // Proses Upload 
    $("#upload-form-bukti").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $("#upload-progress").width(percentComplete + "%");
                        $("#upload-progress").text(percentComplete.toFixed(2) +
                            '%');
                    }
                }, false);
                return xhr;
            },
            beforeSend: function() {
                $('#btn-upload-bukti').prop('disabled', true);
                $('#btn-upload-bukti').html(
                    `<i class="fa fa-spin fa-spinner"></i>`
                );
            },
            complete: function() {
                // $('#btn-upload-bukti').show();
                $('#btn-upload-bukti').prop('disabled', false);
                $('#btn-upload-bukti').html(`<i
                                        class="fas fa-cloud-upload-alt me-2"></i>
                                    Upload Bukti`);
            },
            success: function(response) {
                if (response.success) {
                    // $("#response").html('<div class="alert alert-success">' + response
                    //     .success + '</div>');
                    Swal.fire({
                        // position: 'top-end',
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.reload()
                    })
                    $("#upload-form-bukti")[0].reset();
                    $(".progress").hide();
                } else if (response.error) {

                    Swal.fire({
                        // position: 'top-end',
                        icon: 'error',
                        title: 'Gagal',
                        text: response.error.image,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });

        $(".progress").show();
    });

    $('#no_kirim').change(function() {
        // Memeriksa apakah checkbox sedang dicentang atau tidak
        if ($(this).is(':checked')) {
            $('#status_info').val('on')
        } else {
            $('#status_info').val('')
        }
    });

    // Verifikasi Bukti Bayar 
    $('.bukti-terima').click(function(e) {
        e.preventDefault();
        let status_info = $('#status_info').val();
        const tagihan_id = $('#tagihan_id').val();
        const bukti_bayar_id = $('#bukti_bayar_id').val();

        // alert($(this).val())
        if ($(this).val() == 'N') {
            Swal.fire({
                title: 'Tuliskan alasan Mengapa anda menolaknya ?',
                // input: 'input: 'textarea',',
                input: 'textarea',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Kirim Pesan Kesalahan',
            }).then((result) => {
                if (result.isConfirmed) {
                    const keterangan = result.value; // Mengambil nilai dari input textarea

                    $.ajax({
                        type: "post",
                        url: "<?=base_url('payment/verify-n')?>",
                        data: {
                            verify: 'N',
                            tagihan_id: tagihan_id,
                            bukti_bayar_id: bukti_bayar_id,
                            comment: keterangan,
                            status_info: status_info,
                            whatsapp: <?=json_encode($whatsapp)?>,
                            jenis_biaya: <?=json_encode($tagihan['jenis_biaya'])?>,
                            csb_akun_id: <?=json_encode($tagihan['csb_akun_id'])?>,
                        },
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'Berhasil !',
                                text: response.msg,
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                window.location.reload()
                            })
                        }
                    });
                }
            })
        } else {
            Swal.fire({
                title: 'Apakah Yakin Menerima Bukti Pembayaran ?',
                text: "Tindakan ini akan mengizinkan user memiliki kartu ujian",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Terima Bukti Bayar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "<?=base_url('payment/verify-n')?>",
                        data: {
                            verify: 'Y',
                            tagihan_id: tagihan_id,
                            bukti_bayar_id: bukti_bayar_id,
                            status_info: status_info,
                            whatsapp: <?=json_encode($whatsapp)?>,
                            jenis_biaya: <?=json_encode($tagihan['jenis_biaya'])?>,
                            csb_akun_id: <?=json_encode($tagihan['csb_akun_id'])?>,
                        },
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'Berhasil !',
                                text: response.msg,
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                window.location.reload()
                            })
                        }
                    });
                }
            })

        }

    });

});
</script>