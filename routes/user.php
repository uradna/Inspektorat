<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserDaftarController;
use App\Http\Controllers\UserLaporController;
use App\Http\Controllers\UserPernyataanController;
use App\Http\Controllers\UserAccountController;

// ------------------------------------------------------------------------
//                            USER ROUTE - START                          |
// ------------------------------------------------------------------------
Route::get('/user', function () {
    return redirect()->route('user.dashboard');
});

Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::get('/user/data', [UserDaftarController::class, 'index'])->name('user.daftar');

Route::get('/user/lapor', [UserLaporController::class, 'index'])->name('user.lapor');
Route::post('/user/lapor', [UserLaporController::class, 'store'])->name('user.lapor.store');
Route::post('/user/lapor/delete', [UserLaporController::class, 'delete'])->name('user.lapor.delete');

Route::get('/user/pernyataan/{id}/biodata', [UserPernyataanController::class, 'formBio'])->name('user.pernyataan.biodata');
Route::post('/user/pernyataan/{id}/biodata', [UserPernyataanController::class, 'postBio'])->name('user.post.biodata');

Route::get('/user/pernyataan/{id}/point/{point}', [UserPernyataanController::class, 'formPoint'])->name('user.pernyataan.point');
Route::post('/user/pernyataan/{id}/point/{point}', [UserPernyataanController::class, 'postPoint'])->name('user.post.point');

Route::get('/user/pernyataan/{id}/lapor', [UserPernyataanController::class, 'formLapor'])->name('user.pernyataan.lapor');
Route::post('/user/pernyataan/{id}/lapor', [UserLaporController::class, 'simpan'])->name('user.post.lapor');
Route::post('/user/pernyataan/{id}/lapor/delete', [UserLaporController::class, 'hapus'])->name('user.pernyataan.lapor.delete');
Route::post('/user/pernyataan/{id}/lapor/selesai', [UserPernyataanController::class, 'doneLapor'])->name('user.pernyataan.lapor.selesai');

Route::get('/user/pernyataan/{id}/final', [UserPernyataanController::class, 'formFinal'])->name('user.pernyataan.final');
Route::post('/user/pernyataan/{id}/final', [UserPernyataanController::class, 'postFinal'])->name('user.pernyataan.final.post');

Route::get('/user/account', [UserAccountController::class, 'index'])->name('user.account');
Route::post('/user/account', [UserAccountController::class, 'update'])->name('user.update');
Route::post('/user/password', [UserAccountController::class, 'password'])->name('user.password');
