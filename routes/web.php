<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MakulController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'createUser'])->name('users.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/delete', [ProfileController::class,'delete'])->name('profile.delete');
    Route::delete('profile', [ProfileController::class,'destroy'])->name('profile.destroy');

    Route::get('mahasiswa/createMahasiswa', [MahasiswaController::class, 'createMahasiswa'])->name('create.mahasiswa');;
    Route::post('/saveMahasiswa', [MahasiswaController::class, 'saveMahasiswa']);
    Route::get('mahasiswa/readMahasiswa', [MahasiswaController::class, 'readMahasiswa'])->name('read.mahasiswa');
    Route::get('/updateMahasiswa/{nim}', [MahasiswaController::class, 'updateMahasiswa']);
    Route::post('/editMahasiswa', [MahasiswaController::class, 'editMahasiswa']);
    Route::get('/deleteMahasiswa/{nim}', [MahasiswaController::class, 'deleteMahasiswa']);
    Route::get('/viewMahasiswa', [MahasiswaController::class, 'viewMahasiswa']);

    Route::get('mata_kuliah/createMataKuliah', [MakulController::class, 'createMatakuliah'])->name('create.mata_kuliah');;
    Route::post('/saveMataKuliah', [MakulController::class, 'saveMataKuliah']);
    Route::get('mata_kuliah/readMataKuliah', [MakulController::class, 'readMataKuliah'])->name('read.mata_kuliah');
    Route::get('/updateMataKuliah/{id_makul}', [MakulController::class, 'updateMataKuliah']);
    Route::post('/editMataKuliah', [MakulController::class, 'editMataKuliah']);
    Route::get('/deleteMataKuliah/{id_makul}', [MakulController::class, 'deleteMataKuliah']);
    Route::get('/viewMataKuliah', [MakulController::class, 'viewMataKuliah']);

    Route::get('dosen/createDosen', [DosenController::class, 'createDosen'])->name('create.dosen');;
    Route::post('/saveDosen', [DosenController::class, 'saveDosen']);
    Route::get('dosen/readDosen', [DosenController::class, 'readDosen'])->name('read.dosen');
    Route::get('/updateDosen/{id_dosen}', [DosenController::class, 'updateDosen']);
    Route::post('/editDosen', [DosenController::class, 'editDosen']);
    Route::get('/deleteDosen/{id_dosen}', [DosenController::class, 'deleteDosen']);
    Route::get('/viewDosen', [DosenController::class, 'viewDosen']);
});
