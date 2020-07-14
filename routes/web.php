<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $nama = 'Yoga Rizki Pratama';
//     return view('index', ['nama' => $nama]);
// });

// Route::get('/users/ReadUser', function () {
//     return view('ReadUser');
// });
Route::get('/', function () {
    return view('index');
});

// Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
// Route::get('/index', 'PagesController@home');
Route::get('/admin', 'PagesController@admin');
Route::get('/user', 'PagesController@user');
Route::get('/about', 'PagesController@about');


// Peminjaman ruangan yang dilakukan oleh mahasiswa
Route::get('/borrows/create', 'PeminjamanController@create');
Route::get('/borrows', 'PeminjamanController@index');
Route::post('/borrows','PeminjamanController@store');

// kajur melihat hasil rekap peminjaman ruangan yang dilakukan mahasiswa
Route::get('/rekap_prm', 'PeminjamanController@indexKajur');

// admin mengubah status pinjam menjadi kembali pada peminjaman ruangan yang dilakukan oleh mahasiswa
Route::get('/admin_prm', 'PeminjamanController@indexAdmin');
Route::get('/admin_prm/{data}', 'PeminjamanController@edit');
Route::patch('/admin_prm/Edit/{data}', 'PeminjamanController@update');

// kajur melihat hasil rekap peminjaman barang yang dilakukan mahasiswa
Route::get('/rekap_pbm', 'PinjambarangmhsController@indexKajur');

// admin mengubah status pinjam menjadi kembali pada peminjaman barang yang dilakukan oleh mahasiswa
Route::get('/admin_pbm', 'PinjambarangmhsController@indexAdmin');
Route::get('/admin_pbm/{data}', 'PinjambarangmhsController@edit');
Route::patch('/admin_pbm/Edit/{data}', 'PinjambarangmhsController@update');

// kajur melihat hasil rekap peminjaman ruangan yang dilakukan dosen
Route::get('/rekap_prd', 'PinjamruangandsnController@indexKajur');

// admin mengubah status pinjam menjadi kembali pada peminjaman ruangan yang dilakukan oleh dosen
Route::get('/admin_prd', 'PinjamruangandsnController@indexAdmin');
Route::get('/admin_prd/{data}', 'PinjamruangandsnController@edit');
Route::patch('/admin_prd/Edit/{data}', 'PinjamruangandsnController@update');

// kajur melihat hasil rekap peminjaman barang yang dilakukan dosen
Route::get('/rekap_pbd', 'PinjambarangdsnController@indexKajur');

// admin mengubah status pinjam menjadi kembali pada peminjaman barang yang dilakukan oleh dosen
Route::get('/admin_pbd', 'PinjambarangdsnController@indexAdmin');
Route::get('/admin_pbd/{data}', 'PinjambarangdsnController@edit');
Route::patch('/admin_pbd/Edit/{data}', 'PinjambarangdsnController@update');

// kajur dapat melihat sendiri hasil rekap peminjaman ruangan yang telah ia pinjam
Route::get('/rekap_prk', 'PinjamruangankjrController@indexKajur');

// admin mengubah status pinjam menjadi kembali pada peminjaman ruangan yang dilakukan oleh kajur
Route::get('/admin_prk', 'PinjamruangankjrController@indexAdmin');
Route::get('/admin_prk/{data}', 'PinjamruangankjrController@edit');
Route::patch('/admin_prk/Edit/{data}', 'PinjamruangankjrController@update');

// kajur dapat melihat sendiri hasil rekap peminjaman ruangan yang telah ia pinjam
Route::get('/rekap_pbk', 'PinjambarangkjrController@indexKajur');

// admin mengubah status pinjam menjadi kembali pada peminjaman barang yang dilakukan oleh kajur
Route::get('/admin_pbk', 'PinjambarangkjrController@indexAdmin');
Route::get('/admin_pbk/{data}', 'PinjambarangkjrController@edit');
Route::patch('/admin_pbk/Edit/{data}', 'PinjambarangkjrController@update');

// Peminjaman barang yang dilakukan oleh mahasiswa
Route::get('/pinjambarangmhs/create', 'PinjambarangmhsController@create');
Route::get('/pinjambarangmhs', 'PinjambarangmhsController@index');
Route::post('/pinjambarangmhs','PinjambarangmhsController@store');

// Peminjaman ruangan yang dilakukan oleh dosen
Route::get('/pinjamruangandsn/create', 'PinjamruangandsnController@create');
Route::get('/pinjamruangandsn', 'PinjamruangandsnController@index');
Route::post('/pinjamruangandsn','PinjamruangandsnController@store');

// Peminjaman barang yang dilakukan oleh dosen
Route::get('/pinjambarangdsn/create', 'PinjambarangdsnController@create');
Route::get('/pinjambarangdsn', 'PinjambarangdsnController@index');
Route::post('/pinjambarangdsn','PinjambarangdsnController@store');

