<?php

namespace App\Controllers\Students;

use App\Controllers\BaseController;
use App\Models\StudentAccount;

class Home extends BaseController
{

    protected $helpers= ['csb'];
    public function index()
    {
        $akunM = new StudentAccount();
        $data = [
            'Title'=> 'Student | Home',
            'status'=> $akunM->StatusCSB(CSB()->id)
        ];
        return view('Student/Home', $data);
    }

    public function ChangeJalur()
    {
        
        if ($this->request->isAJAX()) {
            $akunM = new StudentAccount();
            $data = [
                'id'=> $this->request->getPost('csb_akun_id'),
                'master_jalur_id'=> $this->request->getPost('jalur_id'),
                'status_lulus'=> null
            ];
            $akunM->save($data);
            $response = [
                'status'=> true,
                'msg'=> 'Jalur Pendaftaran berhasil diperbarui. Silahkan mencetak kartu tanda peserta Ujian.',
                'status_jadwal'=> base_url('student/status')
            ];

            echo json_encode($response);
        }
      
    }




function Logout()
{
session()->remove('STUDENT');
return redirect()->to(base_url('/login'));

}
}