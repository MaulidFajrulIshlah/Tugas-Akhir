<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\MasterPenggunaController;
use App\Http\Controllers\PengecekanServerController;
use App\Http\Controllers\RekaptulasiRpsController;
use Illuminate\Support\Facades\Request;

use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return view('test');
});

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/postLogin', [LoginController::class, 'authenticate'])->name('postLogin');
    Route::get('/forbidden', [LoginController::class, 'forbidden'])->name('unauthorized');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// mengalihkan route
Route::redirect('/', '/login');

Route::middleware('auth')->group(function () {
    // Beranda
    Route::get('/dashboard/beranda', [BerandaController::class, 'CheckStatusServer'])->name('beranda');

    // Mata Kuliah
    Route::get('/dashboard/matakuliah', [MataKuliahController::class, 'index'])->name('mataKuliah');

    // Akademik
    Route::get('/dashboard/akademik', [AkademikController::class, 'index'])->name('akademik');

    // Pengecekan Server
    Route::get('/dashboard/pengecekanserver', [PengecekanServerController::class, 'index'])->name('pengecekanServer');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
});




// Master Data
Route::middleware(['auth', 'cekUserLogin:1'])->group(function () {
    Route::get('/masterdata/pengguna', [MasterPenggunaController::class, 'index'])->name('masterUser');
    Route::get('/masterdata/pengguna/create', [MasterPenggunaController::class, 'create'])->name('createUser');
    Route::get('/masterdata/pengguna/edit/{id}', [MasterPenggunaController::class, 'edit'])->name('updateUser');
    Route::get('/masterdata/pengguna/delete/{id}', [MasterPenggunaController::class, 'destroy'])->name('deleteUser');
    Route::post('/masterdata/pengguna/prosesCreate', [MasterPenggunaController::class, 'store'])->name('prosesCreate');
    Route::post('/masterdata/pengguna/prosesUpdate', [MasterPenggunaController::class, 'update'])->name('prosesUpdate');
});
