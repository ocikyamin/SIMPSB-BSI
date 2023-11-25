<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;

class Wilayah extends BaseController
{
    protected $helpers=['curl'];
    public function index()
    {
        $provinsi = 'https://api.mticanduang.sch.id/provinsi';
        $data= GetWilayah($provinsi);
        $provinsiData = $data['provinsi'];
        $option = "";
        foreach ($provinsiData as $row) {
           $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
        $msg = ['prov'=>  $option];
        echo json_encode($msg);
    }


    public function Kabupaten()
    {
        if ($this->request->isAjax()) {
            $id = $this->request->getVar('prov_id');
            $kabupaten = 'https://api.mticanduang.sch.id/kabupaten/prov/'.$id;
        $data= GetWilayah($kabupaten);
        $kabupatenData = $data['kabupaten'];
        $option = "";
        foreach ($kabupatenData as $row) {
           $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
        $msg = ['kab'=>  $option];
        echo json_encode($msg);
        }
        
        
    }


    public function Kecamatan()
    {
        if ($this->request->isAjax()) {
            $id = $this->request->getVar('kab_id');
            $kecamatan = 'https://api.mticanduang.sch.id/kecamatan/kab/'.$id;
        $data= GetWilayah($kecamatan);
        $kecamatanData = $data['kecamatan'];
        $option = "";
        foreach ($kecamatanData as $row) {
           $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
        $msg = ['kec'=>  $option];
        echo json_encode($msg);
        }
    }
    
    public function Desa()
    {
        if ($this->request->isAjax()) {
            $id = $this->request->getVar('kec_id');
            $desa = 'https://api.mticanduang.sch.id/desa/kec/'.$id;
        $data= GetWilayah($desa);
        $desaData = $data['desa'];
        $option = "";
        foreach ($desaData as $row) {
           $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
        $msg = ['desa'=>  $option];
        echo json_encode($msg);
        } 
    }
}