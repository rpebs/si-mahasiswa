<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;

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
