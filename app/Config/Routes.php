<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
//login
$routes->get('/login', 'Auth::login');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('/hrd', 'Auth::hrd');
$routes->get('/insert-user-hrd', 'Auth::insertDummyUser');
//karyawan
$routes->get('/kelolakaryawan', 'Auth::kelolakaryawan');
$routes->get('/auth/tambahkaryawan', 'Auth::tambahkaryawan');
$routes->post('/simpankaryawan', 'Auth::simpankaryawan');
$routes->get('/auth/editkaryawan/(:segment)', 'Auth::editkaryawan/$1');
$routes->post('/auth/updatekaryawan/(:segment)', 'Auth::updatekaryawan/$1');
$routes->get('/deletekaryawan/(:segment)', 'Auth::deletekaryawan/$1');
//kontrak
$routes->get('/kelolasuratkontrak', 'Auth::kelolasuratkontrak');
$routes->get('/auth/tambahsuratkontrak', 'Auth::tambahsuratkontrak');
$routes->post('/simpansuratkontrak', 'Auth::simpansuratkontrak');
$routes->get('/auth/editsuratkontrak/(:segment)', 'Auth::editsuratkontrak/$1');
$routes->post('/auth/updatesuratkontrak/(:segment)', 'Auth::updatesuratkontrak/$1');
$routes->get('/deletesuratkontrak/(:segment)', 'Auth::deletesuratkontrak/$1');
//cetak ke pdf
$routes->get('auth/cetak/(:segment)', 'Auth::cetakSuratKontrak/$1');
//jabatan
$routes->get('/kelolajabatan', 'Auth::kelolajabatan');
$routes->get('/auth/tambahjabatan', 'Auth::tambahjabatan');
$routes->post('/simpanjabatan', 'Auth::simpanjabatan');
$routes->get('/auth/editjabatan/(:segment)', 'Auth::editjabatan/$1');
$routes->post('/auth/updatejabatan/(:segment)', 'Auth::updatejabatan/$1');
$routes->get('/deletejabatan/(:segment)', 'Auth::deletejabatan/$1');
//pengelolaansk
$routes->get('/kelolapengelolaansk', 'Auth::kelolapengelolaansk');
$routes->get('/auth/tambahpengelolaansk', 'Auth::tambahpengelolaansk');
$routes->post('/simpanpengelolaansk', 'Auth::simpanpengelolaansk');
$routes->get('/auth/editpengelolaansk/(:segment)', 'Auth::editpengelolaansk/$1');
$routes->post('/auth/updatepengelolaansk/(:segment)', 'Auth::updatepengelolaansk/$1');
$routes->get('/deletepengelolaansk/(:segment)', 'Auth::deletepengelolaansk/$1');
//kategori
$routes->get('/kelolakategori', 'Auth::kelolakategori');
$routes->get('/auth/tambahkategori', 'Auth::tambahkategori');
$routes->post('/simpankategori', 'Auth::simpankategori');
$routes->get('/auth/editkategori/(:segment)', 'Auth::editkategori/$1');
$routes->post('/auth/updatekategori/(:segment)', 'Auth::updatekategori/$1');
$routes->get('/deletekategori/(:segment)', 'Auth::deletekategori/$1');
//role
$routes->get('/kelolarole', 'Auth::kelolarole');
$routes->get('/auth/tambahrole', 'Auth::tambahrole');
$routes->post('/simpanrole', 'Auth::simpanrole');
$routes->get('/auth/editrole/(:segment)', 'Auth::editrole/$1');
$routes->post('/auth/updaterole/(:segment)', 'Auth::updaterole/$1');
$routes->get('/deleterole/(:segment)', 'Auth::deleterole/$1');
//user
$routes->get('/kelolauser', 'Auth::kelolauser');
$routes->get('/auth/tambahuser', 'Auth::tambahuser');
$routes->post('/simpanuser', 'Auth::simpanuser');
$routes->get('/auth/edituser/(:segment)', 'Auth::edituser/$1');
$routes->post('/auth/updateuser/(:segment)', 'Auth::updateuser/$1');
$routes->get('/deleteuser/(:segment)', 'Auth::deleteuser/$1');
//calonkaryawan
$routes->get('/kelolacalonkaryawan', 'Auth::kelolacalonkaryawan');
$routes->get('/auth/tambahcalonkaryawan', 'Auth::tambahcalonkaryawan');
$routes->post('/simpancalonkaryawan', 'Auth::simpancalonkaryawan');
$routes->get('/auth/editcalonkaryawan/(:segment)', 'Auth::editcalonkaryawan/$1');
$routes->post('/auth/updatecalonkaryawan/(:segment)', 'Auth::updatecalonkaryawan/$1');
$routes->get('/deletecalonkaryawan/(:segment)', 'Auth::deletecalonkaryawan/$1');
//prosesseleksi
$routes->get('/kelolaprosesseleksi', 'Auth::kelolaprosesseleksi');
$routes->post('/auth/updateStatusPenguji', 'Auth::updateStatusPenguji');
//hasilseleksi
$routes->get('/kelolahasilseleksi', 'Auth::kelolahasilseleksi');
$routes->get('/auth/tambahpengelolaansk', 'Auth::tambahpengelolaansk');
$routes->post('/simpanpengelolaansk', 'Auth::simpanpengelolaansk');
$routes->get('/auth/editpengelolaansk/(:segment)', 'Auth::editpengelolaansk/$1');
$routes->post('/auth/updatepengelolaansk/(:segment)', 'Auth::updatepengelolaansk/$1');
$routes->get('/deletepengelolaansk/(:segment)', 'Auth::deletepengelolaansk/$1');
//cetak pdf hasil
$routes->get('auth/cetakhasil/(:segment)', 'Auth::cetakhasil/$1');

//-----------------------------------------//
//direktur
//----------------------------------------//
//validasi
$routes->get('/validasikontrak', 'Auth::validasikontrak');
$routes->post('/auth/updateStatusValidasi', 'Auth::updateStatusValidasi');
//pengelolaanskdirektur
$routes->get('/pengelolaanskdirektur', 'Auth::pengelolaanskdirektur');
//karyawandirektur
$routes->get('/karyawandirektur', 'Auth::karyawandirektur');
//CetakKaryawan
$routes->get('cetakkaryawandirektur', 'Auth::cetakKaryawanView');
$routes->get('/auth/generate_pdf', 'Auth::generatePdf');



