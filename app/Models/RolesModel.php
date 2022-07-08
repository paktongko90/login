<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields = ['role_name'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    public function getRoles($id = false){
        if ($id === false) {
            return $this->findAll();
        }else{
            return $this->getWhere(['id' => $id]);
        }
    }

    public function saveRole($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateRole($data, $id){
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function deleteRole($id){
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
}

?>