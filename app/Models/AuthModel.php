<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    public function checkUsername($username)
    {
        return $this->db->table($this->table)
                ->where('username', $username)
                ->countAllResults() === 0;
    }

    public function checkEmail($email)
    {
        return $this->db->table($this->table)
                ->where('email', $email)
                ->countAllResults() === 0;
    }

    public function register($data)
    {
        $query = $this->db->table($this->table)
                ->insert($data);

        return $query;
    }

    public function getDataUser($username)
    {
        $query = $this->db->table($this->table)
                ->where('username', $username)
                ->get();

        return $query->getRow();
    }
}
