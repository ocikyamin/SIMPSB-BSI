<?php

namespace App\Controllers\Students;
use Picqer\Barcode\BarcodeGeneratorPNG;

use App\Controllers\BaseController;
use App\Models\MapelJenisModel;
use App\Models\NilaiRaporModel;
use App\Models\TagihanModel;
use App\Models\StudentAccount;
use App\Models\Masters\JalurM;
use App\Models\ReportModel;

class First extends BaseController
{
    protected $helpers= ['csb','nilai'];
    function __construct()
    {
        $this->Mapel = new MapelJenisModel();
        $this->JalurM = new JalurM();
        $this->ReportM = new ReportModel();
    }
    public function index()
    {
       
    }


    public function StatusAwal()
    {
        $tagihan = new TagihanModel();
        $akunM = new StudentAccount();
        $level_id = CSB()->master_school_level_id;
        // dd();
        
        $data = [
            'Title'=> 'Student | Progress',
            'status_nilai'=> CekNilai(CSB()->id, $level_id),
            'status_foto'=> CSB()->foto,
            'tagihan'=> $tagihan->TagihanAwal(CSB()->id),
            // 'tagihan_du'=> $tagihan->TagihanAwal(CSB()->id),
            'list_kelas'=> $this->Mapel->KelasMapel($level_id),
            'csb'=> $akunM->AccountDetail(CSB()->id),
            'jadwal'=>$this->ReportM->getJadwal(CSB()->master_periode_id, CSB()->master_jalur_id),
            'barcode'=> $this->_createBarcode(CSB()->nisn)
        ];
                return view('Student/First/StatusAwal', $data);
    }


   

    public function FormNilaiMapel()
    {
       if ($this->request->isAJAX()) {
        $kelas_id = $this->request->getVar('kelas_id'); 
        $csb_akun_id = $this->request->getVar('csb_akun_id'); 
        $sttb = $this->request->getVar('sttb_id');
        $data = [
            'kelas'=> $this->Mapel->Kelas($kelas_id),
            'list_mapel'=> $this->Mapel->MapelJenis($sttb),
            'csb_akun_id'=> $csb_akun_id
        ];
        $response = ['mapel'=> view('Student/Nilai/FormMapel', $data)];
        echo json_encode($response);
       }
    }

    public function SaveNilaiRapor()
    {
        if ($this->request->isAJAX()) {
            $nilaiModel = new NilaiRaporModel();
            // Ambil data dari formulir
            $csb_akun_id = $this->request->getPost('csb_akun_id');
            $mapel_jenis_id = $this->request->getPost('mapel_jenis_id');
            $m_kelas_id = $this->request->getPost('m_kelas_id');
            $nilai_sem1 = $this->request->getPost('nilai_sem1');
            $nilai_sem2 = $this->request->getPost('nilai_sem2');

            // Buat data yang akan disimpan
            $data = [];
            for ($i = 0; $i < count($mapel_jenis_id); $i++) {
            $data[] = [
            'csb_akun_id' => $csb_akun_id,
            'mapel_jenis_id' => $mapel_jenis_id[$i],
            'm_kelas_id' => $m_kelas_id,
            'nilai_sem1' => $nilai_sem1[$i],
            'nilai_sem2' => $nilai_sem2[$i],
            ];
            }

            // Periksa apakah data harus disisipkan atau diperbarui
            $existingData = $nilaiModel
            ->where('csb_akun_id', $csb_akun_id)
            ->where('m_kelas_id', $m_kelas_id)
            ->findAll();
            if (empty($existingData)) {
            // Data belum ada, lakukan sisipan
           if ( $nilaiModel->insertBatch($data)) {
            $response['kelas_id']= $m_kelas_id;
            $response['status']= "success";
            $response['message']= "Nilai Disimpan";
        }

            } else {
            // Data sudah ada, lakukan pembaruan
            foreach ($data as $item) {
                $nilaiModel->where('csb_akun_id', $item['csb_akun_id'])
            ->where('mapel_jenis_id', $item['mapel_jenis_id'])
            ->where('m_kelas_id', $item['m_kelas_id'])
            ->set($item)
            ->update();
            }
            $response['kelas_id']= $m_kelas_id;
            $response['status']= "success";
            $response['message']= "Nilai Diperbarui";
            }

            echo json_encode($response);
        }        
    }

    // public function StatusNilaiMapel()
    // {
    //     // $this->helper('nilai');
    //     if ($this->request->isAJAX()) {
    //         $csb_akun_id = $this->request->getVar('csb_akun_id'); 
    //         $level_id = CSB()->master_school_level_id;
    //         $data = [
    //             'csb_akun_id'=> $csb_akun_id,
    //             'jalur_id'=> CSB()->master_jalur_id,
    //             'status_nilai'=> CekNilai(CSB()->id),
    //             'list_kelas'=> $this->Mapel->KelasMapel($level_id)
    //         ];
            
    //         $response = ['nilai_mapel'=> view('Student/Nilai/StatusNilaiMapel', $data)];
    //         echo json_encode($response);
    //        }
    // }


    // public function PrintKatuUjian($id)
    // {
    //     $tagihan = new TagihanModel();
    //     $akunM = new StudentAccount();
    //     $csb_id = base64_decode($id);
    //     $cek_csb = $akunM->KartuUjian($csb_id);
    //     if ($cek_csb) {
    //         $data = [
    //         'tagihan'=> $tagihan->TagihanAwal($csb_id),
    //         'csb'=> $cek_csb,
    //         'jadwal'=>$akunM->getJadwal(CSB()->master_periode_id, CSB()->master_jalur_id),
    //         'barcode'=> $this->_createBarcode($cek_csb->nisn)
    //         ];
    //         return view('Student/Print/kartu_ujian', $data);
    //         }
        
        
    // }
    public function getJadwal($periode, $jalur)
    {
        return $this->db->table('master_jadwal_ujian')
        ->select('
        tanggal_ujian,
        waktu_ujian,
        tempat_ujian,
        keterangan
        ')
        ->where('master_periode_id', $periode)
        ->where('master_jalur_id', $jalur)
        ->get()
        ->getRow();
        
    }

    private function _createBarcode($isi)
    {
$generator = new BarcodeGeneratorPNG();
return '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($isi, $generator::TYPE_CODE_128, 3, 50)) . '">';
    }


}