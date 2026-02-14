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
$routes->post('kategori/(:num)/delete', 'Kategori::delete/$1');
$routes->get('/barang', 'Barang::index');
$routes->add('/barang/add', 'Barang::tambah');
$routes->add('/barang/(:segment)/edit', 'Barang::edit/$1');
$routes->get('/barang/(:any)/delete', 'Barang::delete/$1');
$routes->get('admin/barang/edit/(:any)', 'Barang::edit/$1');
$routes->post('admin/barang/edit/(:any)', 'Barang::update/$1');
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
$routes->post('cart/tambahCart', 'Cart::tambahCart');
$routes->get('produk', 'Produk::index');
$routes->get('produk/detail/(:any)', 'Produk::detail/$1');
$routes->get('checkout', 'Checkout::index');
$routes->get('cart/checkout', 'Cart::checkout');
$routes->post('checkout/process_order', 'Checkout::process_order');
$routes->get('checkout/receipt/(:num)', 'Checkout::receipt/$1');
$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/transaksi/create', 'Transaksi::create');
$routes->post('/transaksi/store', 'Transaksi::store');
$routes->get('/receipt/(:num)', 'CheckoutController::receipt/$1');
$routes->get('admin/transaksi/detail/(:num)', 'AdminTransaksi::detail/$1');
$routes->get('transaksi', 'Transaksi::index');
$routes->get('transaksi/detail/(:num)', 'Transaksi::detail/$1');




