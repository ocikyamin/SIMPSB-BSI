<table class="table table-bordered table-sm mid" style="text-transform:uppercase">
    <tr>
        <td rowspan="2">Kelas</td>
        <td colspan="2" class="text-center">Rata-Rata Semester</td>
        <td>Rata-Rata Kelas</td>
    </tr>
    <tr>
        <td class="text-center">1</td>
        <td class="text-center">2</td>
    </tr>
    <?php
    $csb_akun_id = $csb_akun_id;
    // var_dump($rataRaporList);
    $rataRaporList = []; // Inisialisasi array untuk menyimpan rata-rata rapor
    foreach ($list_kelas as $k) {
        $rataSemester = RataRataSemester($csb_akun_id, $k['id']);
        // var_dump($status);
        $rataRaporKelas = ($rataSemester->rata_rata_semester_1 + $rataSemester->rata_rata_semester_2) / 2;
        $rataRaporList[] = $rataRaporKelas; // Simpan rata-rata rapor dalam array
        ?>
    <tr>
        <td>
            <!-- <?= $k['kelas'] ?> -->
            <div class="form-group m-0">
                <div class="icheck-teal d-inline">
                    <input type="radio" id="kelas-<?=$k['id']?>" name="kelass" onclick="PilihKelas(<?=$k['id']?>)">
                    <label for="kelas-<?=$k['id']?>">
                        Kelas (<?=$k['kelas']?>)
                    </label>
                </div>

            </div>

        </td>
        <td><?= $rataSemester->rata_rata_semester_1 ?></td>
        <td><?= $rataSemester->rata_rata_semester_2 ?></td>
        <td><?= $rataRaporKelas ?></td>
    </tr>
    <?php
    }
    $nilai_akhir = array_sum($rataRaporList) / count($rataRaporList);
    ?>
    <tr>
        <td>Rata-rata Rapor</td>
        <td colspan="3">
            <div id="nilai_rapor" data-jalur="<?=$jalur_id?>" data-nilaijalurmin="88"><?=$nilai_akhir?></div>
        </td>
    </tr>
</table>
<div id="result">

</div>

<script>
$(document).ready(function() {
    var $nilai_rapor = $("#nilai_rapor");
    var jalur = $nilai_rapor.data("jalur");
    var nilaijalurmin = $nilai_rapor.data("nilaijalurmin");
    var nilai_rapor = parseFloat($nilai_rapor.text());

    // console.log(nilai_rapor)
    // console.log(jalur)
    // console.log(nilaijalurmin)

    if (isNaN(nilai_rapor) || isNaN(jalur) || isNaN(nilaijalurmin)) {
        $("#result").text("Data tidak valid.");
    } else {

        // Cek nilai 
        if (nilai_rapor >= nilaijalurmin) {
            // $("#result").text("Yap, Anda layak untuk memilih jalur ini.");
            $("#result").html(
                "<div class='alert alert-default bg-light text-green text-center shadow-sm p-1'>Yap, Anda layak untuk memilih jalur ini.</div>"
            );
        } else {
            $("#result").html(
                "<div class='alert alert-danger'>Maaf ! Nilai Rapor Anda belum mencapai nilai minimal untuk memilih jalur ini. Nilai menimal untuk Jalur ini adalah : " +
                nilaijalurmin + "</div>");

        }


    }


});
</script>