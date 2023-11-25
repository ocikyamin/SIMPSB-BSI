<?php

namespace App\Models\Masters;

use CodeIgniter\Model;

class SchoolM extends Model
{
    protected $table            = 'master_school_level';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

}