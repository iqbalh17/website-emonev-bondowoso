<?php

namespace App\Controllers;

use \App\Models\MonevModel;

// use \Mpdf\Mpdf;

class Evaluasi_Monev_Lapangan extends BaseController
{
    protected $monevModel;

    public function __construct()
    {
        $this->monevModel = new MonevModel();
        $this->monevModel->setTable(session()->get('tabel'));
    }

    public function index()
    {
        $daftar = $this->monevModel->findAll();

        $data = [
            'title' => 'Evaluasi Monev Lapangan',
            'css'   => 'monev',
            'js'    => 'monev',
            'timer' => true,
            'validation' => \Config\Services::validation(),
            'daftar' => $daftar
        ];

        return view('monev/index', $data);
    }

    public function tambah()
    {
        if (!waktuAktif()) {
            session()->setFlashData('timeout', 'Maaf waktu sudah habis');
            return redirect()->to('/evaluasi_monev_lapangan');
        }

        if (!$this->validate([
            'program' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            'kegiatan' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            'subkegiatan' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],

            'anggaran' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            'alamat' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            "nomorkontrak" => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            "nilaikontrak" => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            "pelaksana" => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            //triwulan 1
            'fotoTriI1' => [
                'rules' => 'max_size[fotoTriI1,2097152]|is_image[fotoTriI1]|mime_in[fotoTriI1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            'fotoTriI2' => [
                'rules' => 'max_size[fotoTriI2,2097152]|is_image[fotoTriI2]|mime_in[fotoTriI2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            //triw1ulan 2
            'fotoTriII1' => [
                'rules' => 'max_size[fotoTriII1,2097152]|is_image[fotoTriII1]|mime_in[fotoTriII1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            'fotoTriII2' => [
                'rules' => 'max_size[fotoTriII2,2097152]|is_image[fotoTriII2]|mime_in[fotoTriII2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            //triwulan 3
            'fotoTriIII1' => [
                'rules' => 'max_size[fotoTriIII1,2097152]|is_image[fotoTriIII1]|mime_in[fotoTriIII1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            'fotoTriIII2' => [
                'rules' => 'max_size[fotoTriIII2,2097152]|is_image[fotoTriIII2]|mime_in[fotoTriIII2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            //triwulan 4
            'fotoTriIV1' => [
                'rules' => 'max_size[fotoTriIV1,2097152]|is_image[fotoTriIV1]|mime_in[fotoTriIV1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            'fotoTriIV2' => [
                'rules' => 'max_size[fotoTriIV2,2097152]|is_image[fotoTriIV2]|mime_in[fotoTriIV2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ]
        ])) {
            session()->setFlashData('cek', true);
            return redirect()->to('/evaluasi_monev_lapangan')->withInput();
        }

        if (!cekPerkejaan($this->request->getVar('pekerjaan'))) {
            session()->setFlashData('errorPekerjaan', 'Pekerjaan sudah ada');
            session()->setFlashData('cek', true);
            return redirect()->to('/evaluasi_monev_lapangan')->withInput();
        }

        $fileFotoTriI1 =  $this->request->getFile('fotoTriI1');
        $fileFotoTriI2 =  $this->request->getFile('fotoTriI2');
        $fileFotoTriII1 =  $this->request->getFile('fotoTriII1');
        $fileFotoTriII2 =  $this->request->getFile('fotoTriII2');
        $fileFotoTriIII1 =  $this->request->getFile('fotoTriIII1');
        $fileFotoTriIII2 =  $this->request->getFile('fotoTriIII2');
        $fileFotoTriIV1 =  $this->request->getFile('fotoTriIV1');
        $fileFotoTriIV2 =  $this->request->getFile('fotoTriIV2');

        mkdir('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan'));

        $data = [
            'program' => $this->request->getVar('program'),
            'kegiatan' => $this->request->getVar('kegiatan'),
            'subkegiatan' => $this->request->getVar('subkegiatan'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'anggaran' => $this->request->getVar('anggaran'),
            'alamatLokasi' => $this->request->getVar('alamat'),
            'nomorKontrak' => $this->request->getVar('nomorkontrak'),
            'nilaiKontrak' => $this->request->getVar('nilaikontrak'),
            'pelaksana' => $this->request->getVar('pelaksana'),
            'PerFisI' => $this->request->getVar('PerFisI'),
            'PerFisII' => $this->request->getVar('PerFisII'),
            'PerFisIII' => $this->request->getVar('PerFisIII'),
            'PerFisIV' => $this->request->getVar('PerFisIV'),
            'realKeuI' => $this->request->getVar('realKeuI'),
            'realKeuII' => $this->request->getVar('realKeuII'),
            'realKeuIII' => $this->request->getVar('realKeuIII'),
            'realKeuIV' => $this->request->getVar('realKeuIV'),
            'totaluang' => $this->request->getVar('total')
        ];

        if ($fileFotoTriI1 != null) {
            if ($fileFotoTriI1->getError() != 4) {
                $ext = $fileFotoTriI1->guessExtension();
                $namaFotoTriI1 = 'triwulanI_1_' . uniqid() . '.' . $ext;
                $fileFotoTriI1->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriI1);
                $data['fotoTriI1'] = $namaFotoTriI1;
            }
        }

        if ($fileFotoTriI2 != null) {
            if ($fileFotoTriI2->getError() != 4) {
                $ext = $fileFotoTriI2->guessExtension();
                $namaFotoTriI2 = 'triwulanI_2_' . uniqid() . '.' . $ext;
                $fileFotoTriI2->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriI2);
                $data['fotoTriI2'] = $namaFotoTriI2;
            }
        }

        if ($fileFotoTriII1 != null) {
            if ($fileFotoTriII1->getError() != 4) {
                $ext = $fileFotoTriII1->guessExtension();
                $namaFotoTriII1 = 'triwulanII_1_' . uniqid() . '.' . $ext;
                $fileFotoTriII1->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriII1);
                $data['fotoTriII1'] = $namaFotoTriII1;
            }
        }

        if ($fileFotoTriII2 != null) {
            if ($fileFotoTriII2->getError() != 4) {
                $ext = $fileFotoTriII2->guessExtension();
                $namaFotoTriII2 = 'triwulanII_2_' . uniqid() . '.' . $ext;
                $fileFotoTriII2->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriII2);
                $data['fotoTriII2'] = $namaFotoTriII2;
            }
        }

        if ($fileFotoTriIII1 != null) {
            if ($fileFotoTriIII1->getError() != 4) {
                $ext = $fileFotoTriIII1->guessExtension();
                $namaFotoTriIII1 = 'triwulanIII_1_' . uniqid() . '.' . $ext;
                $fileFotoTriIII1->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriIII1);
                $data['fotoTriIII1'] = $namaFotoTriIII1;
            }
        }

        if ($fileFotoTriIII2 != null) {
            if ($fileFotoTriIII2->getError() != 4) {
                $ext = $fileFotoTriIII2->guessExtension();
                $namaFotoTriIII2 = 'triwulanIII_2_' . uniqid() . '.' . $ext;
                $fileFotoTriIII2->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriIII2);
                $data['fotoTriIII2'] = $namaFotoTriIII2;
            }
        }

        if ($fileFotoTriIV1 != null) {
            if ($fileFotoTriIV1->getError() != 4) {
                $ext = $fileFotoTriIV1->guessExtension();
                $namaFotoTriIV1 = 'triwulanIV_1_' . uniqid() . '.' . $ext;
                $fileFotoTriIV1->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriIV1);
                $data['fotoTriIV1'] = $namaFotoTriIV1;
            }
        }

        if ($fileFotoTriIV2 != null) {
            if ($fileFotoTriIV2->getError() != 4) {
                $ext = $fileFotoTriIV2->guessExtension();
                $namaFotoTriIV2 = 'triwulanIV_2_' . uniqid() . '.' . $ext;
                $fileFotoTriIV2->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriIV2);
                $data['fotoTriIV2'] = $namaFotoTriIV2;
            }
        }

        $this->monevModel->insert($data);

        session()->setFlashData('berhasil', 'Data berhasil Disimpan');

        return redirect()->to('/evaluasi_monev_lapangan');
    }

    public function delete($id)
    {
        $result = $this->monevModel->find($id);

        delete_directory('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' .  $result['pekerjaan']);

        $this->monevModel->delete($id);

        session()->setFlashData('berhasil', 'Data berhasil Dihapus');

        return redirect()->to('/evaluasi_monev_lapangan');
    }

    public function edit($id)
    {
        if (!waktuAktif()) {
            session()->setFlashData('timeout', 'Maaf waktu sudah habis');
            return redirect()->to('/evaluasi_monev_lapangan');
        }

        $result = $this->monevModel->where(['id' => $id])->first();
        if ($result == null) {
            return redirect()->to('/evaluasi_monev_lapangan');
        }

        if (!$this->validate([
            'program' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            'kegiatan' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            'subkegiatan' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],

            'anggaran' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            'alamat' => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            "nomorkontrak" => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            "nilaikontrak" => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

            "pelaksana" => [
                'rule' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            //triwulan 1
            'fotoTriI1' => [
                'rules' => 'max_size[fotoTriI1,2097152]|is_image[fotoTriI1]|mime_in[fotoTriI1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            'fotoTriI2' => [
                'rules' => 'max_size[fotoTriI2,2097152]|is_image[fotoTriI2]|mime_in[fotoTriI2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            //triw1ulan 2
            'fotoTriII1' => [
                'rules' => 'max_size[fotoTriII1,2097152]|is_image[fotoTriII1]|mime_in[fotoTriII1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            'fotoTriII2' => [
                'rules' => 'max_size[fotoTriII2,2097152]|is_image[fotoTriII2]|mime_in[fotoTriII2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            //triwulan 3
            'fotoTriIII1' => [
                'rules' => 'max_size[fotoTriIII1,2097152]|is_image[fotoTriIII1]|mime_in[fotoTriIII1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            'fotoTriIII2' => [
                'rules' => 'max_size[fotoTriIII2,2097152]|is_image[fotoTriIII2]|mime_in[fotoTriIII2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            //triwulan 4
            'fotoTriIV1' => [
                'rules' => 'max_size[fotoTriIV1,2097152]|is_image[fotoTriIV1]|mime_in[fotoTriIV1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ],
            'fotoTriIV2' => [
                'rules' => 'max_size[fotoTriIV2,2097152]|is_image[fotoTriIV2]|mime_in[fotoTriIV2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'mime_in' => 'File harus foto',
                    'is_image' => 'File harus foto'
                ]
            ]
        ])) {
            session()->setFlashData('cek', true);
            return redirect()->to('/evaluasi_monev_lapangan')->withInput();
        }

        if (!cekPerkejaan($this->request->getVar('pekerjaan', true))) {
            session()->setFlashData('errorPekerjaan', 'Pekerjaan sudah ada');
            session()->setFlashData('cek', true);
            return redirect()->to('/evaluasi_monev_lapangan')->withInput();
        }

        if ($result['pekerjaan'] != $this->request->getVar('pekerjaan')) {
            rename('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $result['pekerjaan'], 'monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan'));
        }

        $fileFotoTriI1 =  $this->request->getFile('fotoTriI1');
        $fileFotoTriI2 =  $this->request->getFile('fotoTriI2');
        $fileFotoTriII1 =  $this->request->getFile('fotoTriII1');
        $fileFotoTriII2 =  $this->request->getFile('fotoTriII2');
        $fileFotoTriIII1 =  $this->request->getFile('fotoTriIII1');
        $fileFotoTriIII2 =  $this->request->getFile('fotoTriIII2');
        $fileFotoTriIV1 =  $this->request->getFile('fotoTriIV1');
        $fileFotoTriIV2 =  $this->request->getFile('fotoTriIV2');

        $data = [
            'program' => $this->request->getVar('program'),
            'kegiatan' => $this->request->getVar('kegiatan'),
            'subkegiatan' => $this->request->getVar('subkegiatan'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'anggaran' => $this->request->getVar('anggaran'),
            'alamatLokasi' => $this->request->getVar('alamat'),
            'nomorKontrak' => $this->request->getVar('nomorkontrak'),
            'nilaiKontrak' => $this->request->getVar('nilaikontrak'),
            'pelaksana' => $this->request->getVar('pelaksana'),
            'PerFisI' => $this->request->getVar('PerFisI'),
            'PerFisII' => $this->request->getVar('PerFisII'),
            'PerFisIII' => $this->request->getVar('PerFisIII'),
            'PerFisIV' => $this->request->getVar('PerFisIV'),
            'realKeuI' => $this->request->getVar('realKeuI'),
            'realKeuII' => $this->request->getVar('realKeuII'),
            'realKeuIII' => $this->request->getVar('realKeuIII'),
            'realKeuIV' => $this->request->getVar('realKeuIV'),
            'totaluang' => $this->request->getVar('total')
        ];

        if ($fileFotoTriI1 != null) {
            if ($fileFotoTriI1->getError() != 4) {
                $ext = $fileFotoTriI1->guessExtension();
                $namaFotoTriI1 = 'triwulanI_1_' . uniqid() . '.' . $ext;
                unlink('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $result['fotoTriI1']);
                $fileFotoTriI1->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriI1);
                $data['fotoTriI1'] = $namaFotoTriI1;
            }
        }

        if ($fileFotoTriI2 != null) {
            if ($fileFotoTriI2->getError() != 4) {
                $ext = $fileFotoTriI2->guessExtension();
                $namaFotoTriI2 = 'triwulanI_2_' . uniqid() . '.' . $ext;
                unlink('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $result['fotoTriI2']);
                $fileFotoTriI2->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriI2);
                $data['fotoTriI2'] = $namaFotoTriI2;
            }
        }

        if ($fileFotoTriII1 != null) {
            if ($fileFotoTriII1->getError() != 4) {
                $ext = $fileFotoTriII1->guessExtension();
                $namaFotoTriII1 = 'triwulanII_1_' . uniqid() . '.' . $ext;
                unlink('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $result['fotoTriII1']);
                $fileFotoTriII1->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriII1);
                $data['fotoTriII1'] = $namaFotoTriII1;
            }
        }

        if ($fileFotoTriII2 != null) {
            if ($fileFotoTriII2->getError() != 4) {
                $ext = $fileFotoTriII2->guessExtension();
                $namaFotoTriII2 = 'triwulanII_2_' . uniqid() . '.' . $ext;
                unlink('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $result['fotoTriII2']);
                $fileFotoTriII2->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriII2);
                $data['fotoTriII2'] = $namaFotoTriII2;
            }
        }

        if ($fileFotoTriIII1 != null) {
            if ($fileFotoTriIII1->getError() != 4) {
                $ext = $fileFotoTriIII1->guessExtension();
                $namaFotoTriIII1 = 'triwulanIII_1_' . uniqid() . '.' . $ext;
                unlink('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $result['fotoTriIII1']);
                $fileFotoTriIII1->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriIII1);
                $data['fotoTriIII1'] = $namaFotoTriIII1;
            }
        }

        if ($fileFotoTriIII2 != null) {
            if ($fileFotoTriIII2->getError() != 4) {
                $ext = $fileFotoTriIII2->guessExtension();
                $namaFotoTriIII2 = 'triwulanIII_2_' . uniqid() . '.' . $ext;
                unlink('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $result['fotoTriIII2']);
                $fileFotoTriIII2->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriIII2);
                $data['fotoTriIII2'] = $namaFotoTriIII2;
            }
        }

        if ($fileFotoTriIV1 != null) {
            if ($fileFotoTriIV1->getError() != 4) {
                $ext = $fileFotoTriIV1->guessExtension();
                $namaFotoTriIV1 = 'triwulanIV_1_' . uniqid() . '.' . $ext;
                unlink('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $result['fotoTriIV1']);
                $fileFotoTriIV1->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriIV1);
                $data['fotoTriIV1'] = $namaFotoTriIV1;
            }
        }

        if ($fileFotoTriIV2 != null) {
            if ($fileFotoTriIV2->getError() != 4) {
                $ext = $fileFotoTriIV2->guessExtension();
                $namaFotoTriIV2 = 'triwulanIV_2_' . uniqid() . '.' . $ext;
                unlink('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $result['fotoTriIV2']);
                $fileFotoTriIV2->move('monev/' . session()->get('tahun') . '/' . session()->get('tabel') . '/' . $this->request->getVar('pekerjaan') . '/', $namaFotoTriIV2);
                $data['fotoTriIV2'] = $namaFotoTriIV2;
            }
        }

        $this->monevModel->update($id, $data);

        session()->setFlashData('berhasil', 'Data berhasil Diubah');

        return redirect()->to('/evaluasi_monev_lapangan');
    }

    public function ambilData()
    {
        $id = $this->request->getPost('id');

        $result = $this->monevModel->find($id);

        $result['tahun'] = session()->get('tahun');

        $result['opd'] = session()->get('tabel');

        echo json_encode($result);
    }

    public function exportPdf($id)
    {
        $mpdf = new \Mpdf\Mpdf(['debug' => FALSE, 'mode' => 'utf-8', 'orientation' => 'P']);

        $result = $this->monevModel->find($id);
        $page = view('monev/mpdf', ['result' => $result]);
        $mpdf->WriteHTML($page);
        return redirect()->to($mpdf->Output('gabut.pdf', 'I'));
    }

    public function spoof()
    {
        return redirect()->to('/evaluasi_monev_lapangan');
    }
}
