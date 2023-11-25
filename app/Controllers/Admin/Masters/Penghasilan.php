<?php

namespace App\Controllers\Admin\Masters;

use App\Controllers\BaseController;
use App\Models\Masters\PenghasilanM;

class Penghasilan extends BaseController
{
    function __construct()
    {
       $this->PenghasilanM = new PenghasilanM();
    }
    public function index()
    {
        $data = [
            'list'=> $this->PenghasilanM->findAll(),
        ];
        $response = ['index'=>view('Admin/Masters/Penghasilan/index', $data)];
        echo json_encode($response);
    }

    public function Store()
    {
        $id = $this->request->getPost('id');
                
        $data = [
            'id'=> $id==null ? null : $id,
            'penghasilan'=> $this->request->getPost('penghasilan'),
        ];
        $this->PenghasilanM->save($data);
        $response = [
            'status'=> true
        ];
        echo json_encode($response);
    }

    public function Delete()
    {
        $id = $this->request->getPost('id');
        $this->PenghasilanM->delete($id);
        $response = ['status'=>true];
        echo json_encode($response);
    }
}