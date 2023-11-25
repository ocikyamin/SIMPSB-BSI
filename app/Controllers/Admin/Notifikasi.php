<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentAccount;
use App\Models\DataSiswaModel;
use App\Models\TagihanModel;

class Notifikasi extends BaseController
{
    function __construct()
    {
        $this->StudentM = new StudentAccount;
        $this->DasisM = new DataSiswaModel();
        $this->TagihanM = new TagihanModel;
    }
    protected $helpers=['admin'];
    public function index($slug)
    {
        // echo $slug;
      
    }
    public function PembayaranBaru()
    {
        $data = [
            'title'=> 'Notifikasi',
            'tagihan_bayar'=> $this->TagihanM->TagihanBy()
        ];
            return view('Admin/Notifikasi/pembayaran', $data);
    }
}