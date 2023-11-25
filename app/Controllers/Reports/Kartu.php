<?php

namespace App\Controllers\Reports;
use Picqer\Barcode\BarcodeGeneratorPNG;

use App\Controllers\BaseController;
use App\Models\ReportModel;

class Kartu extends BaseController
{
    function __construct()
    {
        $this->KartuM = new ReportModel();
        $this->Generator = new BarcodeGeneratorPNG();
    }
 
    public function Ujian($ids)
    {
        $id = base64_decode($ids);
        
        $cek_csb = $this->KartuM->KartuUjian($id);
        if ($cek_csb) {
            $data = [
            'csb'=> $cek_csb,
            'jadwal'=>$this->KartuM->getJadwal($cek_csb->master_periode_id, $cek_csb->master_jalur_id),
            'barcode'=> $this->_createBarcode($cek_csb->nisn)
            ];
            return view('Report/Kartu/kartu_ujian', $data);
        }else{
            echo "Kartu Ujian Belum Tersedia";
        }
    }

    
    // Daftar Ulang 
    public function DU($ids)
    {
        $id = base64_decode($ids);
        
        $cek_csb = $this->KartuM->KartuUjian($id);
        if ($cek_csb) {
            $data = [
            'csb'=> $cek_csb,
            'barcode'=> $this->_createBarcode($cek_csb->nisn)
            ];
            return view('Report/Kartu/kartu_daftar_ulang', $data);
        }else{
            echo "Kartu Ujian Belum Tersedia";
        }
    }


    private function _createBarcode($isi)
    {
// $generator = new BarcodeGeneratorPNG();
return '<img src="data:image/png;base64,' . base64_encode($this->Generator->getBarcode($isi, $this->Generator::TYPE_CODE_128, 3, 50)) . '">';
    }
}