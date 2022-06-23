<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields = ['name', 'email', 'password','status'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

}

?>