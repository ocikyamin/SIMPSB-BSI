<?php

namespace App\Models;

use CodeIgniter\Model;

class BuktiBayarModel extends Model
{
  
    protected $table            = 'csb_tagihan_bukti_bayar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];
}