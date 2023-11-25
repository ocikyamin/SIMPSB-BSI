<?php

namespace App\Controllers\Admin\Settings;

use App\Controllers\BaseController;
use App\Models\Masters\PeriodeM;
use App\Models\Masters\JalurM;
use App\Models\Masters\JadwalUjianM;
use App\Models\Masters\JadwalDuM;

class Periode extends BaseController
{
    protected $helpers=['admin'];
    
    function __construct()
    {
        $this->PeriodM = new PeriodeM();
        $this->JalurM = new JalurM();
        $this->JadwalUjianM = new JadwalUjianM();
        $this->JadwalDuM = new JadwalDuM();
    }
    public function index()
    {
        $data = [
            'list'=> $this->PeriodM->findAll(),
        ];
        $response = ['index'=>view('Admin/Setting/Periode/index', $data)];
        echo json_encode($response);
    }
    public function Add()
    {
        $response = ['add'=>view('Admin/Setting/Periode/Add')];
        echo json_encode($response);
    }
    public function Store()
    {
        $id = $this->request->getPost('id');
                
        $data = [
            'id'=> $id==null ? null : $id,
            'periode'=> $this->request->getPost('periode'),
            'tahap_daftar'=> $this->request->getPost('tahap_daftar'),
            'tanggal_penerimaan'=> $this->request->getPost('tanggal_penerimaan'),
        ];
        $this->PeriodM->save($data);
        $response = [
            'status'=> true
        ];
        echo json_encode($response);
    }

    public function Edit()
    {
        $id = $this->request->getPost('id');
        $data = ['periode'=> $this->PeriodM->find($id)];
        $response = ['edit'=>view('Admin/Setting/Periode/Edit', $data)];
        echo json_encode($response);
    }
  
    public function Delete()
    {
        $id = $this->request->getPost('id');
        $this->PeriodM->delete($id);
        $response = ['status'=>true];
        echo json_encode($response);
    }
    public function Status()
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');
        $data = ['id'=> $id,
         'is_active'=> $status==1 ? null : 1
        ];
        
        $this->PeriodM->save($data);
        $response = [
            'status'=>true,
            'msg'=>$status==1 ? 'Periode di tutup !':'Periode dibuka !' ,
        ];
        echo json_encode($response);
    }

    // Penjadwalan 
    public function Jadwal()
    {
        $id = $this->request->getPost('id');
        $data = ['periode'=> $this->PeriodM->find($id)];
        $response = ['jadwal'=>view('Admin/Setting/Periode/Jadwal', $data)];
        echo json_encode($response);
    }

    public function ListJadwal()
    {
        $type = $this->request->getVar('type');
        $periode_id = $this->request->getVar('periode_id');
        if ($type==1) {
            $data = [
                'periode_id'=> $periode_id,
                'jalur_list'=> $this->JalurM->findAll()
            ];
            $response = ['list_jadwal'=>view('Admin/Setting/Periode/JadwalUjian', $data)];
        }elseif ($type==2) {
            $data = [
                'periode_id'=> $periode_id,
                'jalur_list'=> $this->JalurM->findAll()
            ];
            $response = ['list_jadwal'=>view('Admin/Setting/Periode/JadwalDaftarUlang', $data)];
        }
        echo json_encode($response);
    }
    public function AddJadwal()
    {
        $jadwal_type = $this->request->getVar('jadwal_type');
        $periode_id = $this->request->getVar('periode_id');
        if ($jadwal_type==1) {
            $data = ['periode_id'=> $periode_id];
            $response = ['form_jadwal'=>view('Admin/Setting/Periode/FormJadwalUjian', $data)];
        }elseif ($jadwal_type==2) {
            $data = ['periode_id'=> $periode_id];
            $response = ['form_jadwal'=>view('Admin/Setting/Periode/JadwalDaftarUlang', $data)];
        }
        echo json_encode($response);
    }


    // SaveJadwalUjian 
    public function SaveJadwalUjian()
    {
       if ($this->request->isAJAX()) {
        $id = $this->request->getPost('id');  
        $master_periode_id = $this->request->getPost('master_periode_id');
        $master_jalur_id = $this->request->getPost('master_jalur_id');
        $tanggal_ujian = $this->request->getPost('tanggal_ujian');
        $waktu_ujian = $this->request->getPost('waktu_ujian');
        $tempat_ujian = $this->request->getPost('tempat_ujian');
        $data = [];
        // Bentuk data yang akan disimpan atau diperbarui
        for ($i = 0; $i < count($master_jalur_id); $i++) {
            $data[] = [
                'id' => $id[$i],
                'master_periode_id' => $master_periode_id,
                'master_jalur_id' => $master_jalur_id[$i],
                'tanggal_ujian' => $tanggal_ujian[$i],
                'waktu_ujian' => $waktu_ujian[$i],
                'tempat_ujian' => $tempat_ujian[$i],
            ];
        }

        if (array_sum($id)==0) {
           
            $this->JadwalUjianM->insertBatch($data);
            $response = [
                'status'=>true,
                'msg'=> 'Data Jadwal Ujian Disimpan',
            ];
        }else{
            $response = [
                'status'=>true,
                'msg'=> 'Data Jadwal Ujian Diperbarui',
            ];
            $this->JadwalUjianM->updateBatch($data, 'id');

        }
        echo json_encode($response);
       }

    }
    public function SaveJadwalDU()
    {
       if ($this->request->isAJAX()) {
        $id = $this->request->getPost('id');  
        $master_periode_id = $this->request->getPost('master_periode_id');
        $master_jalur_id = $this->request->getPost('master_jalur_id');
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');
        $data = [];
        // Bentuk data yang akan disimpan atau diperbarui
        for ($i = 0; $i < count($master_jalur_id); $i++) {
            $data[] = [
                'id' => $id[$i],
                'master_periode_id' => $master_periode_id,
                'master_jalur_id' => $master_jalur_id[$i],
                'tanggal_mulai' => $tanggal_mulai[$i],
                'tanggal_akhir' => $tanggal_akhir[$i],
            ];
        }

        if (array_sum($id)==0) {
           
            $this->JadwalDuM->insertBatch($data);
            $response = [
                'status'=>true,
                'msg'=> 'Data Jadwal Daftar Ulang Disimpan',
            ];
        }else{
            $response = [
                'status'=>true,
                'msg'=> 'Data Jadwal Daftar Ulang Diperbarui',
            ];
            $this->JadwalDuM->updateBatch($data, 'id');

        }
        echo json_encode($response);
       }

    }
}