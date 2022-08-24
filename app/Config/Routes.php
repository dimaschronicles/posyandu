<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
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
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/imunisasi', 'Imunisasi::index', ['filter' => 'isBidan']);
$routes->post('/imunisasi', 'Imunisasi::create', ['filter' => 'isBidan']);
$routes->delete('/imunisasi/(:num)', 'Imunisasi::delete/$1', ['filter' => 'isBidan']);

$routes->get('/vitamin', 'Vitamin::index', ['filter' => 'isBidan']);
$routes->post('/vitamin', 'Vitamin::create', ['filter' => 'isBidan']);
$routes->delete('/vitamin/(:num)', 'Vitamin::delete/$1', ['filter' => 'isBidan']);

$routes->get('/petugas', 'Petugas::index', ['filter' => 'isAdmin']);
$routes->get('/petugas/(:num)', 'Petugas::show/$1', ['filter' => 'isAdmin']);
$routes->get('/petugas/new', 'Petugas::new', ['filter' => 'isAdmin']);
$routes->get('/petugas/edit/(:num)', 'Petugas::edit/$1', ['filter' => 'isAdmin']);
$routes->post('/petugas', 'Petugas::create', ['filter' => 'isAdmin']);
$routes->put('/petugas/(:num)', 'Petugas::update/$1', ['filter' => 'isAdmin']);
$routes->delete('/petugas/(:num)', 'Petugas::delete/$1', ['filter' => 'isAdmin']);

$routes->get('/ibu', 'Ibu::index', ['filter' => 'isKader']);
$routes->get('/ibu/new', 'Ibu::new');
$routes->get('/ibu/edit/(:num)', 'Ibu::edit/$1', ['filter' => 'isKader']);
$routes->get('/ibu/(:num)', 'Ibu::show/$1', ['filter' => 'isKader']);
$routes->post('/ibu', 'Ibu::create', ['filter' => 'isKader']);
$routes->put('/ibu/(:num)', 'Ibu::update/$1', ['filter' => 'isKader']);
$routes->delete('/ibu/(:num)', 'Ibu::delete/$1', ['filter' => 'isKader']);

$routes->get('/balita', 'Balita::index', ['filter' => 'isKader']);
$routes->get('/balita/new', 'Balita::new', ['filter' => 'isKader']);
$routes->get('/balita/edit/(:num)', 'Balita::edit/$1', ['filter' => 'isKader']);
$routes->get('/balita/(:num)', 'Balita::show/$1', ['filter' => 'isKader']);
$routes->post('/balita', 'Balita::create', ['filter' => 'isKader']);
$routes->put('/balita/(:num)', 'Balita::update/$1', ['filter' => 'isKader']);
$routes->delete('/balita/(:num)', 'Balita::delete/$1', ['filter' => 'isKader']);

$routes->get('/imunisasibalita', 'ImunisasiBalita::index', ['filter' => 'isBidan']);
$routes->get('/imunisasibalita/new', 'ImunisasiBalita::new', ['filter' => 'isBidan']);
$routes->get('/imunisasibalita/edit/(:num)', 'ImunisasiBalita::edit/$1', ['filter' => 'isBidan']);
$routes->get('/imunisasibalita/(:num)', 'ImunisasiBalita::show/$1', ['filter' => 'isBidan']);
$routes->post('/imunisasibalita', 'ImunisasiBalita::create', ['filter' => 'isBidan']);
$routes->put('/imunisasibalita/(:num)', 'ImunisasiBalita::update/$1', ['filter' => 'isBidan']);
$routes->delete('/imunisasibalita/(:num)', 'ImunisasiBalita::delete/$1', ['filter' => 'isBidan']);
$routes->get('/imunisasibalita/getbalita/(:num)', 'ImunisasiBalita::getBalita/$1', ['filter' => 'isBidan']);

$routes->get('/periksabalita', 'PeriksaBalita::index', ['filter' => 'isKader']);
$routes->get('/periksabalita/new', 'PeriksaBalita::new', ['filter' => 'isKader']);
$routes->get('/periksabalita/edit/(:num)', 'PeriksaBalita::edit/$1', ['filter' => 'isKader']);
$routes->get('/periksabalita/(:num)', 'PeriksaBalita::show/$1', ['filter' => 'isKader']);
$routes->post('/periksabalita', 'PeriksaBalita::create', ['filter' => 'isKader']);
$routes->put('/periksabalita/(:num)', 'PeriksaBalita::update/$1', ['filter' => 'isKader']);
$routes->delete('/periksabalita/(:num)', 'PeriksaBalita::delete/$1', ['filter' => 'isKader']);

$routes->get('/periksaibu', 'PeriksaIbu::index', ['filter' => 'isBidan']);
$routes->get('/periksaibu/new', 'PeriksaIbu::new', ['filter' => 'isBidan']);
$routes->get('/periksaibu/edit/(:num)', 'PeriksaIbu::edit/$1', ['filter' => 'isBidan']);
$routes->get('/periksaibu/(:num)', 'PeriksaIbu::show/$1', ['filter' => 'isBidan']);
$routes->post('/periksaibu', 'PeriksaIbu::create', ['filter' => 'isBidan']);
$routes->put('/periksaibu/(:num)', 'PeriksaIbu::update/$1', ['filter' => 'isBidan']);
$routes->delete('/periksaibu/(:num)', 'PeriksaIbu::delete/$1', ['filter' => 'isBidan']);

$routes->get('/laporan/imunisasibalita', 'Laporan::imunisasiBalita', ['filter' => 'isBidan']);
$routes->get('/laporan/imunisasibalitaprint', 'Laporan::imunisasiBalitaPrint', ['filter' => 'isBidan']);
$routes->get('/laporan/imunisasibalitapdf', 'Laporan::imunisasiBalitaPdf', ['filter' => 'isBidan']);
$routes->get('/laporan/periksabalita', 'Laporan::periksaBalita', ['filter' => 'isKader']);
$routes->get('/laporan/periksabalitaprint', 'Laporan::periksaBalitaPrint', ['filter' => 'isKader']);
$routes->get('/laporan/periksabalitapdf', 'Laporan::periksaBalitaPdf', ['filter' => 'isKader']);
$routes->get('/laporan/periksaibu', 'Laporan::periksaIbu', ['filter' => 'isBidan']);
$routes->get('/laporan/periksaibuprint', 'Laporan::periksaIbuPrint', ['filter' => 'isBidan']);
$routes->get('/laporan/periksaibupdf', 'Laporan::periksaIbuPdf', ['filter' => 'isBidan']);

$routes->get('/profil', 'Profil::index');
$routes->get('/profil/editprofile', 'Profil::editProfil');
$routes->get('/profil/updateprofile', 'Profil::updateProfil');
$routes->get('/profil/changepassword', 'Profil::changePassword');
$routes->get('/profil/updatechangepassword', 'Profil::updateChangePassword');
$routes->get('/profil/resetpassword', 'Profil::resetPassword', ['filter' => 'isAdmin']);
$routes->get('/profil/updateresetpassword', 'Profil::updateResetPassword', ['filter' => 'isAdmin']);

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
