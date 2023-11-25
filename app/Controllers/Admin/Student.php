<?php

namespace App\Controllers\Admin;
use App\Libraries\Hash;

use App\Controllers\BaseController;
use App\Models\StudentAccount;
use App\Models\TagihanModel;
use App\Models\MapelJenisModel;
use App\Models\NilaiRaporModel;
use App\Models\DataSiswaModel;
use App\Models\Masters\JadwalUjianM;
use App\Models\LogPesanModel;

class Student extends BaseController
{
    function __construct()
    {
        $this->StudentM = new StudentAccount;
        $this->DasisM = new DataSiswaModel();
        $this->TagihanM = new TagihanModel;
        $this->Mapel = new MapelJenisModel();
        $this->NilaiM = new NilaiRaporModel();
        $this->LogPM = new LogPesanModel();
    }
    protected $helpers=['admin','master','nilai','curl','count'];
    public function index()
    {
        $data = ['title'=> 'Student'];
        return view('Admin/Students/index', $data);
    }
 

    public function All()
    {
        if ($this->request->isAJAX()) {
            $periode = $this->request->getVar('periode');
            $data = ['student_list'=> $this->StudentM->GetAll($periode)];
            $response= ['all'=> view('Admin/Students/all_list', $data)];
            echo json_encode($response);
        }
    }
    public function Detail($id)
    { 
        $csb_id = intval($id);
        $get_csb= $this->StudentM->AccountDetail($csb_id);
          $data = [
        'title'=> 'Student Detail',
        'csb'=> $get_csb,

          'tagihan'=> $this->TagihanM->AllTagihan($csb_id),
          'list_kelas'=> $this->Mapel->KelasMapel($get_csb->master_school_level_id),
    ];
        return view('Admin/Students/Detail', $data);
    }

