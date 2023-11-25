<?php

namespace App\Models;

use CodeIgniter\Model;

class LogPesanModel extends Model
{
    protected $table            = '_log_pesan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];


    public function AllMessage()
    {
        return $this->db->table('_log_pesan')
        ->select('
        users.fullname,
        csb_akun.nama_lengkap,
        _log_pesan.created_at,
        _log_pesan.pesan
        ')
        ->join('users','_log_pesan.users_id=users.id')
        ->join('csb_akun','_log_pesan.csb_akun_id=csb_akun.id')
        ->orderBy('_log_pesan.created_at', 'desc')
        ->get()
        ->getResultArray();
    }
}