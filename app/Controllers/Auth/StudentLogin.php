<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\StudentAccount;
class StudentLogin extends BaseController
{
    public function index()
    {
        $data = ['title'=> 'Login | New Student'];
        return view('Login/index', $data);
    }

    // New Login 
    public function NewLogin()
    {
        // $data = ['title'=> 'Login | New Student'];

      
        $response = ['login'=>view('Login/NewLogin')];
        echo json_encode($response);
    }

    public function LoginProses()
    {
        if ($this->request->isAJAX()) {
             // Pangil Service Validation 
             $this->validate= \Config\Services::validation();
             // Deklarasi Validasi Login 
             $validate = $this->validate(
                 [
             'xnisn' => [
                 'label'  => 'NISN / Nomor Registrasi',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Tidak Boleh Kosong'
                     ]
             ],
             'xpass' => [
                 'label'  => 'Password',
                 'rules'  => 'required',
                 'errors' => [
                     'required' => '{field} Tidak Boleh Kosong'
                     ]
                 ],
                 ]
             );
             // Jika Tidak Tervalidasi, Kembalikan Pesan Error 
             if (!$validate) {
                $response = [
                'status'=> 'error',
                'xnisn' => $this->validate->getError('xnisn'),
                'xpass' => $this->validate->getError('xpass')
                ];
     }else{   
            $nisn = $this->request->getPost('xnisn');
            $pass = $this->request->getPost('xpass');
            $model = new StudentAccount;
            $user_data = $model->GetAccount($nisn);
            if ($user_data) {
                // Cek Password
                $is_valid_password = Hash::check($pass, $user_data->password);
                if ($is_valid_password) {
                    // Cek Status 
                    if ($user_data->is_active==1) {
                        $new_session = ['STUDENT' => $user_data->id];
                        session()->set($new_session);
                        $response['status'] = 'sukses';
                        $response['page'] = base_url('student');
                        $response['message'] = 'Login Behasil';
                    }else{
                    $response = [
                        'status'=> 'error',
                        'xnisn' => 'Akun Tidak aktif. Hubungi Admin.',
                        ];
                    }
                }else{
                    $response = [
                        'status'=> 'error',
                        'xpass' => 'Pastikan Password sudah benar.',
                        ];

                }
            }else{
               
                $response = [
                    'status'=> 'error',
                    'xnisn' => 'NISN / Nomor Registrasi Tidak ditemukan. Pastikan telah melakukan Pendaftaran.',
                    ];
                
            }
            
        }
        echo json_encode($response);
    }
    }
}