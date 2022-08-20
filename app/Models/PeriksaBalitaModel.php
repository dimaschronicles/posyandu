<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriksaBalitaModel extends Model
{
    protected $table      = 'periksa_balita';
    protected $primaryKey = 'id_periksa_balita';
    protected $allowedFields = [
        'id_pemeriksa',
        'id_balita',
        'tanggal_periksa',
        'tb_periksa',
        'bb_periksa',
        'lk_periksa',
        'id_vitamin',
        'keterangan_periksa',
        'date_created_periksa',
        'date_updated_periksa',
    ];

    public function findPeriksaBalita($id = false)
    {
        if ($id == false) {
            return $this->db->table('periksa_balita')->select('*')
                ->join('balita', 'balita.id_balita = periksa_balita.id_balita')
                ->join('vitamin', 'vitamin.id_vitamin = periksa_balita.id_vitamin')
                ->join('users', 'users.id_user = periksa_balita.id_pemeriksa')
                ->join('ibu', 'ibu.id_ibu = balita.id_ibu')
                ->orderBy('tanggal_periksa', 'desc')
                ->get()->getResultArray();
        }

        return $this->db->table('periksa_balita')->select('*')
            ->where('id_periksa_balita', $id)
            ->join('balita', 'balita.id_balita = periksa_balita.id_balita')
            ->join('vitamin', 'vitamin.id_vitamin = periksa_balita.id_vitamin')
            ->join('ibu', 'ibu.id_ibu = balita.id_ibu')
            ->join('users', 'users.id_user = periksa_balita.id_pemeriksa')
            ->orderBy('tanggal_periksa', 'desc')
            ->get()->getRowArray();
    }
}
