<?php

namespace App\Models\Masters;

use CodeIgniter\Model;

class JadwalDuM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'master_jadwal_daftar_ulang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

}