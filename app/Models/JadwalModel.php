<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $DBGroup = 'admin';
    protected $table;
    protected $allowedFields = ['awal', 'akhir', 'status'];

    public function setTable(string $table)
    {
        $this->table = $table;
    }
}
