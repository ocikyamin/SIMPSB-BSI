<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        $data = ['title'=> 'MTIC - Brosur'];
        return view('Landing/Pages/Brosur', $data);
    }
    public function Brosur()
    {
        $data = ['title'=> 'MTIC - Brosur'];
        return view('Landing/Pages/Brosur', $data);
    }
    public function Persyaratan()
    {
        $data = ['title'=> 'MTIC - Persyaratan'];
        return view('Landing/Pages/Persyaratan', $data);
    }
    public function CaraDaftar()
    {
        $data = ['title'=> 'MTIC - Pengumuman'];
        return view('Landing/Pages/CaraDaftar', $data);
    }
    public function Kelulusan()
    {
        $data = ['title'=> 'MTIC - Pengumuman'];
        return view('Landing/Pages/Kelulusan', $data);
    }


    public function CaraBayar()
    {
        $data = ['title'=> 'MTIC - Petunjuk Pembayaran'];
        return view('Landing/Pages/CaraBayar', $data);
    }
}