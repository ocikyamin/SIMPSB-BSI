<?php

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'csb_presensi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];


    public function GetDaftarHadir($periode=null)
    {
        return $this->db->table('csb_presensi')->select('
        csb_akun.id,
        csb_akun.nama_lengkap,
        csb_presensi.created_at,
        csb_presensi.type_scan
        ')
        ->join('csb_akun', 'csb_presensi.csb_akun_id=csb_akun.id')
        ->where('csb_akun.master_periode_id', $periode)
        // ->groupBy('csb_presensi.csb_akun_id')
        ->get()
        ->getResultArray();
    }

}