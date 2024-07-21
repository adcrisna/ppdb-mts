<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::any('/', [IndexController::class, 'index'])->name('index');
Route::any('/informasi_pendaftaran', [IndexController::class, 'informasi_pendaftaran'])->name('informasi_pendaftaran');
Route::any('/kontak_kami', [IndexController::class, 'kontak_kami'])->name('kontak_kami');
Route::any('/jalur_pendaftaran', [IndexController::class, 'jalur_pendaftaran'])->name('jalur_pendaftaran');
Route::any('/login', [LoginController::class, 'login'])->name('login');
Route::any('/register', [RegisterController::class, 'index'])->name('register');
Route::any('/proses_register', [RegisterController::class, 'register'])->name('proses_register');
Route::any('/proses_login', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');
Route::any('/bukti_pendaftaran/{id}', [IndexController::class, 'pdfBuktiPendaftaran'])->name('pdfBuktiPendaftaran');
Route::any('/bukti_hasilseleksi/{id}', [IndexController::class, 'pdfBuktiHasilSeleksi'])->name('pdfBuktiHasilSeleksi');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware(['admin'])->group(function () {
        Route::any('/home', [AdminController::class, 'index'])->name('admin.index');
        Route::any('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::any('/update_profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

        Route::any('/user', [AdminController::class, 'user'])->name('admin.user');
        Route::any('/addUser', [AdminController::class, 'addUser'])->name('admin.addUser');
        Route::any('/updateUser', [AdminController::class, 'updateUser'])->name('admin.updateUser');
        Route::any('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

        Route::any('/verifikasi_berkas', [AdminController::class, 'verifikasi_berkas'])->name('admin.verifikasi_berkas');
        Route::any('/detail_verifikasi/{id}', [AdminController::class, 'detail_verifikasi'])->name('admin.detail_verifikasi');
        Route::any('/delete_berkas/{id}', [AdminController::class, 'delete_berkas'])->name('admin.delete_berkas');
        Route::any('/verifikasi', [AdminController::class, 'verifikasi'])->name('admin.verifikasi');

        Route::any('/data_seleksi', [AdminController::class, 'data_seleksi'])->name('admin.data_seleksi');
        Route::any('/detail_seleksi/{id}', [AdminController::class, 'detail_seleksi'])->name('admin.detail_seleksi');
        Route::any('/delete_seleksi/{id}', [AdminController::class, 'delete_seleksi'])->name('admin.delete_seleksi');
        Route::any('/seleksi', [AdminController::class, 'seleksi'])->name('admin.seleksi');
        Route::any('/pdfHasilSeleksi', [AdminController::class, 'pdfHasilSeleksi'])->name('admin.pdfHasilSeleksi');
        Route::any('/pdfPendaftaran', [AdminController::class, 'pdfPendaftaran'])->name('admin.pdfPendaftaran');
        Route::any('/riwayat_cabut_berkas', [AdminController::class, 'riwayat_cabut_berkas'])->name('admin.riwayat_cabut_berkas');
        Route::any('/riwayat_pendaftaran', [AdminController::class, 'riwayat_pendaftaran'])->name('admin.riwayat_pendaftaran');
        Route::any('/pdf_riwayat', [AdminController::class, 'pdfRiwayat'])->name('admin.pdfRiwayat');

        Route::any('/admin', [AdminController::class, 'admin'])->name('admin.admin');
        Route::any('/addAdmin', [AdminController::class, 'addAdmin'])->name('admin.addAdmin');
        Route::any('/updateAdmin', [AdminController::class, 'updateAdmin'])->name('admin.updateAdmin');
        Route::any('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.deleteAdmin');

        Route::any('/setting', [AdminController::class, 'setting'])->name('admin.setting');
        Route::any('/update_setting', [AdminController::class, 'updateSetting'])->name('admin.updateSetting');

        Route::any('/cabut_berkas', [PendaftaranController::class, 'cabut_berkas'])->name('admin.cabut_berkas');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('user')->middleware(['user'])->group(function () {
        Route::any('/home', [UserController::class, 'index'])->name('user.index');
        Route::any('/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::any('/update_profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
        Route::any('/informasi_pendaftaran', [UserController::class, 'informasi_pendaftaran'])->name('user.informasi_pendaftaran');
        Route::any('/kontak_kami', [UserController::class, 'kontak_kami'])->name('user.kontak_kami');
        Route::any('/jalur_pendaftaran', [UserController::class, 'jalur_pendaftaran'])->name('user.jalur_pendaftaran');

        Route::any('/pendaftaran_reguler', [PendaftaranController::class, 'pendaftaran_reguler'])->name('user.pendaftaran_reguler');
        Route::any('/pendaftaran_prestasi', [PendaftaranController::class, 'pendaftaran_prestasi'])->name('user.pendaftaran_prestasi');
        Route::any('/addPendaftaran', [PendaftaranController::class, 'addPendaftaran'])->name('user.addPendaftaran');
        Route::any('/data_pendaftaran', [PendaftaranController::class, 'data_pendaftaran'])->name('user.data_pendaftaran');
        Route::any('/hasil_seleksi', [PendaftaranController::class, 'hasil_seleksi'])->name('user.hasil_seleksi');
        Route::any('/peringkat', [PendaftaranController::class, 'peringkat'])->name('user.peringkat');
    });
});
