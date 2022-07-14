<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BalitaModel;
use Config\Services;

class Balita extends BaseController
{
    public function __construct()
    {
        $this->balita = new BalitaModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Data Balita',
            'balita' => $this->balita->orderBy('nama_balita', 'asc')->findAll(),
        ];

        return view('balita/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'title' => 'Detail Data Balita',
            'balita' => $this->balita->find($id),
        ];

        return view('balita/detail_balita', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => 'Tambah Data Balita',
            'validation' => Services::validation(),
        ];

        return view('balita/add_balita', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'nama_balita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Balita harus diisi!'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi!'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu harus diisi!'
                ]
            ],
            'panjang_badan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Panjang Badan harus diisi!',
                    'numeric' => 'Panjang Badan harus angka!',
                ]
            ],
            'berat_lahir' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Berat Badan harus diisi!',
                    'decimal' => 'Berat Badan tidak valid!',
                ]
            ],
            'lingkar_kepala' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Lingkar Kepala harus diisi!',
                    'numeric' => 'Lingkar Kepala harus angka!',
                ]
            ],
        ])) {
            return redirect()->to('/balita/new')->withInput();
        }

        $this->balita->save([
            'nama_balita' => $this->request->getVar('nama_balita'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'panjang_badan' => $this->request->getVar('panjang_badan'),
            'berat_lahir' => $this->request->getVar('berat_lahir'),
            'lingkar_kepala' => $this->request->getVar('lingkar_kepala'),
            'date_created' => date('Y-m-d h:m:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>balita</strong> berhasil ditambahkan!</div>');
        return redirect()->to('/balita')->withInput();
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Data Balita',
            'validation' => Services::validation(),
            'balita' => $this->balita->find($id),
        ];

        return view('balita/edit_balita', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'nama_balita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Balita harus diisi!'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi!'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu harus diisi!'
                ]
            ],
            'panjang_badan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Panjang Badan harus diisi!',
                    'numeric' => 'Panjang Badan harus angka!',
                ]
            ],
            'berat_lahir' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Berat Badan harus diisi!',
                    'decimal' => 'Berat Badan tidak valid!',
                ]
            ],
            'lingkar_kepala' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Lingkar Kepala harus diisi!',
                    'numeric' => 'Lingkar Kepala harus angka!',
                ]
            ],
        ])) {
            return redirect()->to('/balita/edit/' . $this->request->getVar('id_balita'))->withInput();
        }

        $this->balita->save([
            'id_balita' => $id,
            'nama_balita' => $this->request->getVar('nama_balita'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'panjang_badan' => $this->request->getVar('panjang_badan'),
            'berat_lahir' => $this->request->getVar('berat_lahir'),
            'lingkar_kepala' => $this->request->getVar('lingkar_kepala'),
            'date_created' => date('Y-m-d h:m:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>balita</strong> berhasil diubah!</div>');
        return redirect()->to('/balita')->withInput();
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->balita->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>balita</strong> berhasil dihapus!</div>');
        return redirect()->to('/balita')->withInput();
    }
}
