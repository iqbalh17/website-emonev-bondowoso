<?php

namespace App\Controllers;

use \App\Models\RenjaModel;

class Evaluasi_Renja extends BaseController
{
    protected $renjaModel;

    public function __construct()
    {
        $this->renjaModel = new RenjaModel;
        $this->renjaModel->setTable(session()->get('tabel'));
    }

    public function index()
    {
        $daftar = $this->renjaModel->findAll();
        // dd($daftar);

        $data = [
            'daftar' => $daftar,
            'title' => 'Evaluasi Renja',
            'css'   => 'renja',
            'js'    => 'renja',
            'validation' => \Config\Services::validation(),
            'timer' => true
        ];

        return view('renja/index', $data);
    }

    public function tambah()
    {
        if (!waktuAktif()) {
            session()->setFlashData('timeout', 'Maaf waktu sudah habis');
            return redirect()->to('/evaluasi_renja');
        }

        if (!$this->validate([
            "dokumen" => [
                'rules' => 'uploaded[dokumen]|max_size[dokumen,10485760]|mime_in[dokumen,application/vnd.ms-excel,application/msexcel,application/x-msexcel,application/x-ms-excel,application/x-excel,application/x-dos_ms_excel,application/xls,application/x-xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]|ext_in[dokumen,xlsx,xls]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in'  => 'File harus excel',
                    'mime_in' => 'File harus excel',
                    'uploaded' => 'Harus di isi'
                ]
            ],
            "ttd" => [
                'rules' => 'uploaded[ttd]|max_size[ttd,10485760]|is_image[ttd]|mime_in[ttd,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'uploaded' => 'Harus di isi',
                    'is_image' => 'File harus foto'
                ]
            ],
            "NIP" => [
                'rules' => 'numeric|min_length[18]|max_length[18]',
                'errors' => [
                    'numeric' => 'NIP harus angka',
                    'min_length' => 'NIP minimal 18 karakter',
                    'max_length' => 'NIP maksimal 18 karakter'
                ]
            ]
        ])) {
            session()->setFlashData('cek', true);
            return redirect()->to('/evaluasi_renja')->withInput();
        }

        $fileDokumen = $this->request->getFile('dokumen');
        $fileTTD = $this->request->getFile('ttd');

        $extDokumen = $fileDokumen->guessExtension();

        $namaDokumen = $this->request->getVar('jenis') . '_' . uniqid() . '.' . $extDokumen;
        $fileDokumen->move('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/dokumen/', $namaDokumen);

        $extTTD = $fileTTD->guessExtension();

        $namaTTD = $this->request->getVar('jenis') . '_' . uniqid() . '.' . $extTTD;
        $fileTTD->move('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/ttd/', $namaTTD);

        $this->renjaModel->save([
            "jenis" => $this->request->getVar('jenis'),
            "dokumen" => $namaDokumen,
            "ttd" => $namaTTD,
            "nama" => $this->request->getVar('namaPA'),
            "nip" => $this->request->getVar('NIP')
        ]);

        session()->setFlashData('berhasil', 'Data berhasil Disimpan');

        return redirect()->to('/evaluasi_renja');
    }

    public function delete($id)
    {
        $data = $this->renjaModel->find($id);

        unlink('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/dokumen/' . $data["dokumen"]);
        unlink('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/ttd/' . $data["ttd"]);

        $this->renjaModel->delete($id);
        session()->setFlashData('berhasil', 'Data berhasil dihapus');
        return redirect()->to('/evaluasi_renja');
    }

    public function edit($id)
    {
        if (!waktuAktif()) {
            session()->setFlashData('timeout', 'Maaf waktu sudah habis');
            return redirect()->to('/evaluasi_renja');
        }

        $result = $this->renjaModel->where(['id' => $id])->first();
        if ($result == null) {
            return redirect()->to('/evaluasi_renja');
        }

        $tri = explode(' ', $result['jenis']);
        $tri = end($tri);

        if (!cekTriwulan($tri)) {
            session()->setFlashData('timeout', 'Maaf waktu sudah habis');
            return redirect()->to('/evaluasi_renja');
        }


        if (!$this->validate([
            "dokumen" => [
                'rules' => 'max_size[dokumen,10485760]|mime_in[dokumen,application/vnd.ms-excel,application/msexcel,application/x-msexcel,application/x-ms-excel,application/x-excel,application/x-dos_ms_excel,application/xls,application/x-xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]|ext_in[dokumen,xlsx,xls]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in'  => 'File harus excel',
                    'mime_in' => 'File harus excel'
                ]
            ],
            "ttd" => [
                'rules' => 'max_size[ttd,10485760]|is_image[ttd]|mime_in[ttd,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            "NIP" => [
                'rules' => 'numeric|min_length[18]|max_length[18]',
                'errors' => [
                    'numeric' => 'NIP harus angka',
                    'min_length' => 'NIP minimal 18 karakter',
                    'max_length' => 'NIP maksimal 18 karakter'
                ]
            ]
        ])) {
            session()->setFlashData('idedit', $id);
            session()->setFlashData('edit', true);
            session()->setFlashData('cek', true);
            return redirect()->to('/evaluasi_renja')->withInput();
        }

        $dokumenFile = $this->request->getFile('dokumen');
        $ttdFile = $this->request->getFile('ttd');

        if ($dokumenFile->getError() == 4) {
            $namaDokumen = $result['dokumen'];
        } else {
            $extDokumen = $dokumenFile->guessExtension();

            $namaDokumen = $this->request->getVar('jenis') . '_' . uniqid() . '.' . $extDokumen;
            $dokumenFile->move('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/dokumen/', $namaDokumen);
            unlink('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/dokumen/' . $result['dokumen']);
        }

        if ($ttdFile->getError() == 4) {
            $namaTTD = $result['ttd'];
        } else {
            $ext = $ttdFile->guessExtension();

            $namaTTD = $this->request->getVar('jenis') . '_' . uniqid() . '.' . $ext;
            $ttdFile->move('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/ttd/', $namaTTD);
            unlink('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/ttd/' . $result['ttd']);
        }

        $this->renjaModel->save([
            'id' => $id,
            "jenis" => $this->request->getVar('jenis'),
            "dokumen" => $namaDokumen,
            "ttd" => $namaTTD,
            "nama" => $this->request->getVar('namaPA'),
            "nip" => $this->request->getVar('NIP')
        ]);

        session()->setFlashData('berhasil', 'Data Berhasil Diubah');
        return redirect()->to('/evaluasi_renja');
    }

    public function spoof()
    {
        return redirect()->to('/evaluasi_renja');
    }


    public function download($id)
    {
        $result = $this->renjaModel->find($id);

        $namaFile = $result['dokumen'];

        $ext = explode('.', $namaFile);

        $ext = end($ext);

        return $this->response->download('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/dokumen/' . $result['dokumen'], null)->setFileName($result['jenis'] . '.' . $ext);
    }

    public function downloadTTD($id)
    {
        $result = $this->renjaModel->find($id);

        $namaFile = $result['ttd'];

        $ext = explode('.', $namaFile);

        $ext = end($ext);

        return $this->response->download('renja/' . session()->get('tahun') . '/' . session()->get('tabel') . '/ttd/' . $result['ttd'], null)->setFileName($result['jenis'] . '.' . $ext);
    }

    public function ambilData()
    {
        $result = $this->renjaModel->find($this->request->getPost('id'));

        echo json_encode($result);
    }
}
