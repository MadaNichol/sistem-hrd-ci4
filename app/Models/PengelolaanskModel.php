<?php

namespace App\Models;

use CodeIgniter\Model;

class PengelolaanskModel extends Model
{
    protected $table = 'pengelolaan_sk';
    protected $primaryKey = 'id_sk'; 
    protected $allowedFields = ['id_sk','id_jabatan','id_kategori','id_karyawan','id_kontrak','id_user','nama','jenis_kontrak', 'tanggal_kontrak_mulai', 'tanggal_berakhir_kontrak','nama_jabatan','kategori_karyawan','nama_user'];
}