    public function SetStatus()
    {
        if ($this->request->isAJAX()) {
            
            $id = $this->request->getPost('id');
            $set_status = $this->request->getPost('set_status');
            $jenis_status = $this->request->getPost('jenis');

            if ($jenis_status=='status_lulus') {


                $data = [
                    'id'=> $id,
                    'status_lulus'=> $set_status=='R'?null:$set_status
                ];
                $this->StudentM->save($data);

                
                // Jika Statusnya LULUS, buat Tagihan Daftar Ulang 
                // if ($set_status=='L') {

                //     $csb = $this->StudentM->where('id', $id)->first();
                //     $this->_createInvoice($id,'daftar-ulang', $csb['nisn'],$csb['gender'], $csb['is_asrama']);
                // }




            }else {
                $data = [
                    'id'=> $id,
                    'status_daftar_ulang'=> $set_status=='R'?null:$set_status
                ];
                $this->StudentM->save($data);
            }
            
            $response = [
                'status'=> true,
                 'msg'=> 'Status Diperbarui'
                ];
            echo json_encode($response);
        }
        


    }
    // SavePilihan
    public function SavePilihan()
    {
        if ($this->request->isAJAX()) {
            $this->validate= \Config\Services::validation();

            $nisn = $this->request->getPost('nisn');
            $old_nisn = $this->request->getPost('old_nisn');
             // Deklarasi Validasi Login 
             $validate = $this->validate(
                 [
             'nisn' => [
                 'label'  => 'NISN',
                 'rules'  => $old_nisn==$nisn ?'required|min_length[7]|max_length[12]':'required|min_length[7]|max_length[12]|is_unique[csb_akun.nisn]',
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
             'is_asrama' => [
                 'label'  => 'Pilihan Asrama',
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
            
                $fieldsToCheck = ['nisn', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'gender',
                    'whatsapp', 'master_periode_id', 'master_jalur_id', 'master_school_level_id',
                    'master_jenis_sekolah_asal_id','is_asrama',
                ];
            
                foreach ($fieldsToCheck as $field) {
                    $error = $this->validate->getError($field);
                    if ($error) {
                        $response[$field] = $error;
                    }
                }
                return $this->response->setJSON($response);
     }else{
        $id = $this->request->getPost('id');
        $data = [
            'id'=> $id,
            'nisn'=> $nisn,
            'nama_lengkap'=>$this->request->getPost('nama_lengkap'),
            'tempat_lahir'=>$this->request->getPost('tempat_lahir'),
            'tanggal_lahir'=>$this->request->getPost('tanggal_lahir'),
            'gender'=>$this->request->getPost('gender'),
            'whatsapp'=>$this->request->getPost('whatsapp'),
            'master_periode_id'=>$this->request->getPost('master_periode_id'),
            'master_jalur_id'=>$this->request->getPost('master_jalur_id'),
            'master_school_level_id'=>$this->request->getPost('master_school_level_id'),
            'master_jenis_sekolah_asal_id'=>$this->request->getPost('master_jenis_sekolah_asal_id'),
            'is_asrama'=>$this->request->getPost('is_asrama')
        ];
        $this->StudentM->save($data);
        $response = $this->request->getPost();
        $response = ['status'=> true, 'msg'=> 'Pilihan Pendaftaran Diperbarui'];
     }

            
           
            echo json_encode($response);
        }
    }
    public function FormBiodata()
    {
        if ($this->request->isAJAX()) {
            
            $id = $this->request->getVar('id');
            $data = [
                'csb'=> $this->StudentM->AccountDetail($id),
                'dasis'=> $this->DasisM->GetDasis($id),
            ];
            $response = ['form_biodata'=> view('Admin/Students/Biodata', $data)];
            echo json_encode($response);
        }
    }

    // Hapus Nilai Rapor 

    public function HapusNilai()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $this->NilaiM->where('csb_akun_id', $id)->delete();
            $response = ['status'=> true];
            echo json_encode($response);
        }
    }

    // SendWhatsApp
    public function SendWhatsApp()
    {
        if ($this->request->isAJAX()) {
            $csb_id = $this->request->getPost('csb_id');
            $target = $this->request->getPost('whatsapp');
            $pesan = $this->request->getPost('pesan');
            $message = "*Pesan Dari Verifikator* \n\n"
            . "".$pesan."\n\n\n"
            . "_Best Regards_ \n *ICT-MTI CANDUANG*";
            
            $kirimWA = KirimWA($target, $message);
            $responseData = json_decode($kirimWA, true);
            if ($responseData['status'] === false) {
            $response= [
                'status'=> false,
                'msg'=> 'Gagal Mengirim Pesan WhatsApp'
            ];
            }else{

            // Simpan Log Pesan 

            $data = [
                'users_id'=> IsLogin()->id,
                'csb_akun_id'=> $csb_id,
                'pesan'=> $pesan,
            
            ];

            $this->LogPM->save($data);
                
                $response= [
                    'status'=> true,
                    'msg'=> 'Pesan Terkirim'
                ];
            }
            echo json_encode($response);
        }
    }
    // Ganti Password
    public function ChangePassword()
    {
        if ($this->request->isAJAX()) {
            

            $csb_id = $this->request->getPost('csb_id');
            $target = $this->request->getPost('whatsapp');
            $new_password = $this->request->getPost('new_password');
            $message = "*Perubahan Password* \n\n"
            . "Password Baru Anda : *".$new_password."*\n\n\n"
            . "_Best Regards_ \n *ICT-MTI CANDUANG*";
            
            $data = [
                'id'=> $csb_id,
                'password'=> Hash::make($new_password),
                'txt_password'=> $new_password,
        ];
            if ($this->StudentM->save($data)) {
                 
            $kirimWA = KirimWA($target, $message);
            $responseData = json_decode($kirimWA, true);
            if ($responseData['status'] === false) {
            $response= [
                'status'=> false,
                'msg'=> 'Gagal Mengirim Pesan WhatsApp'
            ];
            }else{
                $response= [
                    'status'=> true,
                    'msg'=> 'Password Diperbarui dan Terkirim ke WA '. $target
                ];
            }
            }
          
            echo json_encode($response);
        }
    }

    // Peserta Ujian
    public function ListPesertaUjian()
    {
        if ($this->request->isAJAX()) {
            $periode = $this->request->getVar('periode');
            $jadwalM = new JadwalUjianM();
            $data = ['jadwal_list'=> $jadwalM->ByPeriode($periode)];
            $response= ['jadwal_ujian'=> view('Admin/Students/Jadwal', $data)];
            echo json_encode($response);
        }
        
    }
    // Pserta Daftar Ulang 
    public function ListPesertaDaftarUlang()
    {
        if ($this->request->isAJAX()) {
            $periode = $this->request->getVar('periode');            
            $data = ['daftar_ulang_list'=> $this->StudentM->PesertaDaftarUlang($periode)];
            $response= ['daftar_ulang'=> view('Admin/Students/DaftarUlang', $data)];
            echo json_encode($response);
        }
        
    }

    // DeleteTagihan
    public function DeleteTagihan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $this->TagihanM->delete($id);
            $response = ['status'=> true,'msg'=> 'Tagihan Telah Dihapus'];
            echo json_encode($response);
        }
    }
    // Pendaftar By Kabupaten 

    public function ByKabupaten($id)
    {
        $kab_id = base64_decode($id);
        $kabupaten = 'https://api.mticanduang.sch.id/kabupaten/' . $kab_id;
        $get_kab = GetWilayah($kabupaten);
        $data = [
            'title'=> 'Pendaftar Kabupaten',
            'kab'=> $get_kab['kabupaten'],
            'list'=> $this->StudentM->RegByKab($kab_id)
        ];
        return view('Admin/Students/StudentByKabupaten', $data);
    }





        // Buat Tagihan 
// private function _createInvoice($csb_akun_id,$jenis_biaya,$nomor_bayar, $is_gender=null, $is_asrama=null)
// {
// $tagihanModel = new TagihanModel();
// if ($csb_akun_id==null) {
// return 0;
// }
// // Ambil data dari tabel master biaya
// $master_biaya = $tagihanModel->GetBiaya($is_gender, $is_asrama,$jenis_biaya);
// $get_tagihan = $tagihanModel->GetTagihan($csb_akun_id, $master_biaya->id);
// $data = [
// 'id'=> $get_tagihan==null ? 0 : $get_tagihan->id,
// 'csb_akun_id'=> $csb_akun_id,
// 'master_biaya_id'=> $master_biaya->id,
// 'tanggal_invoice'=> date('Y-m-d'),
// 'nomor_bayar'=> $nomor_bayar,
// 'nominal_tagihan'=> $master_biaya->jumlah
// ];

// $tagihanModel->save($data);
// }
}