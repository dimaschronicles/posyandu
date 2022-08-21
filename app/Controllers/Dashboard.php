<?php

namespace App\Controllers;

use App\Models\BalitaModel;
use App\Models\IbuModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->balita = new BalitaModel();
        $this->ibu = new IbuModel();
        $this->user = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'jumlahBalita' => $this->balita->countAllResults(),
            'jumlahIbu' => $this->ibu->countAllResults(),
            'jumlahKader' => $this->user->where('role', 'kader')->countAllResults(),
            'jumlahBidan' => $this->user->where('role', 'bidan')->countAllResults(),
        ];

        return view('dashboard/index', $data);
    }
}
