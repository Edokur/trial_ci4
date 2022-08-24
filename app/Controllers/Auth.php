<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        //membuat user model untuk konek ke database
        $this->userModel = new UserModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('auth/register', $data);
    }

    public function valid_register()
    {
        $data = $this->request->getPost();

        $this->validation->run($data, 'register');

        $errors = $this->validation->getErrors();

        if ($errors) {
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('/auth/register'));
        }

        $salt = uniqid('', true);

        $password = md5($data['password']) . $salt;

        $this->userModel->save([
            'username' => $data['username'],
            'password' => $password,
            'salt' => $salt,
            'role' => 2
        ]);

        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to(base_url('/auth/login'));
    }

    public function valid_login()
    {
        $data = $this->request->getPost();

        $user = $this->userModel->where('username', $data['username'])->first();

        if ($user) {
            if ($user['password'] != md5($data['password']) . $user['salt']) {
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to(base_url('/auth/login'));
            } else {
                $sessLogin = [
                    'isLogin' => true,
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                $this->session->set($sessLogin);

                if ($sessLogin['role'] == '1') {
                  return redirect()->to(base_url('/admin'));
                } else {
                  return redirect()->to(base_url('/user'));
                }
            }
        } else {
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to(base_url('/auth/login'));
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/auth/login'));
    }
}
