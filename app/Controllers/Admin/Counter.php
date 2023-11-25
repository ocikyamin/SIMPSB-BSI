<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentAccount;
class Counter extends BaseController
{
    protected $helpers=['admin','master','count','curl'];
    function __construct()
    {
        $this->StudentM = new StudentAccount;
    }
    public function index()
    {
        //
    }

    public function ByLevel()
    {
        $periode = $this->request->getVar('periode');
        $data = ['periode'=> $periode];
        $response = ['jml_level'=> view('Admin/Counter/jumlah_by_level',$data)];
        echo json_encode($response);
    }

    // Pendaftar Pertanggal 
    public function RegToday()
    {
        $tanggal = $this->request->getVar('tanggal');
        $data = [
            'tanggal'=> $tanggal,
            'list'=> $this->StudentM->RegByDate($tanggal)
        ];
        $response = ['reg_today'=> view('Admin/Counter/pendaftar_by_tanggal',$data)];
        echo json_encode($response);
    }
    // Pendaftar Perkabupaten 
    public function RegByKabupaten()
    {

        if ($this->request->isAjax()) {
            $data = [];
            foreach ($this->StudentM->RegByKab() as $d) {
                $kabupaten = 'https://api.mticanduang.sch.id/kabupaten/' . $d['kabupaten_id'];
                $get_kab = GetWilayah($kabupaten);
                $list = $get_kab['kabupaten'];
                $data[] = [
                    'id' => $list['id'],
                    'name' => $list['name'],
                    'jml' => countRegistrationsByKabupaten($list['id']),
                ];
            }
            $datas = ['kab_list' => $data];
            $view = view('Admin/Counter/pendaftar_by_kabupaten', $datas);
            return $this->response->setJSON(['reg_kab' => $view]);
        }      
   
    }



}