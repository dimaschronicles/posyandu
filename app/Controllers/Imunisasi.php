<?php

namespace App\Controllers;

use Config\Services;
use App\Models\ImunisasiModel;

class Imunisasi extends BaseController
{
    public function __construct()
    {
        $this->imunisasi = new ImunisasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Imunisasi',
            'imunisasi' => $this->imunisasi->findAll(),
            'validation' => Services::validation()
        ];

        return view('imunisasi/index', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'nama_imunisasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Imunisasi harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('/imunisasi')->withInput();
        }

        $this->imunisasi->save([
            'nama_imunisasi' => $this->request->getVar('nama_imunisasi'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>imunisasi</strong> berhasil ditambahkan!</div>');
        return redirect()->to('/imunisasi')->withInput();
    }

    public function delete($id)
    {
        $this->imunisasi->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success">Data <strong>imunisasi</strong> berhasil dihapus!</div>');
        return redirect()->to('/imunisasi');
    }
}
