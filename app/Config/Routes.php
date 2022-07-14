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

$routes->get('/penimbangan', 'Penimbangan::index');
$routes->get('/penimbangan/new', 'Penimbangan::new');
$routes->get('/penimbangan/edit/(:num)', 'Penimbangan::edit/$1');
$routes->get('/penimbangan/(:num)', 'Penimbangan::show/$1');
$routes->post('/penimbangan', 'Penimbangan::create');
$routes->put('/penimbangan/(:num)', 'Penimbangan::update/$1');
$routes->delete('/penimbangan/(:num)', 'Penimbangan::delete/$1');

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
