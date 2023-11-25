<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiRaporModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'csb_nilai_rapor';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];


    // public function insertNilai($data)
    // {
    //     $this->insert($data);
    // }

    // public function updateNilaiBatch($data)
    // {
    //     $this->updateBatch($data, 'mapel_jenis_id');
    // }

}