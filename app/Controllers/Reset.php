<?php

namespace App\Controllers;

use \App\Models\LoginModel;

class Reset extends BaseController
{
    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        $result = $this->loginModel->findAll();

        $data = [
            'nav' => false,
            'css'  => 'rsandi',
            'title' => 'Reset Sandi',
            'nama'  => $result,
            'js'    => 'rsandi'
        ];

        return view('admin/rsandi', $data);
    }

    public function halo()
    {
        // sleep(3);

        $result = $this->loginModel->like('nama', $this->request->getVar('keyword'))->findAll();

        $i = 1;

        $output = '';

        if ($result != null) {
            foreach ($result as $r) {
                $output .= '
            <tr>
            <th scope="row">' . $i++ . '</th>
            <td>' . $r['nama'] . '</td>
            <td> 
                <button class="btn-danger btn-sm resetbutton" data-bs-toggle="modal" data-bs-target="#resetpopup" data-id="' . $r['id'] . '"><i class="fas fa-sync-alt"></i></button>
            </td>
            </tr>';
            }
        } else {
            $output .= '
            <tr>
            <td colspan="4" class="text-center">nama OPD tidak tersedia</td>
            </tr>';
        }

        return $output;
    }

    public function reset($id)
    {
        $this->loginModel->where(['id' => $id]);
        $result = $this->loginModel->findColumn('nama');

        if ($result[0] == 'admin') {
            $data = [
                'password' => password_hash('skpdokAdmin', PASSWORD_DEFAULT)
            ];

            $this->loginModel->update($id, $data);

            session()->setFlashData('berhasil', 'sandi <strong>' . $result[0] . '</strong> berhasil direset');
            return redirect()->to('/admin/reset_sandi');
        }

        $data = [
            'password' => password_hash('skpdok', PASSWORD_DEFAULT)
        ];

        $this->loginModel->update($id, $data);

        session()->setFlashData('berhasil', 'sandi <strong>' . $result[0] . '</strong> berhasil direset');
        return redirect()->to('/admin/reset_sandi');
    }

    public function spoof()
    {
        return redirect()->to('/admin/reset_sandi');
    }
}
