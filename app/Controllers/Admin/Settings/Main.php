<?php

namespace App\Controllers\Admin\Settings;

use App\Controllers\BaseController;

class Main extends BaseController
{
    
    protected $helpers=['admin'];
        public function index()
        {
            $data = [
                'title'=> 'Settings'
            ];
            return view('Admin/Setting/index', $data);
        }
    
}