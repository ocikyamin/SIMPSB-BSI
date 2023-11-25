<div class="callout callout-success mt-0 text-sm">
    <li>Silahkan masukkan nilai angka untuk kelas <b>(<?=$kelas->kelas?>)</b> semester 1 dan 2 sesuai dengan Rapor dari
        sekolah asal.</li>
    <li>Klik Tombol Kirim Nilai untuk menyimpan data nilai</li>
</div>

<form class="mb-4" id="nilai-form">
    <?=csrf_field()?>
    <input type="hidden" name="csb_akun_id" value="<?=$csb_akun_id?>">
    <input type="hidden" name="m_kelas_id" value="<?=$kelas->id?>">
    <div class="table-responsive">
        <table class="table table-sm table-bordered mid text-sm">
            <tr>
                <td class="text-center" rowspan="2">No.</td>
                <td rowspan="2">Mata Pelajaran</td>
                <td colspan="2" class="text-center">SEMESTER</td>
            </tr>
            <tr>
                <td class="text-center"> I (Ganjil)</td>
                <td class="text-center"> II (Genap)</td>
            </tr>
            <?php
    $no=1;
    foreach ($list_mapel as $m) {
        $get_nilai = GetNilai($csb_akun_id, $m['id'], $kelas->id);
        $nilai_sem1 = $get_nilai==NULL ? 0 : $get_nilai->nilai_sem1;
        $nilai_sem2 = $get_nilai==NULL ? 0 : $get_nilai->nilai_sem2;
        ?>
            <tr>
                <td class="text-center"><?=$no++?>.</td>
                <td><?=$m['mapel']?></td>
                <td>
                    <input type="hidden" name="mapel_jenis_id[]" value="<?=$m['id']?>">
                    <input type="number" class="form-control form-control-sm bg-light custom-input" name="nilai_sem1[]"
                        value="<?=$nilai_sem1?>" placeholder="00">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm bg-light custom-input" name="nilai_sem2[]"
                        value="<?=$nilai_sem2?>" placeholder="00">
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="2">Nilai Rerata</td>
                <td id="rata-rata-sem1">0.00</td>
                <td id="rata-rata-sem2">0.00</td>
            </tr>
            <tr>
                <td colspan="2">Nilai Rerata Rapor</td>
                <td colspan="2" id="nilai-rapor">0.00</td>
            </tr>

        </table>
    </div>



    <p>
        <button type="button" onclick="refreshPage()" class="btn btn-light">
            <i class="fas fa-sync-alt fa-spin"></i>
            Kembali
            (F5)</button>
        <button class="btn btn-default bg-gradient-teal" type="submit" id="BtnNilai"><i class="far fa-check-circle"></i>
            Kirim
            Nilai</button>
    </p>


</form>

<script>
function refreshPage() {
    location.reload();
}
$(document).ready(function() {});
$('#nilai-form').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?=base_url('save-nilai-rapor')?>",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
            $('#BtnNilai').prop('disabled', true);
            $('#BtnNilai').html(
                `<i class="fa fa-spin fa-spinner"></i>`
            );
        },
        complete: function() {
            $('#BtnNilai').prop('disabled', false);
            $('#BtnNilai').html(`<i class="far fa-check-circle"></i> Kirim Nilai`);
        },
        success: function(response) {
            // console.log(response)
            if (response.status === "success") {

                toastr.success(response.message, 'Success !')
                LoadMapelList(response.kelas_id);
            }
        }
    });

});

// Fungsi untuk menghitung rata-rata dari suatu array
function calculateAverage(arr) {
    var total = 0;
    for (var i = 0; i < arr.length; i++) {
        total += parseFloat(arr[i]);
    }
    return (arr.length > 0) ? (total / arr.length) : 0.00;
}

// Fungsi untuk memperbarui nilai rata-rata
function updateAverages() {
    var sem1Values = [];
    var sem2Values = [];

    // Loop melalui semua input nilai_sem1 dan nilai_sem2
    $("input[name='nilai_sem1[]']").each(function() {
        sem1Values.push(parseFloat($(this).val()));
    });

    $("input[name='nilai_sem2[]']").each(function() {
        sem2Values.push(parseFloat($(this).val()));
    });

    // Hitung rata-rata nilai semester
    var avgSem1 = calculateAverage(sem1Values);
    var avgSem2 = calculateAverage(sem2Values);

    // Tampilkan rata-rata nilai semester
    $("#rata-rata-sem1").text(avgSem1);
    $("#rata-rata-sem2").text(avgSem2);

    // Hitung rata-rata nilai rapor
    var avgRapor = (parseFloat(avgSem1) + parseFloat(avgSem2)) / 2;

    // Tampilkan rata-rata nilai rapor
    $("#nilai-rapor").text(avgRapor);
    // Periksa apakah semua input nilai semester telah terisi
    var allInputsFilled = sem1Values.every(function(value) {
        return !isNaN(value);
    }) && sem2Values.every(function(value) {
        return !isNaN(value);
    });

    // Aktifkan/disaktifkan tombol Kirim Nilai sesuai dengan status isian input
    if (allInputsFilled) {
        $('#BtnNilai').prop('disabled', false);
    } else {
        $('#BtnNilai').prop('disabled', true);
    }
}
// Panggil fungsi updateAverages saat input nilai_sem1 dan nilai_sem2 berubah
$("input[name='nilai_sem1[]'], input[name='nilai_sem2[]']").on("input", updateAverages);

// Inisialisasi nilai rata-rata saat halaman dimuat
updateAverages();
</script>