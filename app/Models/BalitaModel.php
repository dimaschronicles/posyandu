<?php

namespace App\Models;

use CodeIgniter\Model;

class BalitaModel extends Model
{
    protected $table      = 'balita';
    protected $primaryKey = 'id_balita';
    protected $allowedFields = [
        'id_ibu',
        'id_user',
        'nik_balita',
        'nama_balita',
        'tanggal_lahir_balita',
        'jk_balita',
        'panjang_badan',
        'berat_badan',
        'berat_lahir',
        'lingkar_kepala',
        'date_created_balita',
        'date_updated_balita',
    ];

    // query untuk mendapatkan semua data balita atau tertentu yang dimana data balita berelasi dengan data ibu
    public function findBalitaIbu($id = false)
    {
        if ($id == false) {
            return $this->db->table('balita')->select('*')
                ->join('users', 'users.id_user = balita.id_user')
                ->join('ibu', 'ibu.id_ibu = balita.id_ibu')
                ->orderBy('nama_balita', 'asc')
                ->get()->getResultArray();
        }

        return $this->db->table('balita')->select('*')
            ->where('id_balita', $id)
            ->join('users', 'users.id_user = balita.id_user')
            ->join('ibu', 'ibu.id_ibu = balita.id_ibu')
            ->get()->getRowArray();
    }
}
