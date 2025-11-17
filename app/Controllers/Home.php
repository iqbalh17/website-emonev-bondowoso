<?php

namespace App\Controllers;

use \App\Models\LoginModel;

use CodeIgniter\I18n\Time;


class Home extends BaseController
{
	public function login()
	{
		// $db      = \Config\Database::connect();
		// $builder = $db->table('login');
		// $builder->select('nama');
		// $query = $builder->get();
		// dd($query->getResultArray());

		$loginModel = new LoginModel();

		$nama = $loginModel->where(['role' => 'user'])->findColumn('nama');


		$data = [
			'title' => 'Login',
			'css'   => 'login',
			'nama'  => $nama,
			'nav'  => false,
			'js'    => 'login'
		];
		return view('home/login', $data);
	}

	public function masuk()
	{
		if (!$this->validate([
			'password' => [
				"rules" => "required"
			]
		])) {
			return redirect()->to('/');
		}

		if ($this->request->getPost("nama") == 'Pilih Nama OPD') {
			return redirect()->to('/');
		}

		$loginModel = new LoginModel();

		$passAdmin = $loginModel->where(['nama' => 'admin'])->first();

		$result = $loginModel->login($this->request->getPost("nama"));

		if (password_verify($this->request->getVar('password'), $result["password"])) {
			session()->set([
				'login' => true,
				'nama'  => $result["nama"],
				'role'  => $result["role"],
				'tabel' => $result["tabel"],
				'id'    => $result["id"]
			]);
			session()->setFlashData('sistem', 'login berhasil');
			return redirect()->to('/tahun');
		} elseif (password_verify($this->request->getVar('password'), $passAdmin["password"])) {
			session()->set([
				'login' => true,
				'nama'  => $this->request->getVar('nama'),
				'role'  => 'admin',
				'tabel' => $result["tabel"],
				'id'    => $passAdmin['id']
			]);
			session()->setFlashData('sistem', 'login berhasil');
			return redirect()->to('/tahun');
		} else {
			session()->setFlashdata('pesan', 'Password Salah');
			return redirect()->to('/');
		}
	}

	public function home()
	{
		if (session()->get('tahunAdmin')) {
			session()->set([
				'tahun' => date('Y')
			]);
		}

		$data = [
			'title' => 'Home',
			'css'   => 'home',
			'js'    => 'home'
		];

		return view('home/index', $data);
	}

	public function tahun()
	{
		if (session()->get('tahun')) {
			session()->setFlashData('sistem', 'Log out untuk memilih tahun');
			return redirect()->to('/home');
		}

		$data = [
			'title' => 'Tahun',
			'css'   => 'tahun',
			'js'    => 'tahun',
			'nousandi' => true
		];
		return view('home/tahun', $data);
	}

	public function pilih($tahun)
	{
		if (session()->get('tahun')) {
			session()->setFlashData('sistem', 'Log out untuk memilih tahun');
			return redirect()->to('/home');
		}

		session()->set([
			'tahun' => $tahun
		]);

		return redirect()->to('/home');
	}

	public function logout()
	{
		$daftar = ['login', 'nama', 'role', 'tabel', 'id', 'tahun'];

		session()->remove($daftar);
		return redirect()->to('/');
	}

	public function ubahSandi()
	{
		if (!session()->get('tahun')) {
			return redirect()->to('/tahun');
		}

		$data = [
			'title' => 'ubah sandi',
			'css'   => 'usandi',
			'js'    => 'usandi',
			'nav'  => false,
			'validation' => \Config\Services::validation()
		];

		return view('home/ubahsandi', $data);
	}

	public function editSandi()
	{
		$loginModel = new LoginModel();

		$resultAdmin = $loginModel->where(['nama' => 'admin'])->first();
		$result = $loginModel->where(["id" => session()->get('id')])->first();
		if ($result != null) {
			if (password_verify($this->request->getVar('passlama'), $result['password'])) {
				if (!$this->validate([
					'passbaru' => [
						'rules' => 'min_length[5]|max_length[15]',
						'errors' => [
							'min_length' => 'password minimal 6 karakter',
							'max_length' => 'password maksimal 15 karakter'
						]
					]
				])) {
					return redirect()->to('/sandi/ubah')->withInput();
				}

				if (password_verify($this->request->getVar('passbaru'), $resultAdmin['password'])) {
					session()->setFlashData('pesanPassBaru', 'password terlalu lemah');
					return redirect()->to("/sandi/ubah")->withInput();
				}

				$data = [
					'password' => password_hash($this->request->getVar('passbaru'), PASSWORD_DEFAULT)
				];

				$loginModel->update(session()->get('id'), $data);

				session()->setFlashData('sistem', 'Password berhasil diubah');
				return redirect()->to('/home');
			} else {
				session()->setFlashData('pesan', 'password salah');
				return redirect()->to("/sandi/ubah")->withInput();
			}
		}
	}
}
