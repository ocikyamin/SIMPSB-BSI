<?php

namespace App\Controllers\Admin\Masters;

use App\Controllers\BaseController;
use App\Models\Masters\PendidikanM;

class Pendidikan extends BaseController
{
    function __construct()
    {
       $this->PendidikanM = new PendidikanM();
    }
    public function index()
    {
        $data = [
            'list'=> $this->PendidikanM->findAll(),
        ];
        $response = ['index'=>view('Admin/Masters/Pendidikan/index', $data)];
        echo json_encode($response);
    }

    public function Store()
    {
        $id = $this->request->getPost('id');
                
        $data = [
            'id'=> $id==null ? null : $id,
            'pendidikan'=> $this->request->getPost('pendidikan'),
        ];
        $this->PendidikanM->save($data);
        $response = [
            'status'=> true
        ];
        echo json_encode($response);
    }

    public function Delete()
    {
        $id = $this->request->getPost('id');
        $this->PendidikanM->delete($id);
        $response = ['status'=>true];
        echo json_encode($response);
    }
}