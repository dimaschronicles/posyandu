<?php

namespace App\Models;

use CodeIgniter\Model;

class VitaminModel extends Model
{
    protected $table      = 'vitamin';
    protected $primaryKey = 'id_vitamin';
    protected $allowedFields = ['nama_vitamin'];
}