// Peminjaman ruangan yang dilakukan oleh kajur
Route::get('/pinjamruangankjr/create', 'PinjamruangankjrController@create');
Route::get('/pinjamruangankjr', 'PinjamruangankjrController@index');
Route::post('/pinjamruangankjr','PinjamruangankjrController@store');

// Peminjaman barang yang dilakukan oleh kajur
Route::get('/pinjambarangkjr/create', 'PinjambarangkjrController@create');
Route::get('/pinjambarangkjr', 'PinjambarangkjrController@index');
Route::post('/pinjambarangkjr','PinjambarangkjrController@store');

///======================LOGIN DOSEN=======================
Route::get('/dashboard_dosen', 'LoginController@indexDosen');
Route::get('/logindosen', 'LoginController@logindosen');
Route::post('/logindosenPost', 'LoginController@logindosenPost');

///======================REGISTER DOSEN=======================
Route::get('/registerdosen', 'LoginController@registerdosen');
Route::post('/registerdosenPost', 'LoginController@registerdosenPost');
Route::get('/logoutdosen', 'LoginController@logoutdosen');

// Dosen
Route::get('/lecturers/Create', 'LecturersController@create');
Route::get('/lecturers', 'LecturersController@index');
Route::post('/lecturers', 'LecturersController@store');
Route::delete('/lecturers/{lecturer}', 'LecturersController@destroy');
Route::get('/lecturers/{lecturer}', 'LecturersController@edit');
Route::patch('/lecturers/Edit/{lecturer}', 'LecturersController@update');

///======================LOGIN MAHASISWA=======================
Route::get('/dashboard_mahasiswa', 'LoginController@indexMahasiswa');
Route::get('/loginmahasiswa', 'LoginController@loginmahasiswa');
Route::post('/loginmahasiswaPost', 'LoginController@loginmahasiswaPost');

///======================REGISTER MAHASISWA=======================
Route::get('/registermahasiswa', 'LoginController@registermahasiswa');
Route::post('/registermahasiswaPost', 'LoginController@registermahasiswaPost');
Route::get('/logoutmahasiswa', 'LoginController@logoutmahasiswa');

// Mahasiswa
Route::get('/users/Create', 'PenggunaController@create');
Route::get('/users', 'PenggunaController@index');
Route::post('/users', 'PenggunaController@store');
Route::delete('/users/{usr}', 'PenggunaController@destroy');
Route::get('/users/{usr}', 'PenggunaController@edit');
Route::patch('/users/Edit/{usr}', 'PenggunaController@update');
// Route::resource('users', 'PenggunaController');

///======================LOGIN KAJUR=======================
Route::get('/dashboard_kajur', 'LoginController@indexKajur');
Route::get('/loginkajur', 'LoginController@loginkajur');
Route::post('/loginkajurPost', 'LoginController@loginkajurPost');

///======================REGISTER KAJUR=======================
Route::get('/registerkajur', 'LoginController@registerkajur');
Route::post('/registerkajurPost', 'LoginController@registerkajurPost');
Route::get('/logoutkajur', 'LoginController@logoutkajur');

// Kajur
Route::get('/chiefs/Create', 'ChiefsController@create');
Route::get('/chiefs', 'ChiefsController@index');
Route::post('/chiefs', 'ChiefsController@store');
Route::delete('/chiefs/{chief}', 'ChiefsController@destroy');
Route::get('/chiefs/{chief}', 'ChiefsController@edit');
Route::patch('/chiefs/Edit/{chief}', 'ChiefsController@update');

///======================LOGIN ADMIN=======================
Route::get('/home', 'LoginController@indexAdmin');
Route::get('/loginadmin', 'LoginController@loginadmin');
Route::post('/loginadminPost', 'LoginController@loginadminPost');

///======================REGISTER ADMIN=======================
Route::get('/registeradmin', 'LoginController@registeradmin');
Route::post('/registeradminPost', 'LoginController@registeradminPost');
Route::get('/logoutadmin', 'LoginController@logoutadmin');

// Admin
Route::get('/admins/Create', 'AdminsController@create');
Route::get('/admins', 'AdminsController@index');
Route::post('/admins', 'AdminsController@store');
Route::delete('/admins/{admin}', 'AdminsController@destroy');
Route::get('/admins/{admin}', 'AdminsController@edit');
Route::patch('/admins/Edit/{admin}', 'AdminsController@update');

// Ruangan
Route::get('/rooms/Create', 'RoomsController@create');
Route::get('/rooms', 'RoomsController@index');
Route::post('/rooms', 'RoomsController@store');
Route::delete('/rooms/{room}', 'RoomsController@destroy');
Route::get('/rooms/{room}', 'RoomsController@edit');
Route::patch('/rooms/Edit/{room}', 'RoomsController@update');

// Barang
Route::get('/items/Create', 'ItemsController@create');
Route::get('/items', 'ItemsController@index');
Route::post('/items', 'ItemsController@store');
Route::delete('/items/{item}', 'ItemsController@destroy');
Route::get('/items/{item}', 'ItemsController@edit');
Route::patch('/items/Edit/{item}', 'ItemsController@update');