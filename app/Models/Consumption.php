<?php

namespace App\Models;

use CodeIgniter\Model;

class Consumption extends Model
{
    protected $table            = 'consumption';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    public function getData()
    {
        return $this->db->table($this->table)->get()->getResult();
    }

    public function getDetail($id)
    {
        return $this->db->table($this->table)->where($this->primaryKey, $id)->get()->getRow();
    }

    public function createData($data)
    {
        $this->db->table($this->table)->insert($data);
    }

    public function updateData($data, $id)
    {
        $this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
    }

    public function deleteData($id)
    {
        $this->db->table($this->table)->where($this->primaryKey, $id)->delete();
    }
}
