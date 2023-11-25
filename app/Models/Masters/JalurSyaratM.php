<?php

namespace App\Models\Masters;

use CodeIgniter\Model;

class JalurSyaratM extends Model
{
    protected $table            = 'master_jalur_syarat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

}