<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\DashboardController::index');
$routes->get('/dashboard', 'Admin\DashboardController::index');
$routes->get('/daftar-produk', 'Admin\ProdukController::index');
$routes->get('daftar-produk/tambah', 'Admin\ProdukController::form_create');
$routes->post('daftar-produk/create-produk', 'Admin\ProdukController::create_produk');

//
$routes->get('/daftar-kategori', 'Admin\ProdukController::kategori');
$routes->post('daftar-kategori/tambah', 'Admin\ProdukController::insert');
$routes->post('daftar-kategori/ubah/(:num)', 'Admin\ProdukController::update/$1');
$routes->delete('daftar-kategori/hapus/(:num)', 'Admin\ProdukController::hapus/$1');
