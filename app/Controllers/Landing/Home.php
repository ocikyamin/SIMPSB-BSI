<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $helpers= ['master'];
    public function index()
    {
        $data = ['title'=> 'MTIC - PSB Portal'];
        return view('Landing/Pages/Home', $data);
    }



}