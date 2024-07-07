<?php

namespace App\Models;

use CodeIgniter\Model;

class BMR extends Model
{
    public function getActivityLevels()
    {
        return $this->db->table('activity_scale')->get()->getResult();
    }
}
