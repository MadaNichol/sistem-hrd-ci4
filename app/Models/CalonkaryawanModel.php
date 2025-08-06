<?php

namespace App\Models;

use CodeIgniter\Model;

class CalonkaryawanModel extends Model
{
    protected $table = 'calon_karyawan';
    protected $primaryKey = 'id_calonkaryawan'; 
    protected $allowedFields = ['id_calonkaryawan','id_jabatan','nama_calonkaryawan', 'nama_jabatan', 'alamat','no_telp'];
}

