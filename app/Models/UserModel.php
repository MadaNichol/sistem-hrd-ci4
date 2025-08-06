<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user','nama_user', 'email', 'password','id_role'];

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
