<?php

namespace App\Controllers\Payment;

use App\Controllers\BaseController;
use App\Models\TagihanModel;

class Payment extends BaseController
{
    protected $helpers= ['admin'];
    function __construct()
    {
       $this->TagihanM = new TagihanModel();
    }
    public function index()
    {
        $data = [
            'title'=> 'Payment',
            'list'=> $this->TagihanM->PaymentList()

        ];
        return view('Admin/Payment/index',$data);
    }
}