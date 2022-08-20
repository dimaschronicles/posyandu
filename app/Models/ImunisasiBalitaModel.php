<?php

namespace App\Models;

use CodeIgniter\Model;

class ImunisasiBalitaModel extends Model
{
    protected $table      = 'imunisasi_balita';
    protected $primaryKey = 'id_imunisasi_balita';
    protected $allowedFields = [
        'id_user',
        'id_balita',
        'id_imunisasi',
        'keterangan_imunisasi',
        'tanggal_imunisasi',
        'date_created_imunisasi',
        'date_updated_imunisasi',
    ];

    // get all data / specific imunisasi_balita
    public function findImunisasiBalita($id = false)
    {
        if ($id == false) {
            return $this->db->table('imunisasi_balita')->select('*')
                ->join('balita', 'balita.id_balita = imunisasi_balita.id_balita')
                ->join('imunisasi', 'imunisasi.id_imunisasi = imunisasi_balita.id_imunisasi')
                ->join('ibu', 'ibu.id_ibu = balita.id_ibu')
                ->join('users', 'users.id_user = balita.id_user')
                ->orderBy('tanggal_imunisasi', 'desc')
                ->get()->getResultArray();
        }

        return $this->db->table('imunisasi_balita')->select('*')
            ->join('balita', 'balita.id_balita = imunisasi_balita.id_balita')
            ->join('imunisasi', 'imunisasi.id_imunisasi = imunisasi_balita.id_imunisasi')
            ->join('ibu', 'ibu.id_ibu = balita.id_ibu')
            ->join('users', 'users.id_user = balita.id_user')
            ->where('id_imunisasi_balita', $id)
            ->get()->getRowArray();
    }
}
