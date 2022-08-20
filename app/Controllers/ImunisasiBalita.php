<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BalitaModel;
use App\Models\ImunisasiBalitaModel;
use App\Models\ImunisasiModel;
use Config\Services;

class ImunisasiBalita extends BaseController
{
    public function __construct()
    {
        $this->balita = new BalitaModel();
        $this->imunisasi = new ImunisasiModel();
        $this->imunisasiBalita = new ImunisasiBalitaModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Imunisasi Balita',
            'imunisasiBalita' => $this->imunisasiBalita->findImunisasiBalita(),
        ];

        return view('imunisasi_balita/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'title' => 'Detail Data Imunisasi Balita',
            'imunisasiBalita' => $this->imunisasiBalita->findImunisasiBalita($id),
        ];

        return view('imunisasi_balita/detail_imunisasi_balita', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => 'Tambah Data Imunisasi Balita',
            'validation' => Services::validation(),
            'balita' => $this->balita->findBalitaIbu(),
            'imunisasi' => $this->imunisasi->findAll(),
        ];

        return view('imunisasi_balita/add_imunisasi_balita', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'id_balita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Balita & Ibu harus diisi!'
                ]
            ],
            'id_imunisasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Imunisasi harus diisi!'
                ]
            ],
            'keterangan_imunisasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/imunisasibalita/new')->withInput();
        }

        $this->imunisasiBalita->save([
            'id_balita' => $this->request->getVar('id_balita'),
            'id_user' => $this->request->getVar('id_user'),
            'id_imunisasi' => $this->request->getVar('id_imunisasi'),
            'keterangan_imunisasi' => $this->request->getVar('keterangan_imunisasi'),
            'tanggal_imunisasi' => date('Y-m-d'),
            'date_created_imunisasi' => date('Y-m-d h:i:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>imunisasi balita</strong> berhasil ditambahkan!</div>');
        return redirect()->to('/imunisasibalita')->withInput();
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Data Imunisasi Balita',
            'validation' => Services::validation(),
            'balita' => $this->balita->findBalitaIbu(),
            'imunisasi' => $this->imunisasi->findAll(),
            'imunisasiBalita' => $this->imunisasiBalita->findImunisasiBalita($id),
        ];

        return view('imunisasi_balita/edit_imunisasi_balita', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'id_balita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Balita & Ibu harus diisi!'
                ]
            ],
            'id_imunisasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Imunisasi harus diisi!'
                ]
            ],
            'keterangan_imunisasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/imunisasibalita/edit/' . $this->request->getVar('id_imunisasi'))->withInput();
        }

        $this->imunisasiBalita->save([
            'id_imunisasi_balita' => $id,
            'id_balita' => $this->request->getVar('id_balita'),
            'id_user' => $this->request->getVar('id_user'),
            'id_imunisasi' => $this->request->getVar('id_imunisasi'),
            'keterangan_imunisasi' => $this->request->getVar('keterangan_imunisasi'),
            'tanggal_imunisasi' => date('Y-m-d'),
            'date_updated_imunisasi' => date('Y-m-d h:i:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>imunisasi balita</strong> berhasil diubah!</div>');
        return redirect()->to('/imunisasibalita')->withInput();
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->imunisasiBalita->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>imunisasi balita</strong> berhasil dihapus!</div>');
        return redirect()->to('/imunisasibalita')->withInput();
    }
}
