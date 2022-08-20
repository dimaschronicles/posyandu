<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IbuModel;
use Config\Services;

class Ibu extends BaseController
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
            'title' => 'Data Ibu',
            'ibu' => $this->ibu->findIbu(),
        ];

        return view('ibu/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'title' => 'Detail Data Ibu',
            'ibu' => $this->ibu->findIbu($id),
        ];

        return view('ibu/detail_ibu', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => 'Tambah Data Ibu',
            'validation' => Services::validation(),
        ];

        return view('ibu/add_ibu', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'nik_ibu' => [
                'rules' => 'required|numeric|min_length[16]|max_length[16]',
                'errors' => [
                    'required' => 'NIK Ibu harus diisi!',
                    'numeric' => 'NIK Ibu harus angka!',
                    'min_length' => 'NIK Ibu kurang dari 16 digit!',
                    'max_length' => 'NIK Ibu lebih dari 16 digit!',
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu harus diisi!'
                ]
            ],
            'suami_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Suami Ibu harus diisi!'
                ]
            ],
            'tanggal_lahir_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi!'
                ]
            ],
            'alamat_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/ibu/new')->withInput();
        }

        $this->ibu->save([
            'id_user' => $this->request->getVar('id_user'),
            'nik_ibu' => $this->request->getVar('nik_ibu'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'suami_ibu' => $this->request->getVar('suami_ibu'),
            'tanggal_lahir_ibu' => $this->request->getVar('tanggal_lahir_ibu'),
            'alamat_ibu' => $this->request->getVar('alamat_ibu'),
            'date_created_ibu' => date('Y-m-d h:m:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>ibu</strong> berhasil ditambahkan!</div>');
        return redirect()->to('/ibu')->withInput();
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Data Ibu',
            'validation' => Services::validation(),
            'ibu' => $this->ibu->findIbu($id),
        ];

        return view('ibu/edit_ibu', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'nik_ibu' => [
                'rules' => 'required|numeric|min_length[16]|max_length[16]',
                'errors' => [
                    'required' => 'NIK Ibu harus diisi!',
                    'numeric' => 'NIK Ibu harus angka!',
                    'min_length' => 'NIK Ibu kurang dari 16 digit!',
                    'max_length' => 'NIK Ibu lebih dari 16 digit!',
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu harus diisi!'
                ]
            ],
            'suami_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Suami Ibu harus diisi!'
                ]
            ],
            'tanggal_lahir_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi!'
                ]
            ],
            'alamat_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/ibu/edit/' . $this->request->getVar('id_ibu'))->withInput();
        }

        $this->ibu->save([
            'id_ibu' => $id,
            'id_user' => $this->request->getVar('id_user'),
            'nik_ibu' => $this->request->getVar('nik_ibu'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'suami_ibu' => $this->request->getVar('suami_ibu'),
            'tanggal_lahir_ibu' => $this->request->getVar('tanggal_lahir_ibu'),
            'alamat_ibu' => $this->request->getVar('alamat_ibu'),
            'date_updated_ibu' => date('Y-m-d h:m:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>ibu</strong> berhasil diubah!</div>');
        return redirect()->to('/ibu')->withInput();
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->ibu->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>ibu</strong> berhasil dihapus!</div>');
        return redirect()->to('/ibu')->withInput();
    }
}
