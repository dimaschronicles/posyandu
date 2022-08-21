<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;

class Profil extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profil',
            'user' => $this->user->find(session('id_user')),
            'validation' => Services::validation()
        ];

        return view('profil/index', $data);
    }

    public function editprofil()
    {
        // 
    }
}
