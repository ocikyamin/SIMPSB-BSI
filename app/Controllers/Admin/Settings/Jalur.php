<?php

namespace App\Controllers\Admin\Settings;

use App\Controllers\BaseController;
use App\Models\Masters\JalurM;
use App\Models\Masters\JalurSyaratM;

class Jalur extends BaseController
{
    protected $helpers=['admin'];
    
    function __construct()
    {
        $this->JalurM = new JalurM();
        $this->SyaratM = new JalurSyaratM();
    }
    public function index()
    {
        $data = [
            'list'=> $this->JalurM->findAll(),
        ];
        $response = ['index'=>view('Admin/Setting/Jalur/index', $data)];
        echo json_encode($response);
    }
    public function Add()
    {
        $response = ['add'=>view('Admin/Setting/Jalur/Add')];
        echo json_encode($response);
    }
    public function Store()
    {
        $id = $this->request->getPost('id');
                
        $data = [
            'id'=> $id==null ? null : $id,
            'jalur_name'=> $this->request->getPost('jalur_name'),
            'nilai_minimal'=> $this->request->getPost('nilai_minimal'),
            'deskripsi'=> $this->request->getPost('deskripsi'),
        ];
        $this->JalurM->save($data);
        $response = [
            'status'=> true
        ];
        echo json_encode($response);
    }

    public function Edit()
    {
        $id = $this->request->getPost('id');
        $data = ['jalur'=> $this->JalurM->find($id)];
        $response = ['edit'=>view('Admin/Setting/Jalur/Edit', $data)];
        echo json_encode($response);
    }
    public function Delete()
    {
        $id = $this->request->getPost('id');
        $this->JalurM->delete($id);
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
        
        $this->JalurM->save($data);
        $response = [
            'status'=>true,
            'msg'=>$status==1 ? 'Jalur di Kunci !':'Jalur dibuka !' ,
        ];
        echo json_encode($response);
    }

    public function Syarat()
    {
        $id = $this->request->getPost('id');
        $data = [
            'jalur'=> $this->JalurM->find($id),
            'syarat'=> $this->SyaratM->where('master_jalur_id',$id)->findAll(),
        ];
        $response = ['syarat'=>view('Admin/Setting/Jalur/Syarat', $data)];
        echo json_encode($response);
    }
    public function SyaratStore()
    {
        $id = $this->request->getPost('id');
                
        $data = [
            'id'=> $id==null ? null : $id,
            'master_jalur_id'=> $this->request->getPost('master_jalur_id'),
            'syarat'=> $this->request->getPost('syarat'),
        ];
        $this->SyaratM->save($data);
        $response = [
            'status'=> true
        ];
        echo json_encode($response);
    }

    public function SyaratDelete()
    {
        $id = $this->request->getPost('id');
        $this->SyaratM->delete($id);
        $response = ['status'=>true];
        echo json_encode($response);
    }
}