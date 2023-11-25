<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$csb->nama_lengkap?> - Kartu Peserta Ujian</title>
    <style>
    body {
        font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }

    .text-center {
        text-align: center;
    }

    .bottom-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f0f0f0;
        /* Ganti warna sesuai kebutuhan */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bottom-footer img {
        /* Menengahkan gambar di dalam footer */
        vertical-align: middle;
    }

    @media print {
        .bacode {
            display: block;
            /* Menampilkan pesan saat mencetak */
        }
    }

    .right {
        position: fixed;
        bottom: 0;
        right: 0;
        padding: 5px;
        margin: 10px;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td class="text-center">
                <img src="<?=base_url('assets/logo/mtic.png')?>" width="85px">
                <div>MTI CANDUANG</div>
            </td>
            <td align="center">
                <h3>
                    <div>مدرسة التربية الإسلامية جندونج</div>
                    <b>KARTU TANDA PESERTA UJIAN</b>
                    <div style="font-size:14px">
                        CALON SANTRI BARU MTI CANDUANG TP.<?=$csb->periode?>
                    </div>
                </h3>

            </td>
            <td align="right" width="20%">
                <div>Nomor Registrasi :</div>
                <div style="border:2px solid;padding:3px"><b><?=$csb->noreg?></b></div>

            </td>
        </tr>
    </table>
    <hr style="border: 1px double; height:2px">
    <table width="100%">
        <td>
            <div>
                <?php
                 $foto = $csb->foto==null ? 'no_image.png': $csb->foto;
                ?>
                <img src="<?=base_url('files/_foto/'.$foto)?>" width="140px" height="190px"
                    style="border:2px solid;border-radius:1px;padding:5px">
            </div>
        </td>
        <td>
            <table style="text-transform:uppercase">
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?=$csb->nama_lengkap?></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><?=$csb->nisn?></td>
                </tr>
                <tr>
                    <td>Tempat & Tanggal Lahir</td>
                    <td>:</td>
                    <td><?=$csb->tempat_lahir?>, <?=date('d / m / Y', strtotime($csb->tanggal_lahir))?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td><?=$csb->gender?></td>
                </tr>
            </table>
        </td>
    </table>
    <hr>
    <table width="100%">
        <tr>
            <td>

                <div>
                    <table width="100%" cellpadding="5" style="border-collapse:collapse;text-transform:uppercase">
                        <tr>
                            <td colspan="3"><b>PILIHAN PENDAFTARAN</b></td>
                        </tr>
                        <tr>
                            <td>Jalur Pendaftaran</td>
                            <td>:</td>
                            <td><?=$csb->jalur_name?></td>
                        </tr>
                        <tr>
                            <td>Periode Pendaftaran</td>
                            <td>:</td>
                            <td><?=$csb->periode?>-<?=$csb->tahap_daftar?></td>
                        </tr>
                        <tr>
                            <td>Jenjang Pendidikan Tujuan</td>
                            <td>:</td>
                            <td><?=$csb->level_name?></td>
                        </tr>
                        <tr>
                            <td>Rencana Mondok</td>
                            <td>:</td>
                            <td><?=$csb->is_asrama?></td>
                        </tr>
                    </table>
                </div>
                <br>


                <table width="100%">
                    <tr>
                        <td>
                            <div>Tanggal & Waktu Ujian :</div>
                            <div style="border:1px dotted;padding:7px;font-size:20px; margin-top:7px">
                                <b><?=date('d - F - Y', strtotime($jadwal->tanggal_ujian) )?></b> Jam <b>09.00 - 12.00
                                    WIB</b>
                            </div>

                        </td>
                        <td align="right">
                            <div>Kode Peserta :</div>
                            <div class="barcode" style="margin-top:7px"> <?=$barcode?> </div>
                        </td>
                    </tr>
                </table>
                <!-- <hr> -->
                <div>Lokasi Ujian :</div>
                <div style="border:1px dotted;padding:7px; margin-top:7px">
                    <b><?=$jadwal->tempat_ujian?></b>
                </div>
            </td>
        </tr>
    </table>
    <p>
    <div>
        <b>Berkas / Peralatan Yang wajib dibawa saat mengikuti Tes :</b>
        <p>
        <ol>
            <li>Alat Tulis</li>
            <li>Printout Kartu Tanda Peserta Ujian</li>
            <li>Printout NISN dari DAPODIK/EMIS</li>
            <li>Fotokopi Rapor Sesuai dengan yang diisi pada Portal</li>
            <li>Fotokopi Akte kelahiran</li>
            <li>Fotokopi Kartu keluarga</li>
            <li>Fotokopi KTP kedua orangtua</li>
        </ol>
        </p>
    </div>
    </p>

    <p>
    <div>
        <ul>
            <em>Catatan :</em>
            <li>Cetaklah kartu ujian ini dengan printer berwarna dan kertas Ukuran A4</li>
            <li>Salah satu Orang Tua/ Wali mengikuti wawancara dengan Panitia.</li>
            </ol>
    </div>
    </p>
    <div class="right">
        <img src="<?=base_url('assets/logo/logo.png')?>" width="100px">
    </div>
</body>
<script>
window.print()
</script>

</html>