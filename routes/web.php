<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\FosterChildController;
use App\Http\Controllers\backend\ActivityController;
use App\Http\Controllers\backend\PosterController;
use App\Http\Controllers\backend\FoundationProfileController;

use App\Http\Controllers\frontend\BerandaController;
use App\Http\Controllers\frontend\AnakAsuhController;
use App\Http\Controllers\frontend\KegiatanController;
use App\Http\Controllers\frontend\ProfilController;

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

Route::get('/', [BerandaController::class, 'index']);
Route::get('/konten-beranda', [BerandaController::class, 'kontenBeranda']);
Route::get('/konten-dokumentasi/{id}', [BerandaController::class, 'kontenDokumentasi']);
Route::get('/anak-asuh', [AnakAsuhController::class, 'index']);
Route::get('/konten-anak-asuh', [AnakAsuhController::class, 'kontenAnakAsuh']);
Route::get('/detail-anak-asuh/{id}', [AnakAsuhController::class, 'detailAnakAsuh']);
Route::get('/kegiatan', [KegiatanController::class, 'index']);
Route::get('/konten-kegiatan', [KegiatanController::class, 'kontenKegiatan']);
Route::get('/detail-kegiatan/{id}', [KegiatanController::class, 'detailKegiatan']);
Route::get('/muat-lebih/{id}', [KegiatanController::class, 'muatLebih']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/konten-profil', [ProfilController::class, 'kontenProfil']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [DashboardController::class, 'index']);

/*********************************** Route Anak Asuh **************************************************/
Route::get('/admin/anak-asuh', [FosterChildController::class, 'index']);
Route::post('/admin/anak-asuh/tambah-anak-asuh',[FosterChildController::class, 'store']);
Route::get('/admin/anak-asuh/lihat-detail-anak-asuh/{id}', [FosterChildController::class, 'lihatDetailAnakAsuh']);
Route::get('/admin/anak-asuh/edit-anak-asuh/{id}',[FosterChildController::class, 'edit']);
Route::post('/admin/anak-asuh/update-anak-asuh/{id}',[FosterChildController::class, 'update']);
Route::get('/admin/anak-asuh/modal-hapus-anak-asuh/{id}',[FosterChildController::class, 'modalHapus']);
Route::delete('/admin/anak-asuh/hapus-anak-asuh/{id}',[FosterChildController::class, 'destroy']);

/*********************************** Route Kegiatan **************************************************/
Route::get('/admin/kegiatan',[ActivityController::class, 'index']);
Route::post('/admin/kegiatan/tambah-kegiatan',[ActivityController::class, 'store']);
Route::get('/admin/kegiatan/lihat-detail-kegiatan/{id}', [ActivityController::class, 'lihatDetailKegiatan']);
Route::get('/admin/kegiatan/modal-hapus-kegiatan/{id}',[ActivityController::class, 'modalHapus']);
Route::delete('/admin/kegiatan/hapus-kegiatan/{id}',[ActivityController::class, 'destroy']);

/*********************************** Route Poster **************************************************/
Route::get('/admin/poster',[PosterController::class, 'index']);
Route::get('/admin/poster/data-poster',[PosterController::class, 'dataPoster']);
Route::post('/admin/poster/tambah-poster',[PosterController::class, 'store']);
Route::post('/admin/poster/ubah-status-tampil-poster/{id}',[PosterController::class, 'update']);

/*********************************** Route Profil Yayasan **************************************************/
Route::get('/admin/profil-yayasan',[FoundationProfileController::class, 'index']);
Route::get('/admin/profil-yayasan/tampil-profil',[FoundationProfileController::class, 'tampilProfil']);
Route::post('/admin/profil-yayasan/tambah-profil',[FoundationProfileController::class, 'store']);