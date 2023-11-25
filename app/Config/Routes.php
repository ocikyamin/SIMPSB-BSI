<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->set404Override(function(){
    return view('404');
});


// Landing 
$routes->get('/', 'Landing\Home::index');
// $routes->get('brosur', 'Landing::index');
$routes->get('brosur', 'Landing\Pages::Brosur');
$routes->get('persyaratan', 'Landing\Pages::Persyaratan');
$routes->get('cara-daftar', 'Landing\Pages::CaraDaftar');
$routes->get('kelulusan', 'Landing\Pages::Kelulusan');
$routes->get('cara-bayar', 'Landing\Pages::CaraBayar');

// Smart Billing 
$routes->group('smart-billing', static function ($routes) {
    // $routes->get('/', 'Payment\SmartBilling::index');
$routes->get('how', 'Payment\SmartBilling::CaraBayar');

});


// Register
$routes->group('register', static function ($routes) {
$routes->get('/', 'Auth\Registration::index');
$routes->post('info-syarat', 'Auth\Registration::GetSyarat');
$routes->post('create', 'Auth\Registration::CreateNewAcoount');

});



// Wilayah 
$routes->group('wilayah', static function ($routes) {
$routes->get('provinsi', 'API\Wilayah::index');
$routes->get('kabupaten', 'API\Wilayah::Kabupaten');
$routes->get('kecamatan', 'API\Wilayah::Kecamatan');
$routes->get('desa', 'API\Wilayah::Desa');
$routes->get('get-kab', 'API\Wilayah::GetKab');
});

// Login 
$routes->group('login', static function ($routes) {
$routes->get('/', 'Auth\StudentLogin::index');
$routes->post('new', 'Auth\StudentLogin::NewLogin');
$routes->post('/', 'Auth\StudentLogin::LoginProses');
});


// $routes->get('register', 'Auth\Registration::index');




//  Student 
$routes->group('student', static function ($routes) {
    $routes->get('/', 'Students\Home::index');
    $routes->get('home', 'Students\Home::index');
    $routes->post('change-jalur', 'Students\Home::ChangeJalur');
    $routes->get('status', 'Students\First::StatusAwal');
 
    $routes->get('status-nilai-mapel', 'Students\First::StatusNilaiMapel');
    // Logout
    $routes->get('logout', 'Students\Home::Logout');
    
    // Biodata 
    $routes->get('biodata', 'Students\Biodata::index');
    $routes->post('save-biodata', 'Students\Biodata::SaveBiodata');
    $routes->post('req-daftar-ulang', 'Students\Biodata::ReqDaftarUlang');
    // $routes->post('tagihan-daftar-ulang', 'Students\Biodata::InfoTagihanDaftarUlang');
    // $routes->get('print/daftar-ulang/(:any)', 'Students\Biodata::PrintKatuDaftarUlang/$1');
    
});

// Uploads 
$routes->group('uploads', static function ($routes) {
    $routes->get('form-foto-student', 'Uploads\Foto::FormUploadFoto');
    $routes->post('upload-foto-student', 'Uploads\Foto::UploadFoto');
});

// Reports
$routes->group('print', static function ($routes) {
    // Kartu Ujian 
    $routes->get('kartu/ujian/(:any)', 'Reports\Kartu::Ujian/$1');
    $routes->get('kartu/du/(:any)', 'Reports\Kartu::DU/$1');
       // Cetak Kartu Ujian 
    //    $routes->get('print/card/(:any)', 'Students\First::PrintKatuUjian/$1');
});

// Login Admin 
$routes->group('app-login', static function ($routes) {
    $routes->get('/', 'Admin\Auth::index');
    $routes->post('/', 'Admin\Auth::LoginProses');
});

// Nilai Rapor 
$routes->get('form-nilai-mapel', 'Students\First::FormNilaiMapel');
$routes->post('save-nilai-rapor', 'Students\First::SaveNilaiRapor');




// Payment 
$routes->group('payment', static function ($routes) {
    $routes->post('method', 'Payment\Method::PaymentMethod');
    $routes->post('konfirm', 'Payment\Method::KonfirmBuktiTransaksi');
    $routes->post('upload', 'Payment\Method::UploadBuktiTransaksi');
    $routes->get('view-bukti', 'Payment\Method::ViewdBuktiTransaksi');
    $routes->post('verify-n', 'Payment\Method::VerifyBuktiTransaksi');
});

// Payemen Admin 
$routes->group('admin/payment', static function ($routes) {
    $routes->get('/', 'Payment\Payment::index');
});

$routes->group('admin', static function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('logs', 'Admin\Dashboard::LogActivity');
    $routes->get('logout', 'Admin\Auth::Logout');
});


// CSB 
$routes->group('admin/student', static function ($routes) {
    $routes->get('/', 'Admin\Student::index');
    $routes->get('all', 'Admin\Student::All');
    $routes->get('kab/(:any)', 'Admin\Student::ByKabupaten/$1');
    $routes->get('detail/(:num)', 'Admin\Student::Detail/$1');
    $routes->post('status', 'Admin\Student::SetStatus');
    $routes->post('save-pilihan', 'Admin\Student::SavePilihan');
    $routes->get('form-biodata', 'Admin\Student::FormBiodata');
    $routes->post('hapus-nilai', 'Admin\Student::HapusNilai');
    $routes->post('send-whatsapp', 'Admin\Student::SendWhatsApp');
    $routes->post('change-password', 'Admin\Student::ChangePassword');
    $routes->post('del-tagihan', 'Admin\Student::DeleteTagihan');
// Pserta Ujian 
$routes->get('peserta-ujian', 'Admin\Student::ListPesertaUjian');
// Peserta Daftar Ulang 
$routes->get('peserta-daftar-ulang', 'Admin\Student::ListPesertaDaftarUlang');
});

