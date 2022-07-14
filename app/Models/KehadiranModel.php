<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table      = 'kehadiran';
    protected $primaryKey = 'id_kehadiran';
    protected $allowedFields = ['id_balita', 'nama_pengantar', 'hub_keluarga', 'alamat_kehadiran', 'keterangan', 'tanggal'];

    public function findAllKehadiran($id_kehadiran = null)
    {
        if ($id_kehadiran == null) {
            return $this->db->table('kehadiran')->select('*')
                ->join('balita', 'balita.id_balita = kehadiran.id_balita')
                ->orderBy('tanggal', 'desc')
                ->get()->getResultArray();
        }

        return $this->db->table('kehadiran')->select('*')
            ->where('id_kehadiran', $id_kehadiran)
            ->join('balita', 'balita.id_balita = kehadiran.id_balita')
            ->get()->getRowArray();
    }
}
