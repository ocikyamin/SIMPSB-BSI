<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;
use App\Models\LogPesanModel;

class Dashboard extends BaseController
{
    protected $helpers=['admin'];
    public function index()
    {
        $data = ['title'=> 'Dashboard'];
        return view('Admin/Dashboard', $data);
    }

    public function LogActivity()
    {
        $pesanM = new LogPesanModel();
        $loginM = new LogActivityModel();
        $data = [
            'title'=> 'Log Activity',
            'pesan'=> $pesanM->AllMessage(),
            'login'=> $loginM->AllActivity(),
    ];
        return view('Admin/Logs/index', $data); 
    }

}