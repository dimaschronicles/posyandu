<?php

namespace App\Models;

use CodeIgniter\Model;

class PenimbanganModel extends Model
{
    protected $table      = 'penimbangan';
    protected $primaryKey = 'id_penimbangan';
    protected $allowedFields = [];
}
