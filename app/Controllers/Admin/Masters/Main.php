<?php

namespace App\Controllers\Admin\Masters;

use App\Controllers\BaseController;

class Main extends BaseController
{
    protected $helpers=['admin'];
    public function index()
    {
        $data = [
            'title'=> 'Masters'
        ];
        return view('Admin/Masters/index', $data);
    }
}