<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session('email')) {
            return redirect()->to('dashboard');
        }

        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/index', $data);
    }

    public function login()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Email tidak valid!',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('/')->withInput();
        }

        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataUser = $userModel->getLogin($email);

        if (!empty($dataUser)) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'id_user' => $dataUser['id_user'],
                    'nama' => $dataUser['nama'],
                    'email' => $dataUser['email'],
                    'role' => $dataUser['role'],
                ]);
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><strong>Password</strong> anda tidak valid!</div>');
                return redirect()->to('/')->withInput();
            }
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><strong>Email</strong> anda tidak benar!</div>');
            return redirect()->to('/')->withInput();
        }
    }

    public function logout()
    {
        $array_items = ['id_user', 'nama', 'email', 'role'];
        session()->remove($array_items);
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
        return redirect()->to('/')->withInput();
    }
}
