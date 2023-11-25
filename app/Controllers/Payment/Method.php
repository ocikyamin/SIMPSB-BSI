<?php

namespace App\Controllers\Payment;

use App\Controllers\BaseController;
use App\Models\TagihanModel;
use App\Models\BuktiBayarModel;
use App\Models\StudentAccount;

class Method extends BaseController
{
    protected $helpers= ['curl'];
    function __construct()
    {
       $this->TagihanM = new TagihanModel();
       $this->BuktiM = new BuktiBayarModel();
       $this->StudentM = new StudentAccount();
    }
    public function index()
    {
        
    }
    public function PaymentMethod()
    {
        if ($this->request->isAJAX()) {
$csb_akun_id = $this->request->getPost('csb_akun_id');
$payment_method = $this->request->getPost('payment_method');
$jenis_tagihan = $this->request->getPost('jenis_tagihan');

if ($jenis_tagihan=='daftar') {
    $get_tagihan= $this->TagihanM->TagihanAwal($csb_akun_id);
   $data = [
    'tagihan'=> $get_tagihan,
    'payment_method'=> $payment_method,
    'bukti_bayar'=> $this->BuktiM->where('tagihan_id',$get_tagihan->tagihan_id)->first()
    ];
}else{
    $get_tagihan= $this->TagihanM->TagihanDaftarUlang($csb_akun_id);
    $data = [
        'tagihan'=> $get_tagihan,
        'payment_method'=> $payment_method,
        'bukti_bayar'=> $this->BuktiM->where('tagihan_id',$get_tagihan->tagihan_id)->first()
    ];
 }

$response = ['form_payment_method'=> view('Payment/form_payment_method', $data)];
echo json_encode($response);
}
}

public function KonfirmBuktiTransaksi()
{
    if ($this->request->isAJAX()) {
        $id = $this->request->getPost('id');
        $data = [
            'id'=> $id,
            'bukti_bayar'=> $this->BuktiM->where('tagihan_id',$id)->first()
    ];        
        $response = ['form_upload'=> view('Payment/form_upload', $data)];
        echo json_encode($response);
        }
}
public function UploadBuktiTransaksi()
{
    if ($this->request->isAJAX()) {
        $id = $this->request->getPost('id');
    
        $validationRules = [
            'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png]',
            'tanggal_transaksi' => 'required',
            'waktu_transaksi' => 'required',
            'nama_pengirim' => 'required',
            'norek_pengirim' => 'required',
            'jumlah_transfer' => 'required',
            'bank_channel' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $file = $this->request->getFile('image');
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'files/_bukti_bayar/', $fileName);

            $oldImageName = $this->request->getPost('old_image_name'); // Nama gambar lama dari formulir

            // Periksa apakah gambar lama bukan default.png sebelum menghapusnya
            if ($oldImageName) {
                unlink(ROOTPATH . 'files/_bukti_bayar/' . $oldImageName); // Hapus gambar lama
            }
            
            // Simpan informasi file di database
            $id_tagihan = $this->request->getPost('tagihan_id');

            $data = [
                'id'=> $id,
                'tagihan_id'=> $id_tagihan,
                'tanggal_transaksi'=> $this->request->getPost('tanggal_transaksi'),
                'waktu_transaksi'=> $this->request->getPost('waktu_transaksi'),
                'nama_pengirim'=> $this->request->getPost('nama_pengirim'),
                'norek_pengirim'=> $this->request->getPost('norek_pengirim'),
                'jumlah_transfer'=> $this->request->getPost('jumlah_transfer'),
                'comment'=> null,
                'lampiran'=> $fileName,
                'bank_channel'=> $this->request->getPost('bank_channel'),
                'status_bukti'=> null
            ];

            $data_status = [
                'id'=> $id_tagihan,
                'payment_method'=> $id_tagihan,
                'status_pembayaran'=> 'WAITING',
                'payment_method'=> 'manual',
            ];
          
            $this->BuktiM->save($data);
            $this->TagihanM->save($data_status);

            return $this->response->setJSON(['success' => 'File uploaded successfully']);
        } else {
            return $this->response->setJSON(['error' => $this->validator->getErrors()]);
        }
        }
}

// ViewdBuktiTransaksi
public function ViewdBuktiTransaksi()
{
    if ($this->request->isAJAX()) {
        $id = $this->request->getVar('id');
        $whatsapp = $this->request->getVar('whatsapp');
        $data = [
            'id'=> $id,
            'whatsapp'=> $whatsapp,
            'bukti_bayar'=> $this->BuktiM->where('tagihan_id',$id)->first(),
            'tagihan'=>  $this->TagihanM->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')->where('csb_tagihan_pembayaran.id',$id)->first()
    ];        
        $response = ['form_bukti_bayar'=> view('Payment/form_bukti_bayar', $data)];
        echo json_encode($response);
        }
   
}

