<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPernyataanController;
use App\Http\Controllers\AdminPegawaiController;
use App\Http\Controllers\AdminDeletePegawaiController;
use App\Http\Controllers\AdminAccountController;

// ------------------------------------------------------------------------
//                            ADMIN ROUTE - START                          |
// ------------------------------------------------------------------------
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/pegawai', [AdminPegawaiController::class, 'index'])->name('admin.pegawai');
Route::post('/admin/pegawai/edit', [AdminPegawaiController::class, 'edit'])->name('admin.pegawai.edit');
Route::post('/admin/pegawai/password', [AdminPegawaiController::class, 'password'])->name('admin.pegawai.password');
Route::get('/admin/pegawai/edit', function () {
    return redirect()->route('admin.pegawai');
});
Route::get('/admin/pegawai/password', function () {
    return redirect()->route('admin.pegawai');
});
Route::get('/admin/pegawai/delete/remove', function () {
    return redirect()->route('admin.pegawai.delete');
});

Route::get('/admin/pegawai/delete', [AdminDeletePegawaiController::class, 'index'])->name('admin.pegawai.delete.list');
Route::post('/admin/pegawai/delete', [AdminDeletePegawaiController::class, 'delete'])->name('admin.pegawai.delete');
Route::post('/admin/pegawai/delete/remove', [AdminDeletePegawaiController::class, 'remove'])->name('admin.pegawai.remove');

Route::get('/admin/pernyataan', [AdminPernyataanController::class, 'index'])->name('admin.pernyataan');
Route::get('/admin/pernyataan/{id}/{tahun}/{semester}', [AdminPernyataanController::class, 'detail'])->name('admin.pernyataan.detail');
Route::get('/admin/pernyataan/terakhir/{id}', [AdminPernyataanController::class, 'latest'])->name('admin.pernyataan.latest');

Route::get('/admin/account', [AdminAccountController::class, 'index'])->name('admin.account');
Route::post('/admin/password', [AdminAccountController::class, 'password'])->name('admin.password');


Route::get('/admin/ajax', [AdminPegawaiController::class, 'ajax'])->name('admin.ajax');

Route::get('/admin/pernyataan/ajax/{id}/{tahun}/{semester}', [AdminPernyataanController::class, 'ajax'])->name('admin.pernyataan.ajax');
Route::get('/admin/ajax/terakhir/{id}', [AdminPernyataanController::class, 'ajaxLatest'])->name('admin.pernyataan.ajaxLatest');
