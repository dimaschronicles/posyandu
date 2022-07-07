<?php

namespace App\Models;

use CodeIgniter\Model;

class ImunisasiModel extends Model
{
    protected $table      = 'imunisasi';
    protected $primaryKey = 'id_imunisasi';
    protected $allowedFields = ['nama_imunisasi'];
}
