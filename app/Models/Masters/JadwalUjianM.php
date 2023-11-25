<?php

namespace App\Models\Masters;

use CodeIgniter\Model;

class JadwalUjianM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'master_jadwal_ujian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];
    
    public function ByPeriode($periode)
    {
        return $this->db->table('master_jadwal_ujian')
        ->select('
        master_jalur.id as master_jalur_id,
        master_jalur.jalur_name,
        master_jadwal_ujian.tanggal_ujian,
        master_jadwal_ujian.waktu_ujian,
        master_jadwal_ujian.tempat_ujian,
        ')
        ->join('master_jalur','master_jadwal_ujian.master_jalur_id=master_jalur.id')
        ->where('master_jadwal_ujian.master_periode_id', $periode)
        ->get()
        ->getResultArray();
    }

}