// Verify / Notif 
$routes->group('admin/notif', static function ($routes) {
    $routes->get('pembayaran', 'Admin\Notifikasi::PembayaranBaru');
});


// Presensi 
$routes->group('admin/presensi', static function ($routes) {
    $routes->get('/', 'Admin\Presensi::index');
    $routes->post('store', 'Admin\Presensi::Store');
    $routes->post('list', 'Admin\Presensi::DaftarHadir');
});

// Counter 
$routes->group('admin/counter', static function ($routes) {
    $routes->get('level', 'Admin\Counter::ByLevel');
    $routes->post('reg-today', 'Admin\Counter::RegToday');
    $routes->post('reg-kab', 'Admin\Counter::RegByKabupaten');
});


// User 
$routes->group('admin/users', static function ($routes) {
    $routes->get('/', 'Admin\Users::index');
    $routes->get('add', 'Admin\Users::Add');
    $routes->get('add', 'Admin\Users::Add');
    $routes->post('store', 'Admin\Users::Store');
    $routes->post('del', 'Admin\Users::Delete');
    $routes->post('status', 'Admin\Users::SetStatus');
    // Edit 
    $routes->get('edit', 'Admin\Users::Edit');
    $routes->post('update', 'Admin\Users::Update');
});

// Settings 
$routes->group('admin/setting', static function ($routes) {
    $routes->get('/', 'Admin\Settings\Main::index');
});
// Settings Unit Sekolah
$routes->group('admin/setting/school', static function ($routes) {
    $routes->post('/', 'Admin\Settings\School::index');
    $routes->post('add', 'Admin\Settings\School::Add');
    $routes->post('store', 'Admin\Settings\School::Store');
    $routes->post('edit', 'Admin\Settings\School::Edit');
    $routes->post('delete', 'Admin\Settings\School::Delete');
    $routes->post('status', 'Admin\Settings\School::Status');
});
// Settings Periode
$routes->group('admin/setting/periode', static function ($routes) {
    $routes->post('/', 'Admin\Settings\Periode::index');
    $routes->post('add', 'Admin\Settings\Periode::Add');
    $routes->post('store', 'Admin\Settings\Periode::Store');
    $routes->post('edit', 'Admin\Settings\Periode::Edit');
    $routes->post('delete', 'Admin\Settings\Periode::Delete');
    $routes->post('status', 'Admin\Settings\Periode::Status');
    
    // Penjadwalan 
    $routes->post('jadwal', 'Admin\Settings\Periode::Jadwal');
    $routes->get('jadwal/list', 'Admin\Settings\Periode::ListJadwal');
    $routes->post('jadwal/save/ujian', 'Admin\Settings\Periode::SaveJadwalUjian');
    $routes->post('jadwal/save/du', 'Admin\Settings\Periode::SaveJadwalDU');
});
// Settings Jalur
$routes->group('admin/setting/jalur', static function ($routes) {
    $routes->post('/', 'Admin\Settings\Jalur::index');
    $routes->post('add', 'Admin\Settings\Jalur::Add');
    $routes->post('store', 'Admin\Settings\Jalur::Store');
    $routes->post('edit', 'Admin\Settings\Jalur::Edit');
    $routes->post('delete', 'Admin\Settings\Jalur::Delete');
    $routes->post('status', 'Admin\Settings\Jalur::Status');
    $routes->post('syarat', 'Admin\Settings\Jalur::Syarat');
    $routes->post('syarat/store', 'Admin\Settings\Jalur::SyaratStore');
    $routes->post('syarat/delete', 'Admin\Settings\Jalur::SyaratDelete');
});

// Masters 
$routes->group('admin/master', static function ($routes) {
    $routes->get('/', 'Admin\Masters\Main::index');
    // Pekerjaan 
    $routes->post('pekerjaan', 'Admin\Masters\Pekerjaan::index');
    $routes->post('pekerjaan/store', 'Admin\Masters\Pekerjaan::Store');
    $routes->post('pekerjaan/del', 'Admin\Masters\Pekerjaan::Delete');
    // Penghasilan 
    $routes->post('penghasilan', 'Admin\Masters\Penghasilan::index');
    $routes->post('penghasilan/store', 'Admin\Masters\Penghasilan::Store');
    $routes->post('penghasilan/del', 'Admin\Masters\Penghasilan::Delete');
    // Pendidikan 
    $routes->post('pendidikan', 'Admin\Masters\Pendidikan::index');
    $routes->post('pendidikan/store', 'Admin\Masters\Pendidikan::Store');
    $routes->post('pendidikan/del', 'Admin\Masters\Pendidikan::Delete');
    // Referensi 
    $routes->post('referensi', 'Admin\Masters\Referensi::index');
    $routes->post('referensi/store', 'Admin\Masters\Referensi::Store');
    $routes->post('referensi/del', 'Admin\Masters\Referensi::Delete');
});