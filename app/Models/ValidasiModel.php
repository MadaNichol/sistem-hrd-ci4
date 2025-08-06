<?php

namespace App\Models;

use CodeIgniter\Model;

class ValidasiModel extends Model
{
    protected $table = 'validasi';
    protected $primaryKey = 'id_sk'; 
    protected $allowedFields = ['id_sk', 'status'];
    public $useAutoIncrement = false; 
}

