<?php

namespace App\Models;

use CodeIgniter\Model;

class LogActivityModel extends Model
{
    protected $table            = '_log_activity';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function AllActivity()
    {
        return $this->db->table('_log_activity')
        ->select('users.fullname,
        _log_activity.created_at,
        _log_activity.activity
        ')
        ->join('users','_log_activity.user_id=users.id')
        ->orderBy('_log_activity.created_at', 'desc')
        ->get()
        ->getResultArray();
    }



}