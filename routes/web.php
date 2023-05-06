<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;

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

// Route::get('/', [LayoutController::class, 'index'])->name('beranda');

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda')->middleware('auth');

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/prosesLogin', [LoginController::class, 'authenticate'])->name('prosesLogin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Middleware  
Route::middleware(['auth'])->group(function () {
    // jika sebagai Admin
    Route::middleware(['cekUserLogin:Admin'])->group(function () {
        // Route::resource('admin', AdminController::class);

        // Mahasiswa
        Route::controller(MahasiswaController::class)->group(function () {
            Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
        });
    });

    // jika sebagai dekanat
    Route::middleware(['cekUserLogin:Dekanat'])->group(function () {
        // Route::resource('dekanat', DekanatController::class);

        // Mahasiswa
        Route::controller(MahasiswaController::class)->group(function () {
            Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
        });
    });
});
