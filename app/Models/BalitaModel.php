<?php

namespace App\Models;

use CodeIgniter\Model;

class BalitaModel extends Model
{
    protected $table      = 'balita';
    protected $primaryKey = 'id_balita';
    protected $allowedFields = ['nama_balita', 'tanggal_lahir', 'jenis_kelamin', 'nama_ibu', 'alamat', 'panjang_badan', 'berat_badan', 'berat_lahir', 'lingkar_kepala', 'date_created'];
}
