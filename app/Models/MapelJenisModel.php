<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelJenisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'master_mapel_jenis';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Daftar Mapel by Jenis Sekolah
    public function MapelJenis($sttb)
    {
        return $this->db->table('master_mapel_jenis')
        ->join('m_mapel','master_mapel_jenis.m_mapel_id=m_mapel.id')
        ->where('master_mapel_jenis.master_jenis_sekolah_asal_id', $sttb)
        ->get()
        ->getResultArray();
        
    }
    
    public function KelasMapel($level_id)
    {
        return $this->db->table('m_kelas')
        ->where('master_school_level_id', $level_id)
        ->get()
        ->getResultArray();
    }
    public function Kelas($kelas_id)
    {
        return $this->db->table('m_kelas')
        ->where('id', $kelas_id)
        ->get()
        ->getRow();
    }



}