<?php

namespace App\Models\Masters;

use CodeIgniter\Model;

class PeriodeM extends Model
{
    protected $table            = 'master_periode';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

}