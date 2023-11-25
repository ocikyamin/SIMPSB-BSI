<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function GetAccount($email)
    {
       return $this->db->table('users')
       ->select('id,password,is_active')
       ->where('email', $email)->orWhere('whatsapp', $email)
       ->get()->getRow();
    }

    public function AllUser()
    {
       return $this->db->table('users')
       ->select('users.id,users.email,users.whatsapp,users.fullname,users_level.level_name,users.is_active')
       ->join('users_level','users.user_level_id=users_level.id')
       ->get()->getResultArray();
    }

    public function RoleLogin($id)
    {
       return $this->db->table('users')
       ->select('user_level_id,is_active')
       ->where('id', $id)
       ->get()->getRow();
    }



   
}