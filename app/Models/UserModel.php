<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'email', 'password', 'jenis_kelamin', 'no_hp', 'alamat', 'role', 'date_created', 'date_updated'];

    public function getLogin($email)
    {
        return $this->db->table($this->table)->getWhere(['email' => $email])->getRowArray();
    }
}
