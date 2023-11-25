// Wilayah 
$(document).ready(function () {
    $(document).ready(function () {
        // Di bagian untuk mengambil data provinsi
        $.getJSON('https://api.mticanduang.sch.id/provinsi', function (
            data) {
            var $provinsi_id = $('#provinsi_id');
            $.each(data, function (index, province) {
                $provinsi_id.append('<option value="' + province.id + '">' +
                    province.name +
                    '</option>');
            });
        });


        // Menggunakan event onChange untuk mengambil data kota/kabupaten saat provinsi dipilih
        $('#provinsi_id').change(function () {
            var selectedProvinceId = $(this).val();
            var $loadingCity = $('#loadingCity');

            if (selectedProvinceId) {
                $loadingCity.show();
                // Mengambil data kota/kabupaten berdasarkan id provinsi
                $.getJSON(
                    'https://ocikyamin.github.io/api-wilayah-indonesia/api/regencies/' +
                    selectedProvinceId + '.json',
                    function (data) {
                        var $kabupaten_id = $('#kabupaten_id');
                        $kabupaten_id.empty().append(
                            '<option value="">Pilih Kota/Kabupaten</option>');
                        $.each(data, function (index, city) {
                            $kabupaten_id.append('<option value="' + city.id +
                                '">' + city
                                    .name + '</option>');
                        });
                        $loadingCity.hide();
                    });
            } else {
                // Mengosongkan pilihan kota/kabupaten jika provinsi tidak dipilih
                $('#kabupaten_id').empty().append(
                    '<option value="">Pilih Kota/Kabupaten</option>');
            }
        });

        // Menggunakan event onChange untuk mengambil data kecamatan saat kota/kabupaten dipilih
        $('#kabupaten_id').change(function () {
            var selectedCityId = $(this).val();
            var $loadingDistrict = $('#loadingDistrict');

            if (selectedCityId) {
                $loadingDistrict.show();
                // Mengambil data kecamatan berdasarkan id kota/kabupaten
                $.getJSON(
                    'https://ocikyamin.github.io/api-wilayah-indonesia/api/districts/' +
                    selectedCityId + '.json',
                    function (data) {
                        var $kecamatan_id = $('#kecamatan_id');
                        $kecamatan_id.empty().append(
                            '<option value="">Pilih Kecamatan</option>');
                        $.each(data, function (index, district) {
                            $kecamatan_id.append('<option value="' + district
                                .id + '">' +
                                district.name + '</option>');
                        });
                        $loadingDistrict.hide();
                    });

            } else {
                // Mengosongkan pilihan kecamatan jika kota/kabupaten tidak dipilih
                $('#kecamatan_id').empty().append(
                    '<option value="">Pilih Kecamatan</option>');
            }
        });

        // Menggunakan event onChange untuk mengambil data desa/kelurahan saat kecamatan dipilih
        $('#kecamatan_id').change(function () {
            var selectedDistrictId = $(this).val();
            var $loadingVillage = $('#loadingVillage');
            if (selectedDistrictId) {
                $loadingVillage.show();

                // Mengambil data desa/kelurahan berdasarkan id kecamatan
                $.getJSON(
                    'https://ocikyamin.github.io/api-wilayah-indonesia/api/villages/' +
                    selectedDistrictId + '.json',
                    function (data) {
                        var $desa_id = $('#desa_id');
                        $desa_id.empty().append(
                            '<option value="">Pilih Desa/Kelurahan</option>');
                        $.each(data, function (index, village) {
                            $desa_id.append('<option value="' + village
                                .id + '">' +
                                village.name + '</option>');
                        });
                        $loadingVillage.hide();
                    });
            } else {
                // Mengosongkan pilihan desa/kelurahan jika kecamatan tidak dipilih
                $('#desa_id').empty().append(
                    '<option value="">Pilih Desa/Kelurahan</option>');
            }
        });
    });
});