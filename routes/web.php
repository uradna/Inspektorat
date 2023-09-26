<?php

use Illuminate\Support\Facades\Route;
// --------------------------------------------------------------Controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\UserBantuanController;

use App\Http\Controllers\SuperadminDashboardController;
use App\Http\Controllers\SuperadminLaporanController;
use App\Http\Controllers\SuperadminPernyataanController;
use App\Http\Controllers\SuperadminJadwalController;
use App\Http\Controllers\SuperadminPegawaiController;
use App\Http\Controllers\SuperadminHapusController;
use App\Http\Controllers\SuperadminAdminController;
use App\Http\Controllers\SuperadminBantuanController;
use App\Http\Controllers\SuperadminPensiunController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\TestAjaxController;

//
// use App\Http\Controllers\TestController;

//
Route::get('/test', [TestController::class, 'index'])->name('test');
Route::get('/logout', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/print/{id}', [PrintController::class, 'print'])->name('user.print');
Route::get('/pdf/{id}', [PrintController::class, 'pdf'])->name('user.pdf');

Route::get('lapor/print/{id}', [PrintController::class, 'laporprint'])->name('lapor.print');
Route::get('lapor/pdf/{id}', [PrintController::class, 'laporpdf'])->name('lapor.pdf');

Route::get('pernyataan/print/{id}/{user}', [PrintController::class, 'pprint'])->name('pernyataan.print');
Route::get('pernyataan/pdf/{id}/{user}', [PrintController::class, 'ppdf'])->name('pernyataan.pdf');

Route::get('/bantuan', [UserBantuanController::class, 'index'])->name('bantuan');
// ------------------------------------------------------------------------
//                           ADMIN ROUTE - START                          |
// ------------------------------------------------------------------------





// ------------------------------------------------------------------------
//                         SUPERADMIN ROUTE - START                       |
// ------------------------------------------------------------------------
Route::get('/superadmin', [SuperadminDashboardController::class, 'index'])->name('superadmin.dashboard');
Route::get('/superadmin/laporan', [SuperadminLaporanController::class, 'index'])->name('superadmin.laporan');


Route::get('/superadmin/pernyataan', [SuperadminPernyataanController::class, 'index'])->name('superadmin.pernyataan');

Route::get('/superadmin/pernyataan/{id}', [SuperadminPernyataanController::class, 'jadwal'])->name('superadmin.pernyataan.jadwal');

Route::get('/superadmin/terakhir', [SuperadminPernyataanController::class, 'terakhir'])->name('superadmin.pernyataan.terakhir');

Route::get('/superadmin/terakhir/{pd}', [SuperadminPernyataanController::class, 'terakhirpd'])->name('superadmin.pernyataan.terakhir.pd');
Route::get('/superadmin/ajax/terakhir/{pd}', [SuperadminPernyataanController::class, 'terakhirpdAjax'])->name('superadmin.pernyataan.terakhir.pd.ajax');

Route::get('/superadmin/pernyataan/{id}/{pd}', [SuperadminPernyataanController::class, 'jadwalpd'])->name('superadmin.pernyataan.jadwal.pd');
Route::get('/superadmin/ajax/pernyataan/{id}/{pd}', [SuperadminPernyataanController::class, 'jadwalpdAjax'])->name('superadmin.pernyataan.jadwal.pd.ajax');

Route::get('/superadmin/jadwal', [SuperadminJadwalController::class, 'index'])->name('superadmin.jadwal');
Route::post('/superadmin/create', [SuperadminJadwalController::class, 'create'])->name('superadmin.jadwal.create');
Route::post('/superadmin/edit', [SuperadminJadwalController::class, 'edit'])->name('superadmin.jadwal.edit');
Route::post('/superadmin/close', [SuperadminJadwalController::class, 'close'])->name('superadmin.jadwal.close');

Route::get('/superadmin/pegawai', [SuperadminPegawaiController::class, 'index'])->name('superadmin.pegawai');
Route::get('/superadmin/pegawai/pd/{pd}', [SuperadminPegawaiController::class, 'pd'])->name('superadmin.pegawai.pd');
Route::get('/superadmin/ajax/pegawai/pd/{pd}', [SuperadminPegawaiController::class, 'pegawaiAjax'])->name('superadmin.pegawai.pd.ajax');
Route::get('/superadmin/pegawai/search', [SuperadminPegawaiController::class, 'search'])->name('superadmin.pegawai.search');

Route::post('/superadmin/pegawai/edit', [SuperadminPegawaiController::class, 'edit'])->name('superadmin.pegawai.edit');
Route::post('/superadmin/pegawai/password', [SuperadminPegawaiController::class, 'password'])->name('superadmin.pegawai.password');
Route::post('/superadmin/pegawai/delete', [SuperadminPegawaiController::class, 'delete'])->name('superadmin.pegawai.delete');
Route::post('/superadmin/pegawai/add', [SuperadminPegawaiController::class, 'add'])->name('superadmin.pegawai.add');

Route::get('/superadmin/pensiun/{usia}', [SuperadminPensiunController::class, 'index'])->name('superadmin.pensiun');



Route::get('/superadmin/hapus', [SuperadminHapusController::class, 'index'])->name('superadmin.hapus');
Route::post('/superadmin/tolak', [SuperadminHapusController::class, 'tolak'])->name('superadmin.hapus.tolak');
Route::post('/superadmin/setuju', [SuperadminHapusController::class, 'setuju'])->name('superadmin.hapus.setuju');
Route::post('/superadmin/hapus/restore', [SuperadminHapusController::class, 'restore'])->name('superadmin.hapus.restore');

Route::get('/superadmin/hapus/user', [SuperadminHapusController::class, 'list'])->name('superadmin.hapus.user');

Route::get('/superadmin/hapus/reject', [SuperadminHapusController::class, 'reject'])->name('superadmin.hapus.reject');

Route::get('/superadmin/admin', [SuperadminAdminController::class, 'index'])->name('superadmin.admin');
Route::post('/superadmin/admin/create', [SuperadminAdminController::class, 'add'])->name('superadmin.admin.add');
Route::post('/superadmin/admin/pass', [SuperadminAdminController::class, 'pass'])->name('superadmin.admin.password');
Route::post('/superadmin/admin/delete', [SuperadminAdminController::class, 'del'])->name('superadmin.admin.del');

Route::get('/superadmin/banner', [BannerController::class, 'index'])->name('superadmin.banner');
Route::post('/superadmin/banner/create', [BannerController::class, 'create'])->name('superadmin.banner.create');
Route::post('/superadmin/banner/edit', [BannerController::class, 'edit'])->name('superadmin.banner.edit');
Route::post('/superadmin/banner/delete', [BannerController::class, 'delete'])->name('superadmin.banner.delete');

Route::get('/superadmin/bantuan/user/{for}', [SuperadminBantuanController::class, 'index'])->name('superadmin.help');
Route::post('/superadmin/bantuan/create', [SuperadminBantuanController::class, 'create'])->name('superadmin.help.create');
Route::get('/superadmin/bantuan/new/{for}', [SuperadminBantuanController::class, 'new'])->name('superadmin.help.new');
Route::get('/superadmin/bantuan/edit/{id}', [SuperadminBantuanController::class, 'edit'])->name('superadmin.help.edit');
Route::post('/superadmin/bantuan/update', [SuperadminBantuanController::class, 'update'])->name('superadmin.help.update');
Route::post('/superadmin/bantuan/delete/', [SuperadminBantuanController::class, 'delete'])->name('superadmin.help.delete');
Route::get('/superadmin/bantuan/up/{a}/{b}/{c}/{d}', [SuperadminBantuanController::class, 'up'])->name('superadmin.help.up');


require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/admin.php';

// Route::fallback(function () {
//     // abort(404);
//     return redirect()->route('home');
// });
