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
        'id_imunisasi',
        'bb_periksa_ibu',
        'lila_periksa_ibu',
        'tfundus_periksa_ibu',
        'id_vitamin',
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
                ->join('ibu', 'ibu.id_ibu = periksa_ibu.id_ibu')
                ->join('imunisasi', 'imunisasi.id_imunisasi = periksa_ibu.id_imunisasi')
                ->join('vitamin', 'vitamin.id_vitamin = periksa_ibu.id_vitamin')
                ->orderBy('tanggal_periksa_ibu', 'desc')
                ->get()->getResultArray();
        }

        return $this->db->table('periksa_ibu')->select('*')
            ->where('id_periksa_ibu', $id)
            ->join('users', 'users.id_user = periksa_ibu.id_pemeriksa')
            ->join('ibu', 'ibu.id_ibu = periksa_ibu.id_ibu')
            ->join('imunisasi', 'imunisasi.id_imunisasi = periksa_ibu.id_imunisasi')
            ->join('vitamin', 'vitamin.id_vitamin = periksa_ibu.id_vitamin')
            ->orderBy('tanggal_periksa_ibu', 'desc')
            ->get()->getRowArray();
    }

    public function filterPeriksaIbu($dari_tanggal, $sampai_tanggal)
    {
        return $this->db->table('periksa_ibu')->select('*')
            ->where(['tanggal_periksa_ibu >=' => $dari_tanggal, 'tanggal_periksa_ibu <=' => $sampai_tanggal])
            ->join('users', 'users.id_user = periksa_ibu.id_pemeriksa')
            ->join('ibu', 'ibu.id_ibu = periksa_ibu.id_ibu')
            ->join('imunisasi', 'imunisasi.id_imunisasi = periksa_ibu.id_imunisasi')
            ->join('vitamin', 'vitamin.id_vitamin = periksa_ibu.id_vitamin')
            ->orderBy('tanggal_periksa_ibu', 'desc')
            ->get()->getResultArray();
    }
}
