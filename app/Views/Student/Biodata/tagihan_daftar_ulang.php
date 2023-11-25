<?php
// var_dump($tagihan);

if ($tagihan->status_daftar_ulang=='SELESAI' && $tagihan->status_pembayaran=='SUKSES') {
    ?>

<div class="card card-teal card-outline">
    <div class="card-body text-center">
        <h1><i class="far fa-check-circle text-teal"></i> <br>
            <b>Daftar Ulang Selesai.</b>
        </h1>
        <p>Terimakasih <b class="text-teal"><?=CSB()->nama_lengkap?></b> Telah melakukan
            pendafatran Ulang.Selamat ! Ananda telah diterima sebagai Santri Baru Pondok Pesantren Madrsah
            Tarbiyah Islamiyah Canduang. Simpan tanda bukti daftar ulang berikut sebagai syarat untuk pengambilan
            seragam santri baru. Informasi lebih lanjut akan di informasikan melalui WhatsApp Group Santri Baru MTI
            Canduang.
        </p>
        <p>
            <a href="<?=base_url('student/print/daftar-ulang/'. base64_encode($tagihan->id))?>" target="_blank"
                class="btn btn-default bg-teal btn-lg shadow"> <i class="fa fa-print"></i> Bukti
                Daftar Ulang</a>
        </p>
    </div>
</div>


<?php
}else{
    ?>
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-lg-10">
            <img src="<?=base_url('assets/')?>logo/bsi.png" width="130px" alt="BSI">
            <!-- <img src="<?=base_url('assets/')?>logo/atm.png" width="10%" alt="ATM"> -->
            <div>(Kode Bank : 451)</div>

        </div>
        <!-- /.col -->
        <div class="col-lg-2">
            <h4>
                <!-- <i class="fas fa-file-invoice-dollar"></i> #Invoice -->
                <small class="float-right">
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

                </small>
            </h4>
            <input type="hidden" id="status_tagihan"
                value="<?=$tagihan->status_pembayaran==NULL ? 0 : $tagihan->status_pembayaran?>">
        </div>
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-8 invoice-col text-center">
            <div>Virtual Account (VA) / Nomor Pambayaran</div>
            <div class="alert alert-default bg-light shadow-sm mt-2">
                <h3><?=$tagihan->nomor_bayar?> <b class="ml-4"><i class="far fa-copy"></i></b></h3>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice #<?=date('dmy', strtotime($tagihan->tanggal_invoice))?></b><br>
            <br>
            <b>Bill To:</b> <?=$tagihan->nama_lengkap?><br>
            <b>Tanggal Invoive:</b> <?=date('d / m / Y', strtotime($tagihan->tanggal_invoice))?>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Tagihan</th>
                        <th>Jumlah (IDR)</th>
                        <th>Chanel Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$tagihan->nama_biaya?></td>
                        <td>Rp. <?=$tagihan->nominal_tagihan?>,-</td>
                        <td><?=$tagihan->channel_pembayaran?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-lg-8">
            <p class="lead">Payment Methods:</p>

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Pembayaran Melalui ATM BSI
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show mb-0" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <ol>
                                <li>Pilih Menu Payment/Pembayaran/Pembelian.</li>
                                <li>Pilih Akademik/Institusi/Wakaf.</li>
                                <li>Masukkan kode atau nama institusi dan Masukkan Nomor
                                    Pembayaran.<br>
                                    Format 9009008xxxxxxxxxx (9009008 = kode institusi, xxxxxxxxxx =
                                    nomor pembayaran / virtual account/NPM)<br>
                                    contoh: 90090081234567890
                                </li>
                                <li>Tekan tombol Benar/Selanjutnya.</li>
                                <li>Kemudian tampil informasi data transaksi anda, pastikan data
                                    sudah benar.</li>
                                <li>Jika data sudah benar pilih BENAR/YA</li>
                                <li>Selanjutnya akan tampil informasi transaksi transfer Anda
                                    Berhasil atau Gagal dan bukti transaksi akan keluar jika
                                    berhasil</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                Pembayaran Melalui BSI Mobile
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <ol>
                                <li>Pilih Menu Payment / Pembayaran.</li>
                                <li>Pilih Institusi/Akademik/Wakaf.</li>
                                <li>Masukkan kode atau nama institusi .</li>
                                <li>Masukkan Nomor Pembayaran/Virtual Account tanpa diikuti kode
                                    institusi Lalu klik “setuju".</li>
                                <li>Tekan tombol Selanjutnya, Kemudian tampil informasi data
                                    transaksi anda, pastikan data sudah benar. Lalu klik
                                    Selanjutnya. </li>
                                <li>Masukan PIN.</li>
                                <li>Tekan tombol Selanjutnya untuk Submit.</li>
                                <li>Akan keluar bukti transaksi jika berhasil.</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Pembayaran Melalui Teller BSI
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <ol>
                                <li>Isi form setoran tunai</li>
                                <li>Masukkan nomor Virtual Account sebagai nomor rekening tujuan.
                                </li>
                                <li>Isi nama rekening tujuan dengan nama anda/unit.</li>
                                <li>Berikan keterangan : Pembayaran Institusi - (Nama Institusi).
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col -->
        <div class="col-lg-4 text-center">
            <button type="button" class="btn btn-primary btn-block mt-1" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Dwonload Invoice
            </button>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- this row will not appear when printing -->
<div class="row no-print">
    <div class="col-12">
        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>
            Panduan Pembayaran ?</a>
    </div>
</div>
</div>

<?php
}

?>