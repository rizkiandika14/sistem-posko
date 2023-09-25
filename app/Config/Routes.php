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

//login
$routes->get('/', 'Login::index');
$routes->post('/cekUser', 'Login::cekUser');




// filter di group routes	
// $routes->group('superadmin', ['filter' => 'filterSuperadmin'], function ($routes) {

$routes->get('/home', 'Home::index');

//kabupaten
$routes->get('/kabupaten', 'Kabupaten::index');
$routes->add('/kabupaten/tambah', 'Kabupaten::tambah');
$routes->delete('/kabupaten/(:num)', 'Kabupaten::delete/$1');
//user
$routes->get('/user', 'User::index');
$routes->add('/user/edit/(:segment)', 'User::edit/$1');
$routes->add('/user/tambah', 'User::create');
$routes->delete('/user/(:num)', 'User::delete/$1');

//kecamatan
$routes->get('/kecamatan', 'Kecamatan::index');
$routes->add('/kecamatan/tambah', 'Kecamatan::tambah');
$routes->delete('/kecamatan/(:num)', 'Kecamatan::delete/$1');

//desa
$routes->get('/desa', 'Desa::index');
$routes->delete('/desa/(:num)', 'Desa::delete/$1');


//manage pelaporan
$routes->get('/manage_pelaporan', 'ManagePelaporan::index');
$routes->get('/manage_pelaporan/proses', 'ManagePelaporan::proses');
$routes->get('/manage_pelaporan/batal', 'ManagePelaporan::batal');
$routes->get('/manage_pelaporan/selesai', 'ManagePelaporan::selesai');
$routes->add('/manage_pelaporan/filter', 'ManagePelaporan::filter');
$routes->add('/manage_pelaporan/filter_proses', 'ManagePelaporan::filter_proses');
$routes->add('/manage_pelaporan/filter_batal', 'ManagePelaporan::filter_batal');
$routes->add('/manage_pelaporan/filter_selesai', 'ManagePelaporan::filter_selesai');
$routes->add('/manage_pelaporan/batalkan/(:num)', 'ManagePelaporan::batalkan/$1');
$routes->add('/manage_pelaporan/selesaikan/(:num)', 'ManagePelaporan::selesaikan/$1');

//statistik
$routes->get('/statistik', 'Statistik::index');
$routes->get('/statistik/kecamatan', 'Statistik::kecamatan');


//pelaporan data_banjir
$routes->get('/pelaporan', 'Pelaporan::index');
$routes->add('/pelaporan/tambah', 'Pelaporan::tambah');
$routes->add('Pelaporan/ajaxSearchkabupaten', 'Pelaporan::ajaxSearchkabupaten');
$routes->add('Pelaporan/ajaxSearchkecamatan', 'Pelaporan::ajaxSearchkecamatan');
$routes->get('/pelaporan/detail/(:segment)', 'Pelaporan::detail/$1');
$routes->add('/pelaporan/edit/(:segment)', 'Pelaporan::edit/$1');
$routes->delete('/pelaporan/(:num)', 'Pelaporan::delete/$1');

//data pelaporan
$routes->get('/data_pelaporan', 'DataPelaporan::index');
$routes->add('/data_pelaporan/filter_proses', 'DataPelaporan::filter_proses');
$routes->get('/data_pelaporan/batal', 'DataPelaporan::batal');
$routes->add('/data_pelaporan/filter_batal', 'DataPelaporan::filter_batal');
$routes->get('/data_pelaporan/selesai', 'DataPelaporan::selesai');
$routes->add('/data_pelaporan/filter_selesai', 'DataPelaporan::filter_selesai');
// });

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
