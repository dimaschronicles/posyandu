<?php

namespace App\Controllers;

use App\Models\VitaminModel;
use Config\Services;

class Vitamin extends BaseController
{
    public function __construct()
    {
        $this->vitamin = new VitaminModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Vitamin',
            'vitamin' => $this->vitamin->findAll(),
            'validation' => Services::validation()
        ];

        return view('vitamin/index', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'nama_vitamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Vitamin harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('/vitamin')->withInput();
        }

        $this->vitamin->save([
            'nama_vitamin' => $this->request->getVar('nama_vitamin'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>vitamin</strong> berhasil ditambahkan!</div>');
        return redirect()->to('/vitamin')->withInput();
    }

    public function delete($id)
    {
        $this->vitamin->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success">Data <strong>vitamin</strong> berhasil dihapus!</div>');
        return redirect()->to('/vitamin');
    }
}
