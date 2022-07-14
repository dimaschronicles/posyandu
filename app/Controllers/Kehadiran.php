<?php

namespace App\Controllers;

use App\Models\BalitaModel;
use App\Models\KehadiranModel;
use Config\Services;

class Kehadiran extends BaseController
{
    public function __construct()
    {
        $this->kehadiran = new KehadiranModel();
        $this->balita = new BalitaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kehadiran',
            'validation' => Services::validation(),
            'kehadiran' => $this->kehadiran->findAllKehadiran(),
        ];

        return view('kehadiran/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Data Kehadiran',
            'validation' => Services::validation(),
            'balita' => $this->balita->orderBy('nama_balita', 'asc')->findAll(),
        ];

        return view('kehadiran/add_kehadiran', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi!'
                ]
            ],
            'id_balita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Anak/Balita harus diisi!'
                ]
            ],
            'nama_pengantar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pengantar harus diisi!'
                ]
            ],
            'hub_keluarga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hubungan Keluarga harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/kehadiran/new')->withInput();
        }

        $this->kehadiran->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'id_balita' => $this->request->getVar('id_balita'),
            'nama_pengantar' => $this->request->getVar('nama_pengantar'),
            'hub_keluarga' => $this->request->getVar('hub_keluarga'),
            'alamat_kehadiran' => $this->request->getVar('alamat'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>kehadiran</strong> berhasil ditambahkan!</div>');
        return redirect()->to('/kehadiran')->withInput();
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Data Kehadiran',
            'validation' => Services::validation(),
            'kehadiran' => $this->kehadiran->findAllKehadiran($id),
            'balita' => $this->balita->orderBy('nama_balita', 'asc')->findAll(),
        ];

        return view('kehadiran/edit_kehadiran', $data);
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi!'
                ]
            ],
            'id_balita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Anak/Balita harus diisi!'
                ]
            ],
            'nama_pengantar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pengantar harus diisi!'
                ]
            ],
            'hub_keluarga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hubungan Keluarga harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/kehadiran/edit/' . $this->request->getVar('id_kehadiran'))->withInput();
        }

        $this->kehadiran->save([
            'id_kehadiran' => $id,
            'tanggal' => $this->request->getVar('tanggal'),
            'id_balita' => $this->request->getVar('id_balita'),
            'nama_pengantar' => $this->request->getVar('nama_pengantar'),
            'hub_keluarga' => $this->request->getVar('hub_keluarga'),
            'alamat_kehadiran' => $this->request->getVar('alamat'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>kehadiran</strong> berhasil diubah!</div>');
        return redirect()->to('/kehadiran')->withInput();
    }

    public function delete($id = null)
    {
        $this->kehadiran->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>kehadiran</strong> berhasil dihapus!</div>');
        return redirect()->to('/kehadiran')->withInput();
    }

    public function show($id = null)
    {
        $data = [
            'title' => 'Detail Data Kehadiran',
            'kehadiran' => $this->kehadiran->findAllKehadiran($id),
        ];

        return view('kehadiran/detail_kehadiran', $data);
    }
}
