<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
// $routes->get('/', 'Home::index');
// $routes->get('/', 'RWController::index');

// --------------------------------------------------------------------
//   Guest
// --------------------------------------------------------------------
// Home
$routes->get('/', 'GuestController::landing');

// Logout
$routes->get('/logout', 'login::logout');

// Guest Register
$routes->get('/register', 'GuestController::index');

// --------------------------------------------------------------------
//   RW
// --------------------------------------------------------------------
// Dashboard Warga
$routes->get('/rw/dashboard', 'RWController::index');

// Daftar Surat
$routes->get('/rw/daftar-surat', 'RWController::daftarSurat');

// Laporan Pemalsuan
$routes->get('/rw/laporan-pemalsuan', 'RWController::laporanPemalsuan');

// Verifikasi Akun
$routes->get('/rw/verifikasi-akun', 'RWController::verifikasiAkun');

// View File
$routes->get('/viewFile/(:any)', 'RWController::viewFile/$1/$2');

// Verifikasi
$routes->get('/verifikasi/(:any)', 'RWController::verifikasi/$1');

// Verifikasi Surat
$routes->get('/verifikasi-surat/(:any)', 'RWController::verifikasi_surat/$1');

// --------------------------------------------------------------------
//   RT
// --------------------------------------------------------------------
// Dashboard
$routes->get('/rt/dashboard', 'rt::index');

// Daftar Surat
$routes->get('/rt/daftar-surat', 'rt::daftarSurat');

// Verifikasi Akun
$routes->get('/rt/verifikasi-akun', 'rt::verifikasiAkun');

// --------------------------------------------------------------------
//   Warga
// --------------------------------------------------------------------
// Dashboard
$routes->get('/warga/dashboard', 'warga::index');

// Persyaratan
$routes->get('/warga/persyaratan', 'warga::persyaratan');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
