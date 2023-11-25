<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Libraries\Hash;
use App\Models\UsersModel;
use App\Models\LogActivityModel;


class Auth extends BaseController
{
    public function index()
    {
        return view('Admin/Auth/index');
    }
    public function LoginProses()
    {
        if ($this->request->isAJAX()) {
             // Pangil Service Validation 
             $this->validate= \Config\Services::validation();
             // Deklarasi Validasi Login 
             $validate = $this->validate(
                 [
             'xemail' => [
                 'label'  => 'Email',
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
                'xemail' => $this->validate->getError('xemail'),
                'xpass' => $this->validate->getError('xpass')
                ];
     }else{   
            $email = $this->request->getPost('xemail');
            $pass = $this->request->getPost('xpass');
            $model = new UsersModel;
            $user_data = $model->GetAccount($email);
            if ($user_data) {
                // Cek Password
                $is_valid_password = Hash::check($pass, $user_data->password);
                if ($is_valid_password) {
                    // Cek Status 
                    if ($user_data->is_active==1) {
                        $new_session = ['XX-ADMIN' => $user_data->id];
                        session()->set($new_session);
                        // Catat Waktu Login 
                        $logM = new LogActivityModel();
                        $login_data = [
                            'user_id'=> $user_data->id,
                            'activity'=> 'login' 
                        ];
                        $logM->save($login_data);

                        $response['status'] = 'sukses';
                        $response['page'] = base_url('admin/dashboard');
                        $response['message'] = 'Login Behasil';
                    }else{
                    $response = [
                        'status'=> 'error',
                        'xemail' => '404',
                        ];
                    }
                }else{
                    $response = [
                        'status'=> 'error',
                        'xpass' => '404',
                        ];

                }
            }else{
               
                $response = [
                    'status'=> 'error',
                    'xemail' => '404',
                    ];
                
            }
            
        }
        echo json_encode($response);
    }
}

function Logout()
{
session()->remove('XX-ADMIN');
return redirect()->to(base_url('/app-login'));

}


}