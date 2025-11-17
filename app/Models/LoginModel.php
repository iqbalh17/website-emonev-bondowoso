<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $DBGroup = 'login';
    protected $table = 'login';
    protected $allowedFields = ['nama', 'password'];

    public function login($nama)
    {
        return $this->where(["nama" => $nama])->first();
    }

    // public function ubah($id)
    // {

    // }

    public function search($keyword)
    {
        $result = 'halo';

        return $result;
    }
}
