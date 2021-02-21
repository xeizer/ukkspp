<?php

use App\Http\Controllers\BayarsppController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PetugasController;
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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/siswa', [SiswaController::class, 'index'])->middleware(['auth', 'role:admin'])->name('siswa.index');
Route::post('/siswa', [SiswaController::class, 'simpan'])->middleware(['auth', 'role:admin'])->name('siswa.simpan');
Route::get('/siswa/{id}', [SiswaController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('siswa.edit');
Route::post('/siswa/prosesedit/{id}', [SiswaController::class, 'prosesedit'])->middleware(['auth', 'role:admin'])->name('siswa.prosesedit');
Route::get('/siswa/hapus/{id}', [SiswaController::class, 'hapus'])->middleware(['auth', 'role:admin'])->name('siswa.hapus');


Route::get('/kelas', [KelasController::class, 'index'])->middleware(['auth', 'role:admin'])->name('kelas.index');
Route::post('/kelas', [KelasController::class, 'simpan'])->middleware(['auth', 'role:admin'])->name('kelas.simpan');
Route::get('/kelas/{id}', [KelasController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('kelas.edit');
Route::post('/kelas/prosesedit/{id}', [KelasController::class, 'prosesedit'])->middleware(['auth', 'role:admin'])->name('kelas.prosesedit');
Route::get('/kelas/hapus/{id}', [KelasController::class, 'hapus'])->middleware(['auth', 'role:admin'])->name('kelas.hapus');

Route::get('/spp', [SppController::class, 'index'])->middleware(['auth', 'role:admin'])->name('spp.index');
Route::post('/spp', [SppController::class, 'simpan'])->middleware(['auth', 'role:admin'])->name('spp.simpan');
Route::get('/spp/{id}', [SppController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('spp.edit');
Route::post('/spp/prosesedit/{id}', [SppController::class, 'prosesedit'])->middleware(['auth', 'role:admin'])->name('spp.prosesedit');
Route::get('/spp/hapus/{id}', [SppController::class, 'hapus'])->middleware(['auth', 'role:admin'])->name('spp.hapus');

Route::get('/petugas', [PetugasController::class, 'index'])->middleware(['auth', 'role:admin'])->name('petugas.index');
Route::post('/petugas', [PetugasController::class, 'simpan'])->middleware(['auth', 'role:admin'])->name('petugas.simpan');
Route::get('/petugas/{id}', [PetugasController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('petugas.edit');
Route::post('/petugas/prosesedit/{id}', [PetugasController::class, 'prosesedit'])->middleware(['auth', 'role:admin'])->name('petugas.prosesedit');
Route::get('/petugas/hapus/{id}', [PetugasController::class, 'hapus'])->middleware(['auth', 'role:admin'])->name('petugas.hapus');

Route::get('/bayar', [BayarsppController::class,'index'])->middleware(['auth', 'role:admin'])->name('bayar.index');
Route::post('/bayar/carisiswa', [BayarsppController::class,'carisiswa'])->middleware(['auth', 'role:admin|petugas'])->name('bayar.carisiswa');
Route::post('/bayar/{id}', [PembayaranController::class, 'bayar'])->middleware(['auth', 'role:admin|petugas'])->name('bayar.proses');

Route::get('/laporan', [PembayaranController::class, 'laporan'])->middleware(['auth', 'role:admin'])->name('laporan');
