<?php

use App\Controllers\Jadwal;
use \App\Models\JadwalModel;
use \App\Models\MonevModel;


use CodeIgniter\I18n\Time;

// $now = Time::now('Asia/Jakarta', 'id_ID');
// $awalTahunDepan = Time::createFromFormat('Y-m-d', "{$now->addYears(1)}-", 'Asia/Jakarta');

// if ($now->subYears(1)->getYear() == session()->get('tahun') && ) {
// }


function namaOPD()
{
    return session()->get('nama');
};

function isAdmin($role)
{
    if ($role == "admin") {
        return true;
    } else {
        return false;
    }
};

function needNav(bool $stat = true)
{
    if ($stat == true) {
        return true;
    }

    return false;
};

function getRole()
{
    return session()->get('role');
}

function getTabel()
{
    return session()->get("tabel");
}

function waktuAktif()
{
    $now = Time::now('Asia/Jakarta', 'id_ID');

    $jadwalModel = new JadwalModel;
    $jadwalModel->setTable('jadwal_' . session()->get('tahun'));

    $result = $jadwalModel->where(['status' => 'active'])->first();

    $jadwalAktif = [
        'awal' => $result['awal'],
        'akhir' => $result['akhir']
    ];

    $jadwalAwal = Time::createFromFormat('Y-m-d', "{$jadwalAktif['awal']}", 'Asia/Jakarta');
    $jadwalAkhir = Time::createFromFormat('Y-m-d', "{$jadwalAktif['akhir']}", 'Asia/Jakarta');

    if ($now->isBefore($jadwalAkhir->addDays(1)) && $now->isAfter($jadwalAwal)) {
        return true;
    }

    return false;
}

function checkJadwal($id)
{
    $jadwalModel = new JadwalModel();
    $jadwalModel->setTable('jadwal_' . session()->get('tahun'));

    $result = $jadwalModel->find($id);

    $now = Time::now('Asia/Jakarta', 'id_ID');



    $awalTime = Time::createFromFormat('Y-m-d', $result['awal'], 'Asia/Jakarta');
    $akhirTime = Time::createFromFormat('Y-m-d', $result['akhir'], 'Asia/Jakarta');
    $akhirTime = $akhirTime->addDays(1);

    if ($now->isBefore($akhirTime)) {
        return true;
    }

    return false;
}

function getJadwal()
{
    $jadwalModel = new JadwalModel();
    $jadwalModel->setTable('jadwal_' . session()->get('tahun'));

    $result = $jadwalModel->where(['status' => 'active'])->findColumn('triwulan');

    $result = explode(' ', $result[0]);

    $result = end($result);

    return $result;
}

function cekStringLen($strlen)
{
    if ($strlen >= 37) {
        return 'fs-5';
    } elseif ($strlen >= 19) {
        return 'fs-4';
    } else {
        return 'fs-3';
    }
}

function cekTriwulan($triwulan)
{
    $jadwalModel = new JadwalModel();
    $jadwalModel->setTable('jadwal_' . session()->get('tahun'));

    $result = $jadwalModel->where(['status' => 'active'])->first();

    $tri = explode(' ', $result['triwulan']);

    $tri = end($tri);

    if ($triwulan == $tri) {
        return true;
    }

    return false;
}

function getAkhir()
{
    $jadwalModel = new JadwalModel();
    $jadwalModel->setTable('jadwal_' . session()->get('tahun'));

    $result = $jadwalModel->where(['status' => 'active'])->first();

    $result = explode('-', $result['akhir']);

    $result = [$result[1], $result[2], $result[0]];

    $result = implode('/', $result);

    return $result;
}

function delete_directory($dirname)
{
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while ($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname . "/" . $file))
                unlink($dirname . "/" . $file);
            else
                delete_directory($dirname . '/' . $file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}

function cekPerkejaan($pekerjaan, $id = false)
{
    $monevModel = new MonevModel();
    $monevModel->setTable(session()->get('tabel'));

    if ($id) {
        $result = $monevModel->findAll();

        if ($result != null) {
            foreach ($result as $r) {
                if ($r['pekerjaan'] == $pekerjaan && $r['id'] != $id) {
                    return false;
                }
            }
        }

        return true;
    } else {
        $result = $monevModel->findColumn('pekerjaan');

        if ($result != null) {
            foreach ($result as $r) {
                if ($r == $pekerjaan) {
                    return false;
                }
            }
        }

        return true;
    }
}
