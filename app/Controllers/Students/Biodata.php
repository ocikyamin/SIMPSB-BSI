<?php

namespace App\Controllers\Students;
use Picqer\Barcode\BarcodeGeneratorPNG;

use App\Controllers\BaseController;
use App\Models\DataSiswaModel;
use App\Models\StudentAccount;
use App\Models\TagihanModel;

class Biodata extends BaseController
{
    protected $helpers= ['csb','master','curl'];
    function __construct()
    {
        $this->DasisM = new DataSiswaModel();
    }
    public function index()
    {
      
        $akunM = new StudentAccount();
        $tagihanModel = new TagihanModel();
        $data = [
            'Title'=> 'Student | Home',
            'status'=> $akunM->StatusCSB(CSB()->id),
            'dasis'=> $this->DasisM->GetDasis(CSB()->id),
            'tagihan'=> $tagihanModel->TagihanDaftarUlang(CSB()->id),
            'jadwal_du'=> $this->DasisM->JadwalDaftarUlang(CSB()->master_periode_id, CSB()->master_jalur_id)
        ];
        return view('Student/Biodata/index', $data);
    
    }
    public function SaveBiodata()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $csb_akun_id = $this->request->getPost('csb_akun_id');
            $nik = $this->request->getPost('nik');
            $data = [
                'id'=> $id==""?0:$id,
                'csb_akun_id'=> $csb_akun_id,
                'nik'=> $nik,
                'nokk'=> $this->request->getPost('nokk'),
                'jumlah_saudara'=> $this->request->getPost('jumlah_saudara'),
                'anak_ke'=> $this->request->getPost('anak_ke'),
                'hobi'=> $this->request->getPost('hobi'),
                'cita_cita'=> $this->request->getPost('cita_cita'),
                'alamat_email'=> $this->request->getPost('alamat_email'),
                'yang_membiayai_sekolah'=> $this->request->getPost('yang_membiayai_sekolah'),
                'kebutuhan_disabilitas'=> $this->request->getPost('kebutuhan_disabilitas'),
                'kebutuhan_khusus'=> $this->request->getPost('kebutuhan_khusus'),
                'ayah_nik'=> $this->request->getPost('ayah_nik'),
                'ayah_nama_lengkap'=> $this->request->getPost('ayah_nama_lengkap'),
                'ayah_tempat_lahir'=> $this->request->getPost('ayah_tempat_lahir'),
                'ayah_tanggal_lahir'=> $this->request->getPost('ayah_tanggal_lahir'),
                'ayah_status'=> $this->request->getPost('ayah_status'),
                'ayah_pendidikan_terakhir'=> $this->request->getPost('ayah_pendidikan_terakhir'),
                'ayah_pekerjaan_utama'=> $this->request->getPost('ayah_pekerjaan_utama'),
                'ayah_no_handphone'=> $this->request->getPost('ayah_no_handphone'),
                'ayah_penghasilan_rata_perbulan'=> $this->request->getPost('ayah_penghasilan_rata_perbulan'),

                'ibu_nik'=> $this->request->getPost('ibu_nik'),
                'ibu_nama_lengkap'=> $this->request->getPost('ibu_nama_lengkap'),
                'ibu_tempat_lahir'=> $this->request->getPost('ibu_tempat_lahir'),
                'ibu_tanggal_lahir'=> $this->request->getPost('ibu_tanggal_lahir'),
                'ibu_status'=> $this->request->getPost('ibu_status'),
                'ibu_pendidikan_terakhir'=> $this->request->getPost('ibu_pendidikan_terakhir'),
                'ibu_pekerjaan_utama'=> $this->request->getPost('ibu_pekerjaan_utama'),
                'ibu_no_handphone'=> $this->request->getPost('ibu_no_handphone'),
                'ibu_penghasilan_rata_perbulan'=> $this->request->getPost('ibu_penghasilan_rata_perbulan'),
                'orang_tua_alamat'=> $this->request->getPost('orang_tua_alamat'),
                
                'sekolah_npsn'=> $this->request->getPost('sekolah_npsn'),
                'sekolah_nama'=> $this->request->getPost('sekolah_nama'),
                'sekolah_status'=> $this->request->getPost('sekolah_status'),
                'sekolah_alamat'=> $this->request->getPost('sekolah_alamat'),
          
             ];


