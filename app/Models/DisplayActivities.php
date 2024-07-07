<?php

namespace App\Models;

use CodeIgniter\Model;

class DisplayActivities extends Model
{
    protected $table            = 'physical_activity';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    

    public function getData()
    {
        return $this->db->table($this->table)->get()->getResult();
    }
}
