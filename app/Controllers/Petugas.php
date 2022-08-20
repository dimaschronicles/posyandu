<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;

class Petugas extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $role = ['kader', 'bidan'];

        $data = [
            'title' => 'Data Petugas',
            'petugas' => $this->user->whereIn('role', $role)->findAll(),
        ];

        return view('petugas/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title' => 'Detail Data Petugas',
            'petugas' => $this->user->find($id),
        ];

        return view('petugas/detail_petugas', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Data Petugas',
            'validation' => Services::validation(),
        ];

        return view('petugas/add_petugas', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi!'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Email tidak valid!',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric|min_length[11]|max_length[13]',
                'errors' => [
                    'required' => 'No HP/WA harus diisi!',
                    'numeric' => 'No HP/WA harus angka!',
                    'min_length' => 'No HP/WA minimal 11 digit!',
                    'max_length' => 'No HP/WA maksimal 13 digit!',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|matches[password_conf]',
                'errors' => [
                    'required' => 'Password harus diisi!',
                    'min_length' => 'Password minimal 6 karakter!',
                    'matches' => 'Password tidak sama!'
                ]
            ],
            'password_conf' => [
                'rules' => 'required|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Password harus diisi!',
                    'min_length' => 'Password minimal 6 karakter!',
                    'matches' => 'Konfirmasi Password tidak sama!'
                ]
            ],
        ])) {
            return redirect()->to('/petugas/new')->withInput();
        }

        $this->user->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'role' => $this->request->getVar('role'),
            'date_created' => date('Y-m-d h:i:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>petugas</strong> berhasil ditambahkan!</div>');
        return redirect()->to('/petugas')->withInput();
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Data Petugas',
            'validation' => Services::validation(),
            'petugas' => $this->user->find($id),
        ];

        return view('petugas/edit_petugas', $data);
    }

    public function update($id = null)
    {
        $id = $this->request->getVar('id_user');

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi!'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Email tidak valid!',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric|min_length[11]|max_length[13]',
                'errors' => [
                    'required' => 'No HP/WA harus diisi!',
                    'numeric' => 'No HP/WA harus angka!',
                    'min_length' => 'No HP/WA minimal 11 digit!',
                    'max_length' => 'No HP/WA maksimal 13 digit!',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/petugas/edit/' . $id)->withInput();
        }

        $this->user->save([
            'id_user' => $id,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'role' => $this->request->getVar('role'),
            'date_created' => date('Y-m-d h:i:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>petugas</strong> berhasil diubah!</div>');
        return redirect()->to('/petugas')->withInput();
    }

    public function delete($id = null)
    {
        $this->user->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <strong>petugas</strong> berhasil dihapus!</div>');
        return redirect()->to('/petugas')->withInput();
    }
}
