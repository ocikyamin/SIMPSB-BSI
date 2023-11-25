<?= $this->extend('Admin/Layouts') ?>

<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Santri Baru
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Student</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="periode">Periode Pendaftaran</label>
                    <select class="custom-select shadow-sm" id="periode">
                        <option value="all">Semua Periode</option>
                        <?php
                            foreach (TabelMaster('master_periode') as $p) {?>
                        <option value="<?=$p['id']?>" <?=$p['is_active']==1? 'selected':null?>>
                            <?=$p['periode']?>-<?=$p['tahap_daftar']?>
                            <?=$p['is_active']==1 ? '( Aktif )':null?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-9">
                <div id="counter-level"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all-data-tabs" data-toggle="pill"
                                    href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                    aria-selected="true"><i class="fa fa-list me-3"></i> All Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                    aria-selected="false"><i class="fa fa-list me-3"></i> Peserta Ujian</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                    href="#custom-tabs-four-messages" role="tab"
                                    aria-controls="custom-tabs-four-messages" aria-selected="false"><i
                                        class="fa fa-list me-3"></i> Peserta Daftar Ulang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                                    href="#custom-tabs-four-settings" role="tab"
                                    aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                aria-labelledby="all-data-tabs">
                                <div id="list-data">
                                    <div id="loading-list-data" style="display: none;">
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-grow spinner-grow text-teal" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-four-profile-tab">
                                <div id="list-data-peserta-ujian"></div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                aria-labelledby="custom-tabs-four-messages-tab">
                                <div id="list-data-peserta-daftar-ulang"></div>

                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                                aria-labelledby="custom-tabs-four-settings-tab">
                                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus
                                turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis
                                vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum
                                pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget
                                aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac
                                habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>




            </div>
        </div>

    </div>

</section>
<!-- /.content -->
<script>
$(document).ready(function() {
    var periode = $('#periode').val();
    $('#periode').change(function(e) {
        e.preventDefault();
        AllStudents($(this).val());

        // Filter Peserta Ujian 
        PesertaUjian($(this).val());
        // Filter Peserta Daftar Ulang 
        PesertaDaftarUlang($(this).val());
        // Filter Counter Level 
        CounterLevelPeriod($(this).val());

    });
    AllStudents(periode);
    PesertaUjian(periode);
    PesertaDaftarUlang(periode);

    // Counter 
    CounterLevelPeriod(periode)

});


function AllStudents(periode) {
    $('#loading-list-data').show()
    $.ajax({
        url: "<?=base_url('admin/student/all')?>",
        data: {
            periode: periode
        },
        dataType: "json",
        success: function(response) {
            $('#loading-list-data').hide()
            $('#list-data').html(response.all);
        },
        error: function() {
            // Sembunyikan spinner jika terjadi kesalahan
            $('#loading-list-data').hide();
        }
    });
}

// Peserta Ujian 
function PesertaUjian(periode) {
    if (periode !== 'all') {
        $.ajax({
            url: "<?=base_url('admin/student/peserta-ujian')?>",
            data: {
                periode: periode
            },
            dataType: "json",
            success: function(response) {
                $('#list-data-peserta-ujian').html(response.jadwal_ujian);
            }
        });
    } else {
        $('#list-data-peserta-ujian').html('No Data ....');
    }

}
// list-data-peserta-daftar-ulang
function PesertaDaftarUlang(periode) {
    if (periode !== 'all') {
        $.ajax({
            url: "<?=base_url('admin/student/peserta-daftar-ulang')?>",
            data: {
                periode: periode
            },
            dataType: "json",
            success: function(response) {
                $('#list-data-peserta-daftar-ulang').html(response.daftar_ulang);
            }
        });
    } else {
        $('#list-data-peserta-daftar-ulang').html('No Data ....');
    }

}

// $('#status-du').click(function() {
//     if ((this).checked == true) {

//         $('.tes').html('checked');

//     } else {

//         AllStudents($('#periode').val());

//     }

// });

// Counter 
// Jumlah Pendaftar By Level
function CounterLevelPeriod(periode) {
    $.ajax({
        url: "<?=base_url('admin/counter/level')?>",
        data: {
            periode: periode
        },
        dataType: "json",
        success: function(response) {
            $('#counter-level').html(response.jml_level);
        }
    });
}
</script>
<?= $this->endSection() ?>