// VerifyBuktiTransaksi
public function VerifyBuktiTransaksi()
{
    if ($this->request->isAJAX()) {
        // Format Pesan WA 
        $whatsapp = $this->request->getPost('whatsapp');
        $target = $whatsapp;
        $tagihan_id = $this->request->getPost('tagihan_id');
        $bukti_bayar_id = $this->request->getPost('bukti_bayar_id');
        $comment = $this->request->getPost('comment');
        $verify = $this->request->getPost('verify');
        $status_info = $this->request->getPost('status_info');
        $jenis_biaya = $this->request->getPost('jenis_biaya');
        $csb_akun_id = $this->request->getPost('csb_akun_id');
        if ($verify=="N") {
            $set_status_bayar = [
                'id'=> $tagihan_id,
                'status_pembayaran'=> 'FAIL'
            ];
            $set_status_bukti_bayar = [
                'id'=> $bukti_bayar_id,
                'comment'=> $comment,
                'status_bukti'=> 'FAIL',
            ];
            $this->TagihanM->save($set_status_bayar);
            $this->BuktiM->save($set_status_bukti_bayar);
            if ($jenis_biaya=='daftar-ulang'){
                $set_status_du = [
                    'id'=> $csb_akun_id,
                    'status_daftar_ulang'=> 'proses'
                ];
                $this->StudentM->save($set_status_du);
            }
            

            // Jika Status Info di centang 
            if ($status_info=='on') {
                $response= [
                    'status'=> true,
                    'msg'=> 'Bukti Pembayaran Ditolak'
                ];
            }else{
                // Pesan WA Jika Bukti Pembayaran Ditolak
            $message = "*BUKTI PEMBAYARAN DITOLAK* \n\n"
            . "Harap Periksa Bukti Pembayaran !!\n\n"
            . "Tim Verifikasi *Menolak* Bukti Pembayaran Anda. Berikut Alasannya :  \n"
            . "Catatan : *".$comment."*\n\n"
            . "Silahkan Login Pada Portal PSB MTI Canduang menggunkan Akun anda untuk mengatasinya \n\n\n"
            . "Hubungi admin kami jika perlu bantuan : *082122551928* \n\n"
            . "Klik atau salin tautan berikut untuk membuka halaman login : *https://psb.mticanduang.sch.id/login/*\n\n\n"
            . "_Best Regards_ \n *ICT-MTI CANDUANG*";
            $kirimWA = KirimWA($target, $message);
            $responseData = json_decode($kirimWA, true);
            if ($responseData['status'] === false) {
            $response= [
                'status'=> false,
                'msg'=> 'Gagal Mengirim Pesan WhatsApp'
            ];
            }else{
                // echo "Pesan berhasil terkirim.";
                $response= [
                    'status'=> true,
                    'msg'=> 'Pesan Terkirim'
                ];
            }
            }
            // $response = ['status'=> true];

        }else if ($verify=="Y") {
            $set_status_bayar = [
                'id'=> $tagihan_id,
                'status_pembayaran'=> 'SUKSES'
            ];
            $set_status_bukti_bayar = [
                'id'=> $bukti_bayar_id,
                'comment'=> null,
                'status_bukti'=> 'DITERIMA'
            ];
            $this->TagihanM->save($set_status_bayar);
            $this->BuktiM->save($set_status_bukti_bayar);
            
            // Jika bukti pembayaran Daftar Ulang diterima, updat status daftar ulang 
            if ($jenis_biaya=='daftar-ulang') {
                $set_status_du = ['id'=> $csb_akun_id,'status_daftar_ulang'=> 'SELESAI'];
                $this->StudentM->save($set_status_du);
            }
            
            if ($status_info=='on') {
                $response= [
                    'status'=> true,
                    'msg'=> 'Bukti Pembayaran Diterima'
                ];
            }else{
                // $response = ['status'=> true];
if ($jenis_biaya=='daftar-ulang') {
// Pesan WA Jika Bukti Pembayaran Diterima
$message = "*PENDAFTARAN ULANG SELESAI ! * \n\n"
. "Terimakasih Telah Melakukan Pembayaran. Bukti Pembayaran Telah Diterima !!\n\n\n"
. "*Selamat !* Ananda telah diterima sebagai *Santri Baru* Pondok Pesantren Madrsah Tarbiyah Islamiyah Canduang. Simpan tanda bukti daftar ulang sebagai syarat untuk pengambilan seragam santri baru. Informasi lebih lanjut akan di informasikan melalui WhatsApp Group Santri Baru MTI Canduang.\n\n\n"
. "Silahkan Login Pada Portal PSB MTI Canduang menggunakan Akun anda untuk melihat status pendaftaran dan mendownload Kartu Tanda Daftar Ulang. \n\n"
. "Klik atau salin tautan berikut untuk membuka halaman login : *https://psb.mticanduang.sch.id/login/*\n\n\n"
. "_Best Regards_ \n *ICT-MTI CANDUANG*";

}else{
    $message = "*PEMBAYARAN SELESAI !* \n\n"
. "Terimakasih Telah Melakukan Pembayaran. Bukti Pembayaran Telah Diterima !!\n\n"
. "Silahkan Login Pada Portal PSB MTI Canduang menggunakan Akun anda untuk melihat status pendaftaran \n\n"
. "Klik atau salin tautan berikut untuk membuka halaman login : *https://psb.mticanduang.sch.id/login/*\n\n\n"
. "_Best Regards_ \n *ICT-MTI CANDUANG*";

}


$kirimWA = KirimWA($target, $message);
$responseData = json_decode($kirimWA, true);
if ($responseData['status'] === false) {
$response= [
'status'=> false,
'msg'=> 'Gagal Mengirim Pesan WhatsApp'
];
}else{
// echo "Pesan berhasil terkirim.";
$response= [
'status'=> true,
'msg'=> 'Pesan Terkirim'
];
}

            }



            
        }

        // $response = $data;
        echo json_encode($response);
        }
    
}



}