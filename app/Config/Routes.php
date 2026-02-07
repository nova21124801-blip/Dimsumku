<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Beranda::index');
$routes->get('/aboutme', 'Aboutme::index');
$routes->get('/education', 'Education::index');
$routes->get('/detail', 'Detail::index');
$routes->get('/checkout', 'Checkout::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/kategori', 'Kategori::index');
$routes->add('/kategori/add', 'Kategori::tambah');
$routes->add('/kategori/(:segment)/edit', 'Kategori::edit/$1');
$routes->get('/kategori/(:segment)/delete', 'Kategori::delete/$1');
$routes->get('/barang', 'Barang::index');
$routes->add('/barang/add', 'Barang::tambah');
$routes->add('/barang/(:segment)/edit', 'Barang::edit/$1');
$routes->get('/barang/(:segment)/delete', 'Barang::delete/$1');
$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login_action');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');
$routes->add('/register/simpan', 'Register::simpan');
$routes->add('/kategoribuku', 'KategoriBuku::index');
$routes->add('/kategoribuku/(:segment)/view', 'KategoriBuku::view/$1');
$routes->add('/kategoribuku/(:segment)/detail', 'KategoriBuku::detail/$1');
$routes->get('/cart', 'Cart::index');
$routes->add('/cartAdd', 'Cart::tambahCart');
$routes->get('produk', 'Produk::index');
$routes->get('produk/detail/(:any)', 'Produk::detail/$1');



