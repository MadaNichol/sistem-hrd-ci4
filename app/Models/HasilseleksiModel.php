<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilSeleksiModel extends Model
{
    protected $table            = 'hasil_seleksi';
    protected $primaryKey       = 'id_hasilseleksi';
    protected $allowedFields    = ['id_calonkaryawan', 'keputusan'];
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
}
