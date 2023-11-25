<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentAccount;
use App\Models\PresensiModel;

class Presensi extends BaseController
{
    function __construct()
    {
        $this->StudentM = new StudentAccount();
        $this->PresensiM = new PresensiModel();
    }
    protected $helpers=['admin','master'];
    public function index()
    {
        $data = ['title'=> 'Presensi'];
        return view('Admin/Presensi/index', $data);
    }

    public function Store()
    {
      if ($this->request->isAJAX()) {
        $this->validate= \Config\Services::validation();
        // Deklarasi Validasi Login 
        $validate = $this->validate(
        [
        'nisn' => [
        'label'  => 'KODE BARODE',
        'rules'  => 'required',
        'errors' => [
        'required' => '{field} Kosong'
        ]
        ],
        'type_scan' => [
        'label'  => 'JENIS PRESENSI',
        'rules'  => 'required|is_unique[users.email]',
        'errors' => [
        'required' => '{field} Belum dipilih',
        ]
        ],
        ]
        );
        // Jika Tidak Tervalidasi, Kembalikan Pesan Error 
        if (!$validate) {
        $response = [
        'status'=> false,
        'nisn' => $this->validate->getError('nisn'),
        'type_scan' => $this->validate->getError('type_scan')
        ];
        }else{

            $nisn = $this->request->getPost('nisn');
            $type_scan = $this->request->getPost('type_scan');
            $periode_id = $this->request->getPost('periode_id');
            $get = $this->StudentM->where('nisn', $nisn)->first();

            if ($get) {
                // Cek jika presensi telah ada 
                $whre = [
                    'csb_akun_id'=> $get['id'],
                    'type_scan'=> $type_scan,
                ];
                $cek_status = $this->PresensiM->where($whre)->first();
                if ($cek_status) {
                    $data = [
                        'id'=> $cek_status['id'],
                        'csb_akun_id'=> $get['id'],
                        'type_scan'=> $type_scan,
                    ];
                    $this->PresensiM->save($data);
                    $response = [
                        'status'=> true,
                        'type_scan'=> $type_scan,
                        'nama'=> $get['nama_lengkap'],
                        'periode_id'=> $periode_id
                    ];
                }else{
                    $data = [
                        'csb_akun_id'=> $get['id'],
                        'type_scan'=> $type_scan,
                    ];
                    $this->PresensiM->save($data);
                    $response = [
                        'status'=> true,
                        'type_scan'=> $type_scan,
                        'nama'=> $get['nama_lengkap'],
                        'periode_id'=> $periode_id
                    ];
                    
                }
                
                
            }else{
                $response = [
                    'status'=> false,
                    'nisn' => 'KODE BARCODE / NISN Tidak ditemukan',
                    ];
            }

           
        }
        
        echo json_encode($response);
       
      }
    }

    public function DaftarHadir()
    {
        if ($this->request->isAJAX()) {
            $periode_id = $this->request->getPost('periode_id');
            $data = [
                'list'=> $this->PresensiM->GetDaftarHadir($periode_id),
                'periode_id'=> $periode_id
            ];
            $response = ['list_presensi'=> view('Admin/Presensi/daftar_hadir', $data)];

            echo json_encode($response);
        }
    }
}