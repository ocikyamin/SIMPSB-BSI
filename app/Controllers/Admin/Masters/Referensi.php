<?php

namespace App\Controllers\Admin\Masters;

use App\Controllers\BaseController;
use App\Models\Masters\ReferensiM;

class Referensi extends BaseController
{
    function __construct()
    {
       $this->ReferensiM = new ReferensiM();
    }
    public function index()
    {
        $data = [
            'list'=> $this->ReferensiM->findAll(),
        ];
        $response = ['index'=>view('Admin/Masters/Referensi/index', $data)];
        echo json_encode($response);
    }

    public function Store()
    {
        $id = $this->request->getPost('id');
                
        $data = [
            'id'=> $id==null ? null : $id,
            'nama_referensi'=> $this->request->getPost('referensi'),
        ];
        $this->ReferensiM->save($data);
        $response = [
            'status'=> true
        ];
        echo json_encode($response);
    }

    public function Delete()
    {
        $id = $this->request->getPost('id');
        $this->ReferensiM->delete($id);
        $response = ['status'=>true];
        echo json_encode($response);
    }
}