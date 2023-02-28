<?php

namespace Config;

use App\Controllers\Sekolah;
use App\Controllers\Kriteria;
use App\Controllers\Hitung;
use App\Controllers\Penilaian;
use App\Controllers\User;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/user/login', [User::class, 'login']);
$routes->post('/user/login_action', [User::class, 'login_action']);
$routes->get('/user/password', [User::class, 'password']);
$routes->post('/user/password_action', [User::class, 'password_action']);
$routes->get('/user/logout', [User::class, 'logout']);

$routes->get('/user', [User::class, 'index']);
$routes->get('/user/create', [User::class, 'create']);
$routes->post('/user/store', [User::class, 'store']);
$routes->get('/user/edit/(:any)', [User::class, 'edit']);
$routes->post('/user/update/(:any)', [User::class, 'update']);
$routes->get('/user/destroy/(:any)', [User::class, 'destroy']);
$routes->get('/user/cetak', [User::class, 'cetak']);

$routes->get('/kriteria', [Kriteria::class, 'index']);
$routes->get('/kriteria/create', [Kriteria::class, 'create']);
$routes->post('/kriteria/store', [Kriteria::class, 'store']);
$routes->get('/kriteria/edit/(:any)', [Kriteria::class, 'edit']);
$routes->post('/kriteria/update/(:any)', [Kriteria::class, 'update']);
$routes->get('/kriteria/destroy/(:any)', [Kriteria::class, 'destroy']);
$routes->get('/kriteria/cetak', [Kriteria::class, 'cetak']);

$routes->get('/sekolah', [Sekolah::class, 'index']);
$routes->get('/sekolah/create', [Sekolah::class, 'create']);
$routes->post('/sekolah/store', [Sekolah::class, 'store']);
$routes->get('/sekolah/edit/(:any)', [Sekolah::class, 'edit']);
$routes->post('/sekolah/update/(:any)', [Sekolah::class, 'update']);
$routes->get('/sekolah/destroy/(:any)', [Sekolah::class, 'destroy']);
$routes->get('/sekolah/cetak', [Sekolah::class, 'cetak']);

$routes->get('/penilaian', [Penilaian::class, 'index']);
$routes->get('/penilaian/create', [Penilaian::class, 'create']);
$routes->post('/penilaian/store', [Penilaian::class, 'store']);
$routes->get('/penilaian/edit/(:any)', [Penilaian::class, 'edit']);
$routes->post('/penilaian/update/(:any)', [Penilaian::class, 'update']);
$routes->get('/penilaian/destroy/(:any)', [Penilaian::class, 'destroy']);
$routes->get('/penilaian/profil', [Penilaian::class, 'profil']);
$routes->post('/penilaian/profil_update', [Penilaian::class, 'profil_update']);
$routes->get('/penilaian/cetak', [Penilaian::class, 'cetak']);

$routes->get('/hitung', [Hitung::class, 'index']);
$routes->post('/hitung', [Hitung::class, 'index']);
$routes->get('/hitung/hasil', [Hitung::class, 'hasil']);
$routes->get('/hitung/cetak', [Hitung::class, 'cetak']);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
