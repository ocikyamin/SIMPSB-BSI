<?php

namespace App\Models\Masters;

use CodeIgniter\Model;

class ReferensiM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'm_referensi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];
}