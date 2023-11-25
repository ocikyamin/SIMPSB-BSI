<?php

namespace App\Controllers\Admin;
use App\Libraries\Hash;
use App\Models\UsersModel;

use App\Controllers\BaseController;

class Users extends BaseController
{
    protected $helpers=['admin','master'];
    function __construct()
    {
        $this->UserM = new UsersModel();
    }
    public function index()
    {
        $data = [
            'title'=> 'Users',
            'user_list'=> $this->UserM->AllUser()
        ];
        return view('Admin/User/index', $data);
        //
    }
    public function Add()
    {
        if ($this->request->isAJAX()) {

            $response = ['form_user'=> view('Admin/User/add')];
           echo json_encode($response);
        }
    }
    public function Store()
    {
        if ($this->request->isAJAX()) {

            $this->validate= \Config\Services::validation();
            // Deklarasi Validasi Login 
            $validate = $this->validate(
                [
            'fullname' => [
                'label'  => 'Nama Lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                    ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                    'is_unique' => '{field} Telah Terdaftar',
                    ]
                ],
            'whatsapp' => [
                'label'  => 'WhatsApp',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                    ]
                ],
            'new_pass' => [
                'label'  => 'Password Baru',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                    ]
                ],
            'conf_pass' => [
                'label'  => 'Konfirmasi Password',
                'rules'  => 'required|matches[new_pass]',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                    'matches' => '{field} Tidak Cocok',
                    ]
                ],
            'user_level_id' => [
                'label'  => 'Role Akses',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                    ]
                ],
                ]
            );
            // Jika Tidak Tervalidasi, Kembalikan Pesan Error 
            if (!$validate) {
               $response = [
               'status'=> false,
               'fullname' => $this->validate->getError('fullname'),
               'email' => $this->validate->getError('email'),
               'whatsapp' => $this->validate->getError('whatsapp'),
               'new_pass' => $this->validate->getError('new_pass'),
               'conf_pass' => $this->validate->getError('conf_pass'),
               'user_level_id' => $this->validate->getError('user_level_id')
               ];
    }else{
        $data = [
            'email'=> $this->request->getPost('email'),
            'whatsapp'=> $this->request->getPost('whatsapp'),
            'password'=> Hash::make($this->request->getPost('conf_pass')),
            'fullname'=> $this->request->getPost('fullname'),
            'user_level_id'=> $this->request->getPost('user_level_id')
        ];
        $this->UserM->save($data);
        $response= ['status'=> true,
        'msg'=> 'User ditambhakan'
    ];

    }

           echo json_encode($response);
        }
    }

    public function Delete()
    {
        if ($this->request->isAJAX()) {
            
            $id = $this->request->getPost('id');
            $this->UserM->delete($id);
            $response = [
                'status'=> true,
                'msg'=> 'User Dihapus.'
            ];
           echo json_encode($response);
        }
    }
    public function SetStatus()
    {
        if ($this->request->isAJAX()) {
            
            $id = $this->request->getPost('id');
            $status = $this->request->getPost('status');
            $data = [
                'id'=> $id,
                'is_active'=> $status==1 ? 0:1,
            ];
            $this->UserM->save($data);
            $response = [
                'status'=> true
            ];
           echo json_encode($response);
        }
    }

    public function Edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $data = ['user'=>$this->UserM->find($id)];
            $response = ['form_user'=> view('Admin/User/edit', $data)];
           echo json_encode($response);
        }
    }

    public function Update()
    {
        if ($this->request->isAJAX()) {
            $email = $this->request->getPost('email');
            $old_email = $this->request->getPost('old_email');

            $this->validate= \Config\Services::validation();
            // Deklarasi Validasi Login 
            $validate = $this->validate(
                [
            'fullname' => [
                'label'  => 'Nama Lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                    ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => $email==$old_email ? 'required' : 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                    'is_unique' => '{field} Telah Digunakan',
                    ]
                ],
            'whatsapp' => [
                'label'  => 'WhatsApp',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                    ]
                ],
            'user_level_id' => [
                'label'  => 'Role Akses',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                    ]
                ],
                ]
            );
            // Jika Tidak Tervalidasi, Kembalikan Pesan Error 
            if (!$validate) {
               $response = [
               'status'=> false,
               'fullname' => $this->validate->getError('fullname'),
               'email' => $this->validate->getError('email'),
               'whatsapp' => $this->validate->getError('whatsapp'),
               'user_level_id' => $this->validate->getError('user_level_id')
               ];
    }else{
        $data = [
            'id'=> $this->request->getPost('id'),
            'email'=> $this->request->getPost('email'),
            'whatsapp'=> $this->request->getPost('whatsapp'),
            'fullname'=> $this->request->getPost('fullname'),
            'user_level_id'=> $this->request->getPost('user_level_id')
        ];
        $this->UserM->save($data);
        $response= ['status'=> true,
        'msg'=> 'User Diperbarui'
    ];

    }

           echo json_encode($response);
        }
    }
}