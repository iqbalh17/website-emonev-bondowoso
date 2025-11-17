<?php

namespace App\Controllers;

use \App\Models\LoginModel;

class Admin extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'login admin',
            'css'   => 'login',
            'nav'  => false,
            'js'    => 'loginAdmin'
        ];

        return view('admin/login', $data);
    }

    public function masuk()
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required'
            ]
        ])) {
            return redirect()->to('/admin');
        }

        $loginModel = new LoginModel();

        $result = $loginModel->where(['nama' => $this->request->getVar('username')])->first();

        if (password_verify($this->request->getVar('password'), $result['password'])) {
            session()->set([
                'loginAdmin' => true
            ]);
            return redirect()->to('/admin/tahun');
        } else {
            session()->setFlashData('pesan', 'password salah');
            return redirect()->to('/admin');
        }
    }

    public function home()
    {
        if (!session()->get('tahunAdmin')) {
            session()->set([
                'tahunAdmin' => date('Y')
            ]);
        }

        $data = [
            'title' => 'Home Admin',
            'nav'  => false,
            'css'   => 'home'
        ];

        return view('admin/home', $data);
    }

    public function logout()
    {
        session()->remove(['loginAdmin', 'tahunAdmin']);
        return redirect()->to('/admin');
    }

    public function tahun()
    {
        $data = [
            'css' => 'tahun',
            'title' => 'pilih tahun',
            'nav'  => false
        ];

        return view('admin/tahun', $data);
    }

    public function pilihTahun($tahun)
    {
        session()->set([
            'tahunAdmin' => $tahun
        ]);

        return redirect()->to('/admin/home');
    }
}
