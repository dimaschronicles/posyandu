<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IbuModel;
use App\Models\ImunisasiModel;
use App\Models\PeriksaIbuModel;
use App\Models\VitaminModel;
use Config\Services;

class PeriksaIbu extends BaseController
{
    public function __construct()
    {
        $this->ibu = new IbuModel();
        $this->imunisasi = new ImunisasiModel();
        $this->vitamin = new VitaminModel();
        $this->periksaIbu = new PeriksaIbuModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Pemeriksaan Ibu Hamil',
            'periksaIbu' => $this->periksaIbu->findPeriksaIbu(),
        ];

        return view('periksa_ibu/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'title' => 'Detail Data Pemeriksaan Ibu Hamil',
            'periksaIbu' => $this->periksaIbu->findperiksaIbu($id),
        ];

        return view('periksa_ibu/detail_periksa_ibu', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => 'Tambah Data Pemeriksaan Ibu Hamil',
            'validation' => Services::validation(),
            'ibu' => $this->ibu->findAll(),
            'imunisasi' => $this->imunisasi->findAll(),
            'vitamin' => $this->vitamin->findAll(),
        ];

        return view('periksa_ibu/add_periksa_ibu', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'tanggal_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi!'
                ]
            ],
            'id_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu harus diisi!'
                ]
            ],
            'uk_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Usia Kandungan harus diisi!'
                ]
            ],
            'bb_periksa_ibu' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Berat Badan harus diisi!',
                    'decimal' => 'Berat Badan tidak valid!',
                ]
            ],
            'lila_periksa_ibu' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Lingkar Lengan harus diisi!',
                    'decimal' => 'Lingkar Lengan tidak valid!',
                ]
            ],
            'tfundus_periksa_ibu' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Tinggi Fundus harus diisi!',
                    'decimal' => 'Tinggi Fundus tidak valid!',
                ]
            ],
            'id_vitamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Vitamin harus diisi!'
                ]
            ],
            'id_imunisasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Imunisasi harus diisi!'
                ]
            ],
            'konseling_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konseling harus diisi!'
                ]
            ],
            'keluhan_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keluhan harus diisi!'
                ]
            ],
            'keterangan_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/periksaibu/new')->withInput();
        }

        $this->periksaIbu->save([
            'id_pemeriksa' => $this->request->getVar('id_user'),
            'id_ibu' => $this->request->getVar('id_ibu'),
            'tanggal_periksa_ibu' => $this->request->getVar('tanggal_periksa_ibu'),
            'uk_periksa_ibu' => $this->request->getVar('uk_periksa_ibu'),
            'bb_periksa_ibu' => $this->request->getVar('bb_periksa_ibu'),
            'lila_periksa_ibu' => $this->request->getVar('lila_periksa_ibu'),
            'tfundus_periksa_ibu' => $this->request->getVar('tfundus_periksa_ibu'),
            'id_imunisasi' => $this->request->getVar('id_imunisasi'),
            'id_vitamin' => $this->request->getVar('id_vitamin'),
            'konseling_periksa_ibu' => $this->request->getVar('konseling_periksa_ibu'),
            'keluhan_periksa_ibu' => $this->request->getVar('keluhan_periksa_ibu'),
            'keterangan_periksa_ibu' => $this->request->getVar('keterangan_periksa_ibu'),
            'date_created_periksa_ibu' => date('Y-m-d h:m:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>pemeriksaan ibu hamil</strong> berhasil ditambahkan!</div>');
        return redirect()->to('/periksaibu')->withInput();
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Data Pemeriksaan Ibu Hamil',
            'validation' => Services::validation(),
            'ibu' => $this->ibu->findAll(),
            'imunisasi' => $this->imunisasi->findAll(),
            'vitamin' => $this->vitamin->findAll(),
            'periksaIbu' => $this->periksaIbu->findperiksaIbu($id),
        ];

        return view('periksa_ibu/edit_periksa_ibu', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'tanggal_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi!'
                ]
            ],
            'id_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu harus diisi!'
                ]
            ],
            'uk_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Usia Kandungan harus diisi!'
                ]
            ],
            'bb_periksa_ibu' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Berat Badan harus diisi!',
                    'decimal' => 'Berat Badan tidak valid!',
                ]
            ],
            'lila_periksa_ibu' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Lingkar Lengan harus diisi!',
                    'decimal' => 'Lingkar Lengan tidak valid!',
                ]
            ],
            'tfundus_periksa_ibu' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Tinggi Fundus harus diisi!',
                    'decimal' => 'Tinggi Fundus tidak valid!',
                ]
            ],
            'id_vitamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Vitamin harus diisi!'
                ]
            ],
            'id_imunisasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Imunisasi harus diisi!'
                ]
            ],
            'konseling_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konseling harus diisi!'
                ]
            ],
            'keluhan_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keluhan harus diisi!'
                ]
            ],
            'keterangan_periksa_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/periksaibu/edit/' . $this->request->getVar('id_periksa_ibu'))->withInput();
        }

        $this->periksaIbu->save([
            'id_periksa_ibu' => $id,
            'id_pemeriksa' => $this->request->getVar('id_user'),
            'id_ibu' => $this->request->getVar('id_ibu'),
            'tanggal_periksa_ibu' => $this->request->getVar('tanggal_periksa_ibu'),
            'uk_periksa_ibu' => $this->request->getVar('uk_periksa_ibu'),
            'bb_periksa_ibu' => $this->request->getVar('bb_periksa_ibu'),
            'lila_periksa_ibu' => $this->request->getVar('lila_periksa_ibu'),
            'tfundus_periksa_ibu' => $this->request->getVar('tfundus_periksa_ibu'),
            'id_imunisasi' => $this->request->getVar('id_imunisasi'),
            'id_vitamin' => $this->request->getVar('id_vitamin'),
            'konseling_periksa_ibu' => $this->request->getVar('konseling_periksa_ibu'),
            'keluhan_periksa_ibu' => $this->request->getVar('keluhan_periksa_ibu'),
            'keterangan_periksa_ibu' => $this->request->getVar('keterangan_periksa_ibu'),
            'date_updated_periksa_ibu' => date('Y-m-d h:m:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>pemeriksaan ibu hamil</strong> berhasil diubah!</div>');
        return redirect()->to('/periksaibu')->withInput();
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->periksaIbu->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>pemeriksaan ibu hamil</strong> berhasil dihapus!</div>');
        return redirect()->to('/periksaibu')->withInput();
    }
}
