<?php

namespace Config;

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
$routes->setDefaultController('Customer\Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Customer\Dashboard::index');
$routes->get('/auth', 'Admin\Auth::index');
$routes->get('/auth/(:any)', 'Admin\Auth::index/$1');
$routes->get('/data_laptop', 'Admin\data_laptop::index');
$routes->get('/data_laptop/form_tambah', 'Admin\data_laptop::form_tambah');


//Customer
//Home
$routes->get('/home', 'Customer\Dashboard::index');
//Katalog
$routes->get('/katalog', 'Customer\Katalog::index');
// profile
$routes->get('/profile', 'Profile::index');
//Kategori
$routes->get('/category/bisnis', 'Customer\product_category::bisnis');
$routes->get('/category/gaming', 'Customer\product_category::gaming');
$routes->get('/category/multimedia', 'Customer\product_category::multimedia');
$routes->get('/category/ultrabook', 'Customer\product_category::ultrabook');
//Detail
$routes->get('/detail/(:num)', 'Customer\detail_laptop::detail/$1');
//Transaksi
$routes->get('/transaksi/(:num)', 'Customer\transaksi::index/$1');
//Cart
$routes->get('/cart', 'Customer\cart::index');
$routes->post('/cart/pay', 'Customer\cart::pay');
$routes->get('/delete/(:num)', 'customer\cart::delete/$1');


$routes->get("admin/laptop/(:num)/destroy", "Admin\laptop::delete/$1");
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
