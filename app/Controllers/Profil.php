<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;

class Profil extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profil',
            'user' => $this->user->find(session('id_user')),
            'validation' => Services::validation()
        ];

        return view('profil/index', $data);
    }

    public function editprofil()
    {
        $data = [
            'title' => 'Edit Profil',
            'user' => $this->user->find(session('id_user')),
            'validation' => Services::validation()
        ];

        return view('profil/editprofil', $data);
    }

    public function updateProfil()
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
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
        ])) {
            return redirect()->to('/profil/editprofil')->withInput();
        }

        $this->user->save([
            'id_user' => $this->request->getVar('id_user'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'date_updated' => date('Y-m-d h:i:s'),
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert"><strong>Profil</strong> berhasil diperbaharui!</div>');
        return redirect()->to('/profil')->withInput();
    }

    public function changePassword()
    {
        $data = [
            'title' => 'Ganti Password',
            'validation' => Services::validation(),
        ];

        return view('profil/gantipassword', $data);
    }

    public function updatePassword()
    {
        if (!$this->validate([
            'current_password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password Saat Ini harus diisi!',
                    'min_length' => 'Password Saat Ini minimal 6 karakter!',
                ]
            ],
            'new_password' => [
                'rules' => 'required|min_length[6]|matches[new_password_conf]',
                'errors' => [
                    'required' => 'Password Baru harus diisi!',
                    'min_length' => 'Password Baru minimal 6 karakter!',
                    'matches' => 'Password Baru tidak sama dengan Konfirmasi Password!',
                ]
            ],
            'new_password_conf' => [
                'rules' => 'required|min_length[6]|matches[new_password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi!',
                    'min_length' => 'Konfirmasi Password minimal 6 karakter!',
                    'matches' => 'Konfirmasi Password tidak sama dengan Password!',
                ]
            ]
        ])) {
            return redirect()->to('/profil/changepassword')->withInput();
        }

        $user = $this->user->where('id_user', session()->get('id_user'))->first();
        $current_password = $this->request->getVar('current_password');
        $new_password = $this->request->getVar('new_password');

        if (!password_verify($current_password, $user['password'])) {
            session()->setFlashdata('message', '<div class="alert alert-danger"><b>Password Saat Ini</b> salah!</div>');
            return redirect()->to('/profil/changepassword');
        } else {
            if ($current_password == $new_password) {
                session()->setFlashdata('message', '<div class="alert alert-danger"><b>Password Baru</b> harus berbeda dengan <b>Password Saat Ini</b>!</div>');
                return redirect()->to('/profil/changepassword');
            } else {
                $this->user->save([
                    'id_user' => $this->request->getVar('id_user'),
                    'password' => password_hash($new_password, PASSWORD_DEFAULT),
                ]);

                session()->setFlashdata('message', '<div class="alert alert-success"><b>Password</b> anda berhasil diubah!</div>');
                return redirect()->to('/profil');
            }
        }
    }

    public function resetPassword()
    {
        $data = [
            'title' => 'Reset Password',
            'validation' => Services::validation(),
            'email' => $this->user->where('role !=', 'admin')->findAll(),
        ];

        return view('profil/resetpassword', $data);
    }

    public function updateResetPassword()
    {
        if (!$this->validate([
            'email_reset' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Email tidak valid!',
                ]
            ],
            'password' => [
                'rules' => 'trim|required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi!',
                    'min_length' => 'Password kurang dari 6 karakter!',
                ]
            ],
            'password_conf' => [
                'rules' => 'trim|required|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi!',
                    'min_length' => 'Konfirmasi Password kurang dari 6 karakter!',
                    'matches' => 'Konfirmasi Password tidak sama dengan Password!',
                ]
            ]
        ])) {
            return redirect()->to('/profil/resetpassword')->withInput();
        }

        $email = $this->request->getVar('email_reset');

        $builder = $this->db->table('users');
        $data = [
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        $builder->where('email', $email);
        $builder->update($data);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Password <strong>' . $email . '</strong> berhasil direset.</div>');
        return redirect()->to('/profil')->withInput();
    }
}
