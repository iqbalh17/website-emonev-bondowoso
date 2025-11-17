<?php

namespace App\Controllers;

use \App\Models\JadwalModel;

use CodeIgniter\I18n\Time;

class Jadwal extends BaseController
{
    protected $jadwalModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->jadwalModel->setTable('jadwal_' . session()->get('tahunAdmin'));
    }

    public function index()
    {
        // $this->jadwalModel->setTable('jadwal_2021');
        $result = $this->jadwalModel->findAll();


        $i = 0;

        foreach ($result as $r) {
            $hasil = [];
            $awal = Time::createFromFormat('Y-m-d', "{$r['awal']}", 'Asia/Jakarta');
            $akhir = Time::createFromFormat('Y-m-d', "{$r['akhir']}", 'Asia/Jakarta');

            $result[$i]['awal'] = $awal->toLocalizedString('dd-MM-yyyy');
            $result[$i]['akhir'] = $akhir->toLocalizedString('dd-MM-yyyy');

            $i++;
        }


        $data = [
            'css' => 'jadwal',
            'title' => 'Jadwal',
            'nav' => false,
            'js'  => 'jadwal',
            'result' => $result
        ];

        return view('admin/jadwal', $data);
    }

    public function ambilData()
    {
        $jenis = $this->request->getVar('jenis');

        // dd($this->request->getPost());

        $result = $this->jadwalModel->where(['triwulan' => $jenis])->first();

        echo json_encode($result);
    }

    public function tambah($id)
    {
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');

        $data = [
            'akhir' => $akhir,
            'awal'  => $awal
        ];

        $this->jadwalModel->update($id, $data);

        session()->setFlashData('berhasil', 'Tanggal berhasil diubah');
        return redirect()->to('/admin/jadwal');
    }

    public function aktivasi()
    {
        $dataLama = $this->jadwalModel->where(['status' => 'active'])->first();

        $gantiDataLama = [
            'status' => 'not active'
        ];

        $this->jadwalModel->update($dataLama['id'], $gantiDataLama);

        $dataBaru = $this->request->getPost('id');

        $gantiDataBaru = [
            'status' => 'active'
        ];

        $this->jadwalModel->update($this->request->getPost('id'), $gantiDataBaru);

        $result = $this->jadwalModel->find($this->request->getPost('id'));

        echo json_encode($result);
    }
}
