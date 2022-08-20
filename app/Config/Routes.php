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

$routes->get('/imunisasi', 'Imunisasi::index');
$routes->post('/imunisasi', 'Imunisasi::create');
$routes->delete('/imunisasi/(:num)', 'Imunisasi::delete/$1');

$routes->get('/vitamin', 'Vitamin::index');
$routes->post('/vitamin', 'Vitamin::create');
$routes->delete('/vitamin/(:num)', 'Vitamin::delete/$1');

$routes->get('/petugas', 'Petugas::index');
$routes->get('/petugas/(:num)', 'Petugas::show/$1');
$routes->get('/petugas/new', 'Petugas::new');
$routes->get('/petugas/edit/(:num)', 'Petugas::edit/$1');
$routes->post('/petugas', 'Petugas::create');
$routes->put('/petugas/(:num)', 'Petugas::update/$1');
$routes->delete('/petugas/(:num)', 'Petugas::delete/$1');

$routes->get('/ibu', 'Ibu::index');
$routes->get('/ibu/new', 'Ibu::new');
$routes->get('/ibu/edit/(:num)', 'Ibu::edit/$1');
$routes->get('/ibu/(:num)', 'Ibu::show/$1');
$routes->post('/ibu', 'Ibu::create');
$routes->put('/ibu/(:num)', 'Ibu::update/$1');
$routes->delete('/ibu/(:num)', 'Ibu::delete/$1');

$routes->get('/balita', 'Balita::index');
$routes->get('/balita/new', 'Balita::new');
$routes->get('/balita/edit/(:num)', 'Balita::edit/$1');
$routes->get('/balita/(:num)', 'Balita::show/$1');
$routes->post('/balita', 'Balita::create');
$routes->put('/balita/(:num)', 'Balita::update/$1');
$routes->delete('/balita/(:num)', 'Balita::delete/$1');

$routes->get('/kehadiran', 'Kehadiran::index');
$routes->get('/kehadiran/new', 'Kehadiran::new');
$routes->get('/kehadiran/edit/(:num)', 'Kehadiran::edit/$1');
$routes->get('/kehadiran/(:num)', 'Kehadiran::show/$1');
$routes->post('/kehadiran', 'Kehadiran::create');
$routes->put('/kehadiran/(:num)', 'Kehadiran::update/$1');
$routes->delete('/kehadiran/(:num)', 'Kehadiran::delete/$1');

$routes->get('/imunisasibalita', 'ImunisasiBalita::index');
$routes->get('/imunisasibalita/new', 'ImunisasiBalita::new');
$routes->get('/imunisasibalita/edit/(:num)', 'ImunisasiBalita::edit/$1');
$routes->get('/imunisasibalita/(:num)', 'ImunisasiBalita::show/$1');
$routes->post('/imunisasibalita', 'ImunisasiBalita::create');
$routes->put('/imunisasibalita/(:num)', 'ImunisasiBalita::update/$1');
$routes->delete('/imunisasibalita/(:num)', 'ImunisasiBalita::delete/$1');
$routes->get('/imunisasibalita/getbalita/(:num)', 'ImunisasiBalita::getBalita/$1');

$routes->get('/periksabalita', 'PeriksaBalita::index');
$routes->get('/periksabalita/new', 'PeriksaBalita::new');
$routes->get('/periksabalita/edit/(:num)', 'PeriksaBalita::edit/$1');
$routes->get('/periksabalita/(:num)', 'PeriksaBalita::show/$1');
$routes->post('/periksabalita', 'PeriksaBalita::create');
$routes->put('/periksabalita/(:num)', 'PeriksaBalita::update/$1');
$routes->delete('/periksabalita/(:num)', 'PeriksaBalita::delete/$1');

$routes->get('/periksaibu', 'PeriksaIbu::index');
$routes->get('/periksaibu/new', 'PeriksaIbu::new');
$routes->get('/periksaibu/edit/(:num)', 'PeriksaIbu::edit/$1');
$routes->get('/periksaibu/(:num)', 'PeriksaIbu::show/$1');
$routes->post('/periksaibu', 'PeriksaIbu::create');
$routes->put('/periksaibu/(:num)', 'PeriksaIbu::update/$1');
$routes->delete('/periksaibu/(:num)', 'PeriksaIbu::delete/$1');

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
