<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratkontrakModel extends Model
{
    protected $table = 'kontrak';
    protected $primaryKey = 'id_kontrak'; 
    protected $allowedFields = ['id_kontrak','jenis_kontrak'];
}

