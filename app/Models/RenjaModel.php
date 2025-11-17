<?php

namespace App\Models;

use CodeIgniter\Model;

class RenjaModel extends Model
{
    protected $DBGroup = 'evaluasi_renja_2021';
    protected $table;
    protected $useTimestamps = true;
    protected $allowedFields = ['jenis', 'dokumen', 'ttd', 'nama', 'nip'];

    public function getSemuaYA()
    {
        return $this->findAll();
    }

    public function setDBGroup(string $DBGroup)
    {
        $this->DBGroup = $DBGroup;
    }

    public function setTable(string $table)
    {
        $this->table = $table;
    }

    public function getDBGroup()
    {
        return $this->DBGroup;
    }
}
