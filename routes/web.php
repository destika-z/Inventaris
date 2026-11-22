<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanPerbaikanController;

Route::get('/', function () {

    $config = [
        'app_name' => config('app.name')
    ];

    return view('welcome', compact('config'));

});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    Route::resource('user', UserController::class);

    Route::resource('kategori', KategoriController::class);

    Route::resource('lokasi', LokasiController::class);


    Route::get('/barang/laporan', [BarangController::class, 'cetakLaporan'])
        ->name('barang.laporan');

    Route::resource('barang', BarangController::class);


    Route::get('/lokasi/{lokasi}/barang', [LokasiController::class, 'lihatBarang'])
        ->name('lokasi.barang');


    Route::get('/kategori/{kategori}/barang', [KategoriController::class, 'lihatBarang'])
        ->name('kategori.barang');


    // LAPORAN PERBAIKAN
    Route::resource('laporan-perbaikan', LaporanPerbaikanController::class);


    Route::get(
        '/laporan-perbaikan/{laporan}/detail',
        [LaporanPerbaikanController::class, 'detail']
    )->name('laporan-perbaikan.detail');


    Route::patch(
        '/laporan-perbaikan/{laporan}/mulai',
        [LaporanPerbaikanController::class, 'mulai']
    )->name('laporan-perbaikan.mulai');


    Route::patch(
        '/laporan-perbaikan/{laporan}/selesai',
        [LaporanPerbaikanController::class, 'selesai']
    )->name('laporan-perbaikan.selesai');

});


require __DIR__.'/auth.php';