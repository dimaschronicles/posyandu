<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IbuModel;
use Config\Services;

class PeriksaIbu extends BaseController
{
    public function __construct()
    {
        $this->ibu = new IbuModel();
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
        ];

        return view('periksa_balita/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'title' => 'Detail Data Pemeriksaan Balita',
            'periksaBalita' => $this->periksaBalita->findPeriksaBalita($id),
        ];

        return view('periksa_balita/detail_periksa_balita', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => 'Tambah Data Pemeriksaan Balita',
            'validation' => Services::validation(),
            'balita' => $this->balita->findBalitaIbu(),
            'vitamin' => $this->vitamin->findAll(),
        ];

        return view('periksa_balita/add_periksa_balita', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'tanggal_periksa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi!'
                ]
            ],
            'id_balita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Balita & Ibu harus diisi!'
                ]
            ],
            'id_vitamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Vitamin harus diisi!'
                ]
            ],
            'keterangan_periksa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi!'
                ]
            ],
            'tb_periksa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Panjang Badan harus diisi!',
                    'numeric' => 'Panjang Badan harus angka!',
                ]
            ],
            'bb_periksa' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Berat Badan harus diisi!',
                    'decimal' => 'Berat Badan tidak valid!',
                ]
            ],
            'lk_periksa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Lingkar Kepala harus diisi!',
                    'numeric' => 'Lingkar Kepala harus angka!',
                ]
            ],
        ])) {
            return redirect()->to('/periksabalita/new')->withInput();
        }

        $this->periksaBalita->save([
            'id_pemeriksa' => $this->request->getVar('id_user'),
            'id_balita' => $this->request->getVar('id_balita'),
            'tanggal_periksa' => $this->request->getVar('tanggal_periksa'),
            'tb_periksa' => $this->request->getVar('tb_periksa'),
            'bb_periksa' => $this->request->getVar('bb_periksa'),
            'lk_periksa' => $this->request->getVar('lk_periksa'),
            'id_vitamin' => $this->request->getVar('id_vitamin'),
            'keterangan_periksa' => $this->request->getVar('keterangan_periksa'),
            'date_created_periksa' => date('Y-m-d h:m:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>pemeriksaan balita</strong> berhasil ditambahkan!</div>');
        return redirect()->to('/periksabalita')->withInput();
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Data Pemeriksaan Balita',
            'validation' => Services::validation(),
            'balita' => $this->balita->findBalitaIbu(),
            'vitamin' => $this->vitamin->findAll(),
            'periksaBalita' => $this->periksaBalita->findPeriksaBalita($id),
        ];

        return view('periksa_balita/edit_periksa_balita', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'tanggal_periksa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi!'
                ]
            ],
            'id_balita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Balita & Ibu harus diisi!'
                ]
            ],
            'id_vitamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Vitamin harus diisi!'
                ]
            ],
            'keterangan_periksa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi!'
                ]
            ],
            'tb_periksa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Panjang Badan harus diisi!',
                    'numeric' => 'Panjang Badan harus angka!',
                ]
            ],
            'bb_periksa' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Berat Badan harus diisi!',
                    'decimal' => 'Berat Badan tidak valid!',
                ]
            ],
            'lk_periksa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Lingkar Kepala harus diisi!',
                    'numeric' => 'Lingkar Kepala harus angka!',
                ]
            ],
        ])) {
            return redirect()->to('/periksabalita/edit/' . $this->request->getVar('id_periksa_balita'))->withInput();
        }

        $this->periksaBalita->save([
            'id_periksa_balita' => $id,
            'id_pemeriksa' => $this->request->getVar('id_user'),
            'id_balita' => $this->request->getVar('id_balita'),
            'tanggal_periksa' => $this->request->getVar('tanggal_periksa'),
            'tb_periksa' => $this->request->getVar('tb_periksa'),
            'bb_periksa' => $this->request->getVar('bb_periksa'),
            'lk_periksa' => $this->request->getVar('lk_periksa'),
            'id_vitamin' => $this->request->getVar('id_vitamin'),
            'keterangan_periksa' => $this->request->getVar('keterangan_periksa'),
            'date_updated_periksa' => date('Y-m-d h:m:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>pemeriksaan balita</strong> berhasil diubah!</div>');
        return redirect()->to('/periksabalita')->withInput();
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->periksaBalita->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>pemeriksaan balita</strong> berhasil dihapus!</div>');
        return redirect()->to('/periksabalita')->withInput();
    }
}
