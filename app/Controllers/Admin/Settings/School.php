<?php

namespace App\Controllers\Admin\Settings;

use App\Controllers\BaseController;
use App\Models\Masters\SchoolM;

class School extends BaseController
{
    protected $helpers=['admin'];
    
    function __construct()
    {
        $this->SchoolM = new SchoolM();
    }
    public function index()
    {
        $data = [
            'list'=> $this->SchoolM->findAll(),
        ];
        $response = ['index'=>view('Admin/Setting/School/index', $data)];
        echo json_encode($response);
    }
    public function Add()
    {
        $response = ['add'=>view('Admin/Setting/School/Add')];
        echo json_encode($response);
    }
    public function Store()
    {
        $id = $this->request->getPost('id');
                
        $data = [
            'id'=> $id==null ? null : $id,
            'level_name'=> $this->request->getPost('level_name'),
            'description'=> $this->request->getPost('description'),
        ];
        $this->SchoolM->save($data);
        $response = [
            'status'=> true
        ];
        echo json_encode($response);
    }

    public function Edit()
    {
        $id = $this->request->getPost('id');
        $data = ['school'=> $this->SchoolM->find($id)];
        $response = ['edit'=>view('Admin/Setting/School/Edit', $data)];
        echo json_encode($response);
    }
    public function Delete()
    {
        $id = $this->request->getPost('id');
        $this->SchoolM->delete($id);
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
        
        $this->SchoolM->save($data);
        $response = [
            'status'=>true,
            'msg'=>$status==1 ? 'School di Kunci !':'School dibuka !' ,
        ];
        echo json_encode($response);
    }
}