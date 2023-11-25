<?php

namespace App\Controllers\Admin\Masters;

use App\Controllers\BaseController;
use App\Models\Masters\PekerjaanM;

class Pekerjaan extends BaseController
{
    function __construct()
    {
       $this->PekerjaanM = new PekerjaanM();
    }
    public function index()
    {
        $data = [
            'list'=> $this->PekerjaanM->findAll(),
        ];
        $response = ['index'=>view('Admin/Masters/Pekerjaan/index', $data)];
        echo json_encode($response);
    }

    public function Store()
    {
        $id = $this->request->getPost('id');
                
        $data = [
            'id'=> $id==null ? null : $id,
            'pekerjaan'=> $this->request->getPost('pekerjaan'),
        ];
        $this->PekerjaanM->save($data);
        $response = [
            'status'=> true
        ];
        echo json_encode($response);
    }

    public function Delete()
    {
        $id = $this->request->getPost('id');
        $this->PekerjaanM->delete($id);
        $response = ['status'=>true];
        echo json_encode($response);
    }
}