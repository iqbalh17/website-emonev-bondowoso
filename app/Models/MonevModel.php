<?php

namespace App\Models;

use CodeIgniter\Model;

class MonevModel extends Model
{
    protected $DBGroup = 'evaluasi_monev_lapangan_2021';
    protected $table;
    protected $useTimestamps = true;
    protected $allowedFields = ['program', 'kegiatan', 'subkegiatan', 'pekerjaan', 'anggaran', 'alamatLokasi', 'nomorKontrak', 'nilaiKontrak', 'pelaksana', 'PerFisI', 'PerFisII', 'PerFisIII', 'PerFisIV', 'realKeuI', 'realKeuII', 'realKeuIII', 'realKeuIV', 'totaluang', 'fotoTriI1', 'fotoTriI2', 'fotoTriII1', 'fotoTriII2', 'fotoTriIII1', 'fotoTriIII2', 'fotoTriIV1', 'fotoTriIV2'];
}
