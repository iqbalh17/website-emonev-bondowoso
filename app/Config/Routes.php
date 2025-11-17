<?php

namespace Config;

use App\Controllers\Admin;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Home::login');
$routes->add('/home', 'Home::home');
$routes->add('/tahun/(:num)', 'Home::pilih/$1');
$routes->add('/tahun', 'Home::tahun');
$routes->add('/logout', 'Home::logout');
$routes->add('/sandi/ubah', 'Home::ubahSandi');
$routes->add('/evaluasi_renja/delete/(:num)', 'Evaluasi_Renja::spoof');
$routes->delete('/evaluasi_renja/(:num)', 'Evaluasi_Renja::delete/$1');
$routes->delete('/reset/(:num)', 'Reset::reset/$1');
$routes->add('/reset/reset/(:num)', 'Reset::spoof');
$routes->add('/evaluasi_renja/download/(:num)', 'Evaluasi_Renja::download/$1');
$routes->add('/evaluasi_renja/downloadTTD/(:num)', 'Evaluasi_Renja::downloadTTD/$1', ['filter' => 'role:' . session()->get('role')]);
$routes->delete('/evaluasi_monev_lapangan/(:num)', 'Evaluasi_Monev_Lapangan::delete/$1');
$routes->add('/evaluasi_monev_lapangan/delete/(:num)', 'Evaluasi_Monev_Lapangan::spoof');
$routes->group('admin', function ($routes) {
	$routes->add('/', 'Admin::login');
	$routes->add('home', 'Admin::home');
	$routes->add('reset_sandi', 'Reset::index');
	$routes->add('jadwal', 'Jadwal::index');
	$routes->add('logout', 'Admin::logout');
	$routes->add('tahun', 'Admin::tahun');
	$routes->add('tahun/(:num)', 'Admin::pilihTahun/$1');
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