            //  Jalankan Model 
            if (!$this->DasisM->save($data)) {
                // Validasi gagal, ambil pesan kesalahan
        $response['status'] = 'error';
        $response['message'] = $this->DasisM->errors();
            }else{
                $confirm = $this->request->getPost('confirm');
                if ($confirm == "" || $confirm==null) {
                    $response['status'] = 'error';
                    $response['message'] = ['confirm'=> 'Harap Centang Checbox Konfirmasi'];
                }else{
                    $response['status'] = 'success';
                $response['message'] = 'Biodata Berhasil dikirim';
                }
            }
            echo json_encode($response);
        }
    }

    public function ReqDaftarUlang()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $nisn = $this->request->getPost('nisn');
            $is_gender = $this->request->getPost('gender');
            $is_asrama = $this->request->getPost('is_asrama');
            $data = [
                'id'=> $id,
                'status_daftar_ulang'=> 'proses'
            ];
            $akunM = new StudentAccount();
            $akunM->save($data);
            $this->_createInvoice($id,'daftar-ulang',$nisn,$is_gender, $is_asrama);
            $target = CSB()->whatsapp;

            $jadwal_du= $this->DasisM->JadwalDaftarUlang(CSB()->master_periode_id, CSB()->master_jalur_id);


            // Silahkan melakukan pendaftaran ulang dimulai dari tanggal


// Pesan WA Jika Tagihan Daftar Ulang dubuat
$message = "*INFO TAGIHAN PENDAFTARAN ULANG!* \n\n"
. "Permintaan Daftar Ulang berhasil !\n\n"
. "Silahkan melakukan pendaftaran ulang dimulai dari tanggal *".date('d - F - Y',
strtotime($jadwal_du->tanggal_mulai))."* s/d *".date('d - F - Y',
strtotime($jadwal_du->tanggal_akhir))."*\n\n\n"
. "Untuk melakukan pendaftaran ulang silahkan bapak/ibu login pada Portal PSB MTI Canduang dengan Akun calon santri untuk mendapatkan informasi Tagihan dan metode pembayaran !\n\n"
. "Klik atau salin tautan berikut untuk membuka halaman login : *https://psb.mticanduang.sch.id/login/*\n\n\n"
. "Note : _Jika perlu bantuan silahkan hubungi kami pada nomor *082122551928*_ . Terimakasih !\n\n"
. "_Best Regards_ \n *Panitia PSB MTI Canduang*";
$kirimWA = KirimWA($target, $message);
$responseData = json_decode($kirimWA, true);
if ($responseData['status'] === false) {
$response= [
'status'=> false,
'msg'=> 'Gagal Mengirim Notifikasi WhatsApp'
];
}else{
// echo "Pesan berhasil terkirim.";
$response['status'] = 'success';
$response['message'] = 'Permintaan Daftar Ulang berhasil. Silahkan Melakukan Pembayaran';
}


echo json_encode($response);



}
}


// Buat Tagihan Daftar Ulang
private function _createInvoice($csb_akun_id,$jenis_biaya,$nomor_bayar,$is_gender=null,$is_asrama=null)
{
$tagihanModel = new TagihanModel();
// Ambil data dari tabel master biaya
$master_biaya = $tagihanModel->GetBiaya($is_gender,$is_asrama,$jenis_biaya);
$get_tagihan = $tagihanModel->GetTagihan($csb_akun_id,$master_biaya->id);
$data = [
'id'=> $get_tagihan==null ? 0 : $get_tagihan->id,
'csb_akun_id'=> $csb_akun_id,
'master_biaya_id'=> $master_biaya->id,
'tanggal_invoice'=> date('Y-m-d'),
'nomor_bayar'=> $nomor_bayar,
'nominal_tagihan'=> $master_biaya->jumlah
];

$tagihanModel->save($data);
}


// public function InfoTagihanDaftarUlang()
// {
// if ($this->request->isAJAX()) {
// $id = $this->request->getPost('id');
// $tagihanModel = new TagihanModel();
// $data = ['tagihan'=> $tagihanModel->TagihanDaftarUlang($id)];
// $response = ['tagihan_du'=> view('Student/Biodata/tagihan_daftar_ulang', $data)];
// echo json_encode($response);
// }
// }

// public function PrintKatuDaftarUlang($id)
// {
// // echo $id;
// $csb_id = base64_decode($id);

// $tagihan = new TagihanModel();
// $akunM = new StudentAccount();
// $csb_akun = $akunM->AccountDetail($csb_id);
// // dd($csb_akun);


// $data = [
// 'csb'=> $csb_akun,
// 'barcode'=> $this->_createBarcode($csb_akun->nisn)
// ];
// return view('Student/Print/kartu_daftar_ulang', $data);



// }

private function _createBarcode($isi)
{
$generator = new BarcodeGeneratorPNG();
return '<img
    src="data:image/png;base64,' . base64_encode($generator->getBarcode($isi, $generator::TYPE_CODE_128, 3, 50)) . '">';
}






}