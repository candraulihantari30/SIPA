<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BanjarAdatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\KramaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UrunanController;
use App\Http\Controllers\DadyaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PrajuruDesaController;
use App\Http\Controllers\TempekanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RekapAbsenController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

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
//     return view('welcome');
// });




// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/', [UserController::class, 'index'])->middleware('guest');
Route::get('jadwal-kegiatan/{id}/detail', [UserController::class, 'detailKegiatan'])->name('detail.kegiatan')->middleware('guest');

Route::group(['middleware' => ['auth:krama', 'ceklevel:krama']], function () {
    Route::get('/beranda', [DashboardContoller::class, 'index'])->name('dashboard');
    Route::resource('keluarga', KramaController::class);
    // Route::get('/keluarga', [KramaController::class, 'keluarga'])->name('keluarga');
    Route::get('profil/{id}/edit', [ProfilController::class, 'edit'])->name('edit.profil');
    Route::get('profil/{id}/detail', [ProfilController::class, 'detail'])->name('profil.detail');
    Route::put('profil/{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::get('/tempekan/{id}', [TempekanController::class, 'select'])->name('tempekan.select');
    Route::get('nota-urunan', [NotaController::class, 'urunan'])->name('nota.urunan');
    Route::get('nota-denda', [NotaController::class, 'index'])->name('nota.denda');
    Route::resource('iuran', UrunanController::class);
    Route::get('/detailKeluarga/{krama}', [KramaController::class, 'keluargadetail'])->name('keluarga.detail');
});

Route::group(['middleware' => ['auth:prajuru', 'ceklevel:prajuru,kelian_tempekan']], function () {
    Route::resource('prajuru', PrajuruDesaController::class);
    Route::get('/dashboard', [DashboardContoller::class, 'index'])->name('dashboard');
    Route::get('/tempekan/{id}', [TempekanController::class, 'select'])->name('tempekan.select');
    Route::resource('krama', KramaController::class);
    Route::get('/detail-keluarga/{krama}', [KramaController::class, 'detailKeluarga'])->name('krama.detail-krama');
    Route::resource('JadwalKegiatan', KegiatanController::class);
    Route::resource('Urunan', UrunanController::class);
    Route::resource('Dadya', DadyaController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::get('Urunan/{id_irnw}/set-status', [UrunanController::class, 'setstatus'])->name('Urunan.status');
    // Route::get('profil/{id}/edit', [ProfilController::class, 'edit'])->name('edit.profil');
    // Route::get('profil/{id}/detail', [ProfilController::class, 'detail'])->name('profil.detail');
    // Route::put('profil/{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::get('/tempekan/{id}', [TempekanController::class, 'select'])->name('tempekan.select');
    Route::get('tambah/{id_kegiatan}', [AbsensiController::class, 'tambah'])->name('absen.create');
    Route::get('nota', [NotaController::class, 'index'])->name('nota');
    Route::get('rekap', [RekapAbsenController::class, 'index'])->name('rekap');
    Route::get('detail/{id}/rekap', [RekapAbsenController::class, 'detailrekap'])->name('detail.rekap');
    Route::post('rekap/create', [RekapAbsenController::class, 'store'])->name('rekap.store');
    Route::get('pembayaran', [TransaksiController::class, 'index'])->name('pembayaran');
    Route::post('transaksi/create', [TransaksiController::class, 'store'])->name('transaksi');
    Route::get('transaksi', [TransaksiController::class, 'transaksi'])->name('data_transaksi');
    Route::get('transaksi/{id}/detail', [TransaksiController::class, 'detail_transaksi'])->name('data_transaksi.detail');
    Route::get('kwitansi/{id} ', [TransaksiController::class, 'kwitansi'])->name('kwitansi');
});
