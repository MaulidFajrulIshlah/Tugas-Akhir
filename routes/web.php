<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\MahasiswaController;

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

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/postLogin', [LoginController::class, 'authenticate'])->name('postLogin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// mengalihkan route
Route::redirect('/', '/login');

// Beranda
Route::get('/dashboard/beranda', [BerandaController::class, 'index'])->name('beranda')->middleware('auth');

// Mahasiswa
Route::get('/dashboard/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa')->middleware('auth');
