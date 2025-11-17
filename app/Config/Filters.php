<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'auth'	   => \App\Filters\AuthFilter::class,
		'role'	   => \App\Filters\RoleFilter::class,
		'logged'   => \App\Filters\LoggedFilter::class,
		'admin'    => \App\Filters\AdminFilter::class
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			// 'csrf',
			'auth' => ['except' => ['/', '/home/masuk', '/admin', '/admin/*', '/reset/*', '/jadwal/*']],
			'logged' => ['except' => ['/home', '/home/*', '/tahun', '/logout', '/tahun/*', '/sandi/ubah', '/evaluasi_renja', '/evaluasi_renja/*', '/admin', '/admin/*', '/reset/*', '/jadwal/*', '/evaluasi_monev_lapangan', '/evaluasi_monev_lapangan/*']]
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
		'admin' => ['before' => ['/admin', '/admin/masuk'], 'after' => ['/admin/home', '/admin/logout', '/admin/reset_sandi', '/admin/reset_sandi/*', '/admin/jadwal', '/admin/jadwal/*', '/reset/*', '/jadwal/*', '/admin/tahun', '/admin/tahun/*']]
	];
}
