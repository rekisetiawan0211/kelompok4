<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('Data')->group(function () {

    // Buku
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/universitas', [App\Http\Controllers\UniversitasController::class, 'index'])->name('get.universitas');
        Route::get('/universitas/tambah', [App\Http\Controllers\UniversitasController::class, 'tambah'])->name('get.tambah.universitas');
        Route::post('/universitas/tambah/proses', [App\Http\Controllers\UniversitasController::class, 'proses_tambah'])->name('post.proses-tambah.universitas');
        Route::get('/universitas/detail/{id}', [App\Http\Controllers\UniversitasController::class, 'detail'])->name('get.detail.universitas');
        Route::get('/universitas/ubah/{id}', [App\Http\Controllers\UniversitasController::class, 'ubah'])->name('get.ubah.universitas');
        Route::patch('/universitas/ubah/proses/{id}', [App\Http\Controllers\UniversitasController::class, 'proses_ubah'])->name('post.proses-ubah.universitas');
        Route::delete('/universitas/hapus/{id}', [App\Http\Controllers\UniversitasController::class, 'hapus'])->name('delete.universitas');
    });


    // Penerbit
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('get.mahasiswa');
        Route::get('/mahasiswa/tambah', [App\Http\Controllers\MahasiswaController::class, 'tambah'])->name('get.tambah.mahasiswa');
        Route::post('/mahasiswa/tambah/proses', [App\Http\Controllers\MahasiswaController::class, 'proses_tambah'])->name('post.proses-tambah.mahasiswa');
        Route::get('/mahasiswa/detail/{id}', [App\Http\Controllers\MahasiswaController::class, 'detail'])->name('get.detail.mahasiswa');
        Route::get('/mahasiswa/ubah/{id}', [App\Http\Controllers\MahasiswaController::class, 'ubah'])->name('get.ubah.mahasiswa');
        Route::patch('/mahasiswa/ubah/proses/{id}', [App\Http\Controllers\MahasiswaController::class, 'proses_ubah'])->name('post.proses-ubah.mahasiswa');
        Route::delete('/mahasiswa/hapus/{id}', [App\Http\Controllers\MahasiswaController::class, 'hapus'])->name('delete.mahasiswa');
    });


});

// No Prefix
    Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/tentang', [App\Http\Controllers\HomeController::class, 'tentang'])->name('tentang');

    });
