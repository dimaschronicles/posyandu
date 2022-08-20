<?php

namespace App\Models;

use CodeIgniter\Model;

class IbuModel extends Model
{
    protected $table      = 'ibu';
    protected $primaryKey = 'id_ibu';
    protected $allowedFields = [
        'id_user',
        'nik_ibu',
        'nama_ibu',
        'suami_ibu',
        'tanggal_lahir_ibu',
        'alamat_ibu',
        'date_created_ibu',
        'date_updated_ibu'
    ];

    public function findIbu($id = false)
    {
        if ($id == false) {
            return $this->db->table('ibu')->select('*')
                ->join('users', 'users.id_user = ibu.id_user')
                ->orderBy('nama_ibu', 'asc')
                ->get()->getResultArray();
        }

        return $this->db->table('ibu')->select('*')
            ->where('id_ibu', $id)
            ->join('users', 'users.id_user = ibu.id_user')
            ->get()->getRowArray();
    }
}
