<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriksaIbuModel extends Model
{
    protected $table      = 'periksa_ibu';
    protected $primaryKey = 'id_periksa_ibu';
    protected $allowedFields = [
        'id_pemeriksa',
        'id_ibu',
        'tanggal_periksa_ibu',
        'uk_periksa_ibu',
        'tb_periksa_ibu',
        'bb_periksa_ibu',
        'lila_periksa_ibu',
        'tfundus_periksa_ibu',
        'tablet',
        'konseling_periksa_ibu',
        'keluhan_periksa_ibu',
        'keterangan_periksa_ibu',
        'date_created_periksa_ibu',
        'date_updated_periksa_ibu',
    ];

    public function findPeriksaIbu($id = false)
    {
        if ($id == false) {
            return $this->db->table('periksa_ibu')->select('*')
                ->join('users', 'users.id_user = periksa_ibu.id_pemeriksa')
                ->join('ibu', 'ibu.id_ibu = balita.id_ibu')
                ->orderBy('tanggal_periksa', 'desc')
                ->get()->getResultArray();
        }

        return $this->db->table('periksa_ibu')->select('*')
            ->where('id_periksa_ibu', $id)
            ->join('users', 'users.id_user = periksa_ibu.id_pemeriksa')
            ->join('ibu', 'ibu.id_ibu = balita.id_ibu')
            ->orderBy('tanggal_periksa', 'desc')
            ->get()->getRowArray();
    }
}
