<?php

namespace App\Models;

use CodeIgniter\Model;

class ProsesseleksiModel extends Model
{
    protected $table = 'penguji_seleksi';
    protected $primaryKey = 'id_calonkaryawan'; 
    protected $allowedFields = ['id_calonkaryawan','nama_calonkaryawan','status'];
    public $useAutoIncrement = false; 
}