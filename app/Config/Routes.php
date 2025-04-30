<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//routes developer menu
$routes->get('/', 'controllerDeveloper::developerOptions');

//mitra

//homepage untuk manajemen
$routes->get('/Mitra/viewHomepageManajemen', 'Mitra\controllerHomepageManajemen::viewHomepageManajemen');

//routes manajemen menu
$routes->get('/Mitra/controllerManajemenMenu', 'Mitra\controllerManajemenMenu::viewManajemenMenu');
$routes->post('/Mitra/controllerManajemenMenu/addMenu', 'Mitra\controllerManajemenMenu::addMenu');
$routes->post('/Mitra/controllerManajemenMenu/addKategori', 'Mitra\controllerManajemenMenu::addKategori');
$routes->post('/Mitra/controllerManajemenMenu/deleteMenu/(:num)', 'Mitra\controllerManajemenMenu::deleteMenu/$1');
$routes->post('/Mitra/controllerManajemenMenu/editMenu', 'Mitra\controllerManajemenMenu::editMenu');
$routes->get('/Mitra/controllerManajemenMenu/deleteKategori/(:num)', 'Mitra\controllerManajemenMenu::deleteKategori/$1');

//routes manajemen order
$routes->get('/Mitra/controllerManajemenOrder', 'Mitra\controllerManajemenOrder::viewManajemenOrder');
$routes->post('/Mitra/controllerManajemenOrder/orderContent', 'Mitra\controllerManajemenOrder::orderContent');
$routes->post('/Mitra/controllerManajemenOrder/updateStatus', 'Mitra\controllerManajemenOrder::updateStatus');

//routes register admin
$routes->get('/Mitra/controllerRegisterAdmin', 'Mitra\controllerRegisterAdmin::viewRegisterAdmin');
$routes->post('/Mitra/controllerRegisterAdmin/registerAkunAdmin', 'Mitra\controllerRegisterAdmin::registerAkunAdmin');

//routes login admin
$routes->get('/Mitra/controllerLoginAdmin', 'Mitra\controllerLoginAdmin::viewLoginAdmin');
$routes->post('/Mitra/controllerLoginAdmin/loginAkunAdmin', 'Mitra\controllerLoginAdmin::loginAkunAdmin');

//routes logout admin
$routes->post('/Mitra/controllerLogoutAdmin', 'Mitra\controllerLogoutAdmin::logOut');

//routes pelanggan

//homepage publik
$routes->get('/Pelanggan/controllerHomepage', 'Pelanggan\controllerHomepage::viewHomepage');

//pemesanan
$routes->get('/Pelanggan/controllerPemesanan', 'Pelanggan\controllerPemesanan::viewPemesanan');
$routes->post('/Pelanggan/controllerPemesanan/tambahKeranjang', 'Pelanggan\controllerPemesanan::tambahKeranjang');
$routes->post('/Pelanggan/controllerPemesanan/kurangiKeranjang', 'Pelanggan\controllerPemesanan::kurangiKeranjang');
$routes->post('/Pelanggan/controllerPemesanan/checkout', 'Pelanggan\controllerPemesanan::checkout');

//riwayat pemesanan
$routes->get('/Pelanggan/controllerRiwayatPemesanan', 'Pelanggan\controllerRiwayatOrder::viewRiwayatOrder');
$routes->post('/Pelanggan/controllerRiwayatPemesanan/isiOrder', 'Pelanggan\controllerRiwayatOrder::isiOrder');

//register akun pelanggan
$routes->get('/Pelanggan/controllerRegisterAkunPelanggan', 'Pelanggan\controllerRegisterAkunPelanggan::viewRegister');
$routes->post('/Pelanggan/controllerRegisterAkunPelanggan/registerAkun', 'Pelanggan\controllerRegisterAkunPelanggan::registerAkun');

//login akun pelanggan
$routes->get('/Pelanggan/controllerLoginAkunPelanggan', 'Pelanggan\controllerLoginAkunPelanggan::viewLogin');
$routes->post('/Pelanggan/controllerLoginAkunPelanggan/loginAkun', 'Pelanggan\controllerLoginAkunPelanggan::loginAkun');

//logout akun pelanggan
$routes->post('Pelanggan/controllerLogoutAkunPelanggan', 'Pelanggan\controllerLogoutAkunPelanggan::logOut');