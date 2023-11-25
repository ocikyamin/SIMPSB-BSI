<?php

namespace App\Models\Masters;

use CodeIgniter\Model;

class JalurM extends Model
{
    protected $table            = 'master_jalur';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

}