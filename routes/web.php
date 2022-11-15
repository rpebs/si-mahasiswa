<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('mahasiswa/tampil', [MahasiswaController::class, 'show'])->name('tampil')->middleware('auth');
Route::get('mahasiswa/tambah', [MahasiswaController::class, 'create'])->name('tambah')->middleware('auth');
Route::post('mahasiswa/simpan', [MahasiswaController::class, 'store'])->name('simpan')->middleware('auth');

Route::get('mahasiswa/ubah/{id}', [MahasiswaController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('mahasiswa/update', [MahasiswaController::class, 'update'])->name('update')->middleware('auth');

Route::get('mahasiswa/hapus/{id}', [MahasiswaController::class, 'delete'])->name('delete')->middleware('auth');
Route::get('mahasiswa/search', [MahasiswaController::class, 'search'])->name('search')->middleware('auth');

Route::get('jurusan/tampil', [JurusanController::class, 'show'])->name('tampiljurusan')->middleware('auth');
Route::get('jurusan/tambah', [JurusanController::class, 'create'])->name('tambahjurusan')->middleware('auth');
Route::post('jurusan/simpan', [JurusanController::class, 'store'])->name('simpanjurusan')->middleware('auth');

Route::get('jurusan/ubah/{npm}', [JurusanController::class, 'edit'])->name('editjurusan')->middleware('auth');
Route::post('jurusan/update', [JurusanController::class, 'update'])->name('updatejurusan')->middleware('auth');
Route::get('jurusan/hapus/{id}', [JurusanController::class, 'delete'])->name('deletejurusan')->middleware('auth');

Route::get('dosen/tampil', [DosenController::class, 'show'])->name('tampildosen')->middleware('auth');
Route::get('dosen/tambah', [DosenController::class, 'create'])->name('tambahdosen')->middleware('auth');
Route::post('dosen/simpan', [DosenController::class, 'store'])->name('simpandosen')->middleware('auth');
Route::get('dosen/ubah/{nip}', [DosenController::class, 'edit'])->name('ubahdosen')->middleware('auth');
Route::post('dosen/update',[DosenController::class, 'update'])->name('updatedosen')->middleware('auth');
Route::get('dosen/hapus/{nip}', [DosenController::class, 'delete'])->name('hapusdosen')->middleware('auth');

Route::get('matkul/tampil', [MataKuliahController::class, 'show'])->name('tampilmatkul')->middleware('auth');
Route::get('matkul/tambah', [MataKuliahController::class, 'create'])->name('tambahmatkul')->middleware('auth');
Route::post('matkul/simpan', [MataKuliahController::class, 'store'])->name('simpanmatkul')->middleware('auth');
Route::get('matkul/ubah/{kode_matkul}', [MataKuliahController::class, 'edit'])->name('ubahmatkul')->middleware('auth');
Route::post('matkul/update', [MataKuliahController::class, 'update'])->name('updatematkul')->middleware('auth');
Route::get('matkul/hapus/{kode_matkul}', [MataKuliahController::class, 'delete'])->name('hapusmatkul')->middleware('auth');

Route::get('jadwal/tampil', [JadwalController::class, 'show'])->name('tampiljadwal')->middleware('auth');
Route::get('jadwal/tambah', [JadwalController::class, 'create'])->name('tambahjadwal')->middleware('auth');
Route::post('jadwal/simpan', [JadwalController::class, 'store'])->name('simpanjadwal')->middleware('auth');

Route::get('jadwal/hapus/{id}', [JadwalController::class, 'delete'])->name('hapusjadwal')->middleware('auth');
