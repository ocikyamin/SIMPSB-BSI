<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\StudentAccount;
use App\Libraries\Hash;
use App\Models\TagihanModel;

class Registration extends BaseController
{
    function __construct()
    {
        $this->model = new StudentAccount();
    }
    protected $helpers= ['master','csb','curl'];
    public function index()
    {
        $data = ['title'=> 'Register'];
       return view('Registration/index', $data);
    }

    public function CreateNewAcoount()
    {
        if ($this->request->isAJAX()) {
            $this->validate= \Config\Services::validation();
             // Deklarasi Validasi Login 
             $validate = $this->validate(
                 [
             'noreg' => [
                 'label'  => 'Nomor Registrasi',
                 'rules'  => 'required|is_unique[csb_akun.noreg]',
                 'errors' => [
                     'required' => '{field} Wajib Diisi',
                     'is_unique' => '{field} Terdaftar. Refresh Halaman Anda',
                     ]
             ],
             'nisn' => [
                 'label'  => 'NISN',
                 'rules'  => 'required|min_length[7]|max_length[12]|is_unique[csb_akun.nisn]',
                 'errors' => [
                     'required' => '{field} Wajib Diisi',
                     'min_length' => '{field} Kurang dari Batas Minimal',
                     'max_length' => '{field} Lebih dari Batas Maksimal',
                     'is_unique' => '{field} Telah Terdaftar. Periksa Kembali',
                     ]
                 ],
             'nama_lengkap' => [
                 'label'  => 'Nama Lengkap',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'tempat_lahir' => [
                 'label'  => 'Tempat Lahir',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'tanggal_lahir' => [
                 'label'  => 'Tanggal Lahir',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'gender' => [
                 'label'  => 'Gender / Jenis Kelamin',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'whatsapp' => [
                 'label'  => 'WhatsApp',
                 'rules'  => 'required|regex_match[/^08[0-9]{9,}$/]|numeric',
                 'errors' => [
                     'required' => '{field} Wajib Diisi',
                     'regex_match' => '{field} Harus dimulai dari 08',
                     'numeric' => '{field} Harus Angka',
                     ]
                 ],
             'master_periode_id' => [
                 'label'  => 'Periode',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'master_jalur_id' => [
                 'label'  => 'Jalur Pendaftaran',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'master_school_level_id' => [
                 'label'  => 'Jenjang Pendidikan',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'master_jenis_sekolah_asal_id' => [
                 'label'  => 'Jenis Sekolah Asal',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'm_referensi_id' => [
                 'label'  => 'Referensi',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'is_asrama' => [
                 'label'  => 'Pilihan Asrama',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'provinsi_id' => [
                 'label'  => 'Propinsi',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'kabupaten_id' => [
                 'label'  => 'Kabupaten / Kota',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'kecamatan_id' => [
                 'label'  => 'Kecamatan',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'desa_id' => [
                 'label'  => 'Desa / Kelurahan',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
             'alamat_jalan' => [
                 'label'  => 'Nama Jalan / Dusun',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Wajib Diisi'
                     ]
                 ],
                ]
             );
             // Jika Tidak Tervalidasi, Kembalikan Pesan Error 
             if (!$validate) {
                $response = [
                    'status' => 'error',
                ];
            
                $fieldsToCheck = [
                    'noreg', 'nisn', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'gender',
                    'whatsapp', 'master_periode_id', 'master_jalur_id', 'master_school_level_id',
                    'master_jenis_sekolah_asal_id', 'm_referensi_id', 'is_asrama', 'provinsi_id',
                    'kabupaten_id', 'kecamatan_id', 'desa_id', 'alamat_jalan',
                ];
            
                foreach ($fieldsToCheck as $field) {
                    $error = $this->validate->getError($field);
                    if ($error) {
                        $response[$field] = $error;
                    }
                }
            
                return $this->response->setJSON($response);


                // $response = [
                // 'status'=> 'error',
                // 'noreg' => $this->validate->getError('noreg'),
                // 'nisn' => $this->validate->getError('nisn'),
                // 'nama_lengkap' => $this->validate->getError('nama_lengkap'),
                // 'tempat_lahir' => $this->validate->getError('tempat_lahir'),
                // 'tanggal_lahir' => $this->validate->getError('tanggal_lahir'),
                // 'gender' => $this->validate->getError('gender'),
                // 'whatsapp' => $this->validate->getError('whatsapp'),
                // 'master_periode_id' => $this->validate->getError('master_periode_id'),
                // 'master_jalur_id' => $this->validate->getError('master_jalur_id'),
                // 'master_school_level_id' => $this->validate->getError('master_school_level_id'),
                // 'master_jenis_sekolah_asal_id' => $this->validate->getError('master_jenis_sekolah_asal_id'),
                // 'm_referensi_id' => $this->validate->getError('m_referensi_id'),
                // 'is_asrama' => $this->validate->getError('is_asrama'),
                // 'provinsi_id' => $this->validate->getError('provinsi_id'),
                // 'kabupaten_id' => $this->validate->getError('kabupaten_id'),
                // 'kecamatan_id' => $this->validate->getError('kecamatan_id'),
                // 'desa_id' => $this->validate->getError('desa_id'),
                // 'alamat_jalan' => $this->validate->getError('alamat_jalan')
                // ];
     }else{
        // $passwordGenerator = new PasswordGenerator();
     
        
            $whatsapp = $this->request->getPost('whatsapp');
            $noreg = $this->request->getPost('noreg');
            $nisn = $this->request->getPost('nisn');
            $nama = $this->request->getPost('nama_lengkap');
            // $txtpass = substr($nama,-2).'@'.substr($nisn,2);
            $password = Hash::generatePassword();

            $data = [
            'noreg' => $noreg,
            'password' => Hash::make($password),
            'txt_password' => $password,
            'nisn' => $nisn,
            'nama_lengkap' => $nama,
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'gender' => $this->request->getPost('gender'),
            'whatsapp' => $whatsapp,
            'master_periode_id' => $this->request->getPost('master_periode_id'),
            'master_jalur_id' => $this->request->getPost('master_jalur_id'),
            'master_school_level_id' => $this->request->getPost('master_school_level_id'),
            'master_jenis_sekolah_asal_id' => $this->request->getPost('master_jenis_sekolah_asal_id'),
            'm_referensi_id' => $this->request->getPost('m_referensi_id'),
            'is_asrama' => $this->request->getPost('is_asrama'),
            'provinsi_id' => $this->request->getPost('provinsi_id'),
            'kabupaten_id' => $this->request->getPost('kabupaten_id'),
            'kecamatan_id' => $this->request->getPost('kecamatan_id'),
            'desa_id' => $this->request->getPost('desa_id'),
            'alamat_jalan' => $this->request->getPost('alamat_jalan')
            ];
            
        // Format Pesan WA 
            $target = $whatsapp;
            $message = "*Aktivasi Akun Santri Baru* \n\n"
            . "SELAMAT !!\n\n"
            . "Anda telah berhasil membuat akun calon santri baru atas Nama *".strtoupper($nama)."* pada tanggal *".date('d F Y')."*. Silahkan Login untuk melanjutkan Pendaftaran.\n\n"
            . "*Gunakan Akun berikut untuk masuk pada Halaman Calon Santri :*\n\n"
            . "Nomor Registrasi : *".$noreg."*\n"
            . "NISN : *".$nisn."*\n"
            . "Password : *".$password."*\n\n"
            . "Klik Menu *Login* atau \n"
            . "Klik atau salin tautan berikut untuk membuka halaman login : *".base_url('login')."*\n\n\n"
            . "_Best Regards_ \n *ICT-MTI CANDUANG*";
         // Validasi data menggunakan model
         if (!$this->model->save($data)) {
            // Validasi gagal, ambil pesan kesalahan
            $response['status'] = 'error';
            $response['message'] = $this->model->errors();
            } else {
                $csb_akun_id = intval($this->model->getInsertID());
                // Buat Tagihan Pendaftaran 
                $this->_createInvoice($csb_akun_id,'daftar',$nisn,null, null);
                // Kirim Pesan
                $kirimWA = KirimWA($target, $message);
                $responseData = json_decode($kirimWA, true);
                if ($responseData['status'] === false) {
                $response['status'] = 'error';
                $response['message'] = ['whatsapp'=> 'Gagal Mengirim Pesan WhatsApp. Hubungi Panitia untuk mendapatkan Password Login'];
                }else{
                    // echo "Pesan berhasil terkirim.";
                    $response['status'] = 'success';
                    $response['message'] = 'Silhkan Periksa Pesan WhatsApp anda. Sistem Telah mengirim Pesan Otomatis ke Nomor '.$whatsapp.' Tentang Informasi Akun Santri Baru. Hubungi Panitia Jika Tidak Mendapatkan Pesan ';
                }
            }

     }  
        // Buat instance model
        echo json_encode($response);
        }
    }

    // Persyaratan Jalur 

    public function GetSyarat()
    {
     
if ($this->request->isAJAX()) {
  
    $jalur_id = $this->request->getVar('id');
    
    $option = "";
    // $jalur = "";
    $data = $this->model->SyaratJalur($jalur_id);
    if ($data) {
        foreach ($data as $row) {
            $option .= '<li class="text-dark">'.$row['syarat'].'</li>';
            // $jalur .= $row['jalur_name'];
         }
         $msg = [
            'info'=>  $option,
            'jalur'=> $this->model->GetJalur($jalur_id)
        ];
        }else{
        $msg = ['info'=>  false];

    }
   
    echo json_encode($msg);
   
  }
    }


    // Buat Tagihan 
private function _createInvoice($csb_akun_id,$jenis_biaya,$nomor_bayar, $is_gender=null, $is_asrama=null)
{
$tagihanModel = new TagihanModel();
if ($csb_akun_id==null) {
return 0;
}
// Ambil data dari tabel master biaya
$master_biaya = $tagihanModel->GetBiaya($is_gender, $is_asrama,$jenis_biaya);
$get_tagihan = $tagihanModel->GetTagihan($csb_akun_id, $master_biaya->id);
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
    
}