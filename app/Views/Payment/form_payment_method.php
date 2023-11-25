<?php
if ($payment_method=='manual') {
//    Manual 
?>
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <!-- /.col -->
        <div class="col-lg-8">
            <div class="invoice-col">
                <b>Invoice #<?=date('dmy', strtotime($tagihan->tanggal_invoice))?></b><br>
                <b>Bill To:</b> <?=$tagihan->nama_lengkap?><br>
                <b>Tanggal Invoice:</b> <?=date('d / m / Y', strtotime($tagihan->tanggal_invoice))?> <br>
                <b>Kode Bank</b> (451)
            </div>
        </div>
        <div class="col-lg-4 text-center">

            <!-- <i class="fas fa-file-invoice-dollar"></i> #Invoice -->
            <div class="float-right">
                <div><img src="<?=base_url('assets/')?>logo/bsi.png" width="130px" alt="BSI">
                    <hr>
                </div>
                <div class=" mt-0">
                    <div>Status Pembayaran </div>
                    <h4>
                        <?php
            if ($tagihan->status_pembayaran==NULL) {
            ?>
                        <span class="badge badge-pill badge-danger py-2">Menunggu Pembayaran</span>
                        <?php
            }elseif ($tagihan->status_pembayaran=='SUKSES') {
            ?>
                        <span class="badge badge-pill badge-success py-2">Pembayaran Selesai</span>
                        <?php
            }elseif ($tagihan->status_pembayaran=='WAITING') {
                ?>
                        <span class="badge badge-pill badge-warning py-2">Menunggu Konfirmasi (1x24 jam)</span>
                        <?php
                }elseif ($tagihan->status_pembayaran=='FAIL') {
                    ?>
                        <span class="badge badge-pill badge-danger py-2">Bukti Pembayaran Ditolak</span>
                        <?php
                    }

            ?>
                    </h4>
                </div>

            </div>

            <input type="hidden" id="status_tagihan"
                value="<?=$tagihan->status_pembayaran==NULL ? 0 : $tagihan->status_pembayaran?>">
        </div>
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-lg-12 invoice-col text-center">
            <div>Silahkan Bapak/Ibu melakukan pembayaran biaya <b><?=$tagihan->nama_biaya?></b> sejumlah
                <h1><b>Rp.<?=number_format($tagihan->nominal_tagihan)?>,-</b></h1> Ke Rekening Berikut :
                <br>
                <b>BSI</b> a/n : <b>PSB PP MTI
                    CANDUNG</b>
            </div>
            <div class="alert alert-default bg-light shadow-sm mt-2">
                <h1>No.Rek : <b>5519288887</b> <i class="far fa-copy"></i></h1>
            </div>
        </div>
        <!-- /.col -->

        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row mb-3">
        <?php
        if ($tagihan->status_pembayaran =='FAIL' || $tagihan->status_pembayaran ==null) {
            ?>
        <div class="col-lg-12">
            <?php
        //    jika bukti pembayaran ditolak 
        if ($tagihan->status_pembayaran=='FAIL') {
            ?>
            <div class="callout callout-danger">
                <h5>Pesan Kesalahan :</h5>
                <p>
                    <?=$bukti_bayar['comment']?>
                </p>
            </div>
            <?php
        }else{
            ?>
            <p class="text-center">
                Jika sudah melakukan pembayaran, silahkan unggah bukti pembayaran pada tombol dibawah ini :
            </p>
            <?php
        }

           ?>

            <div class="text-center">
                <button onclick="KonfirmasiPembayaran(<?=$tagihan->tagihan_id?>)"
                    class="btn btn-default btn-lg bg-gradient-teal"><i class="fas fa-cloud-upload-alt me-2"></i> Upload
                    Bukti
                    Bayar</button>
            </div>
        </div>
        <?php
        }

        ?>
    </div>
</div>
<?php
}elseif ($payment_method=='va') {
    // FORMAT PEMBAYARAN BY VA 
    // echo "<div class='alert alert-warning shadow-sm text-center'>Mohon Maaf Layanan Belum Tersedia. <br> Layayan ini sedang dalam Proses Penerbitan Kode Biller dari Pihak BANK</div>";
    ?>
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <!-- /.col -->
        <div class="col-lg-8">
            <div class="invoice-col">
                <b>Invoice #<?=date('dmy', strtotime($tagihan->tanggal_invoice))?></b><br>
                <b>Bill To:</b> <?=$tagihan->nama_lengkap?><br>
                <b>Tanggal Invoice:</b> <?=date('d / m / Y', strtotime($tagihan->tanggal_invoice))?>
            </div>
        </div>
        <div class="col-lg-4 text-center">

            <!-- <i class="fas fa-file-invoice-dollar"></i> #Invoice -->
            <div class="float-right">
                <div><img src="<?=base_url('assets/')?>logo/bsi.png" width="130px" alt="BSI">
                    <hr>
                </div>
                <div class=" mt-0">
                    <div>Status Pembayaran </div>
                    <h4>
                        <?php
            if ($tagihan->status_pembayaran==NULL) {
            ?>
                        <span class="badge badge-pill badge-danger py-2">Menunggu Pembayaran</span>
                        <?php
            }elseif ($tagihan->status_pembayaran=='SUKSES') {
            ?>
                        <span class="badge badge-pill badge-success py-2">Pembayaran Selesai</span>
                        <?php
            }

            ?>
                    </h4>
                </div>

            </div>

            <input type="hidden" id="status_tagihan"
                value="<?=$tagihan->status_pembayaran==NULL ? 0 : $tagihan->status_pembayaran?>">
        </div>
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-lg-12 invoice-col text-center">
            <div>Silahkan Bapak/Ibu melakukan pembayaran biaya <b><?=$tagihan->nama_biaya?></b> sejumlah
                <h1><b>Rp.<?=number_format($tagihan->nominal_tagihan)?>,-</b></h1> Ke Nomor Virtual Account (VA) berikut
                :
                <br>
            </div>
            <div class="alert alert-default bg-light shadow-sm mt-2">
                <h1><b><?=$tagihan->nomor_bayar?></b> <i class="far fa-copy"></i></h1>
            </div>
        </div>
        <!-- /.col -->

        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row mb-3">
        <?php
        if ($tagihan->status_pembayaran =='FAIL' || $tagihan->status_pembayaran ==null) {
            ?>
        <div class="col-lg-12">
            <?php
        //    jika bukti pembayaran ditolak 
        if ($tagihan->status_pembayaran=='FAIL') {
            ?>
            <div class="callout callout-danger">
                <h5>Pesan Kesalahan :</h5>
                <p>
                    <?=$bukti_bayar['comment']?>
                </p>
            </div>
            <?php
        }else{
            ?>
            <p class="text-center">
                Jika sudah melakukan pembayaran dan status pembayaran belum di perbarui, silahkan klik tombol dibawah
                ini :
            </p>
            <?php
        }

           ?>

            <div class="text-center">
                <button onclick="window.location.reload()" class="btn btn-default btn-lg bg-gradient-teal"><i
                        class="fa fa-undo me-2"></i> Sudah Bayar ?</button>
            </div>
        </div>
        <?php
        }

        ?>
    </div>
</div>
<?php
    

}
?>
<div class="viewmodal"></div>

<script>
function KonfirmasiPembayaran(id) {
    $.ajax({
        type: "post",
        url: "<?=base_url('payment/konfirm')?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            $('.viewmodal').html(response.form_upload).show()
            $('#modal-konfirmasi').modal('show');

        }
    });
}
</script>