<?php

namespace App\Models;

use CodeIgniter\Model;

class DailyConsumption extends Model
{
    protected $table            = 'consumption';
    protected $primaryKey       = 'id';

    public function getList($type)
    {
        return $this->db->table($this->table)->where('type', $type)->get()->getResult();
    }
}
