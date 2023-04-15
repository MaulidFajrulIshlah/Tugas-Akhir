<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DekanatController;

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

Route::get('/', [LayoutController::class, 'index'])->name('beranda');

Route::get('/beranda', [LayoutController::class, 'index'])->middleware('auth');

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Middleware  
Route::middleware(['auth'])->group(function () {
    Route::middleware(['cekUserLogin:1'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/beranda/mahasiswa', [AdminController::class, 'index']);
        });
    });
    Route::middleware(['cekUserLogin:2'])->group(function () {
        Route::get('/dekanat/mahasiswa', [DekanatController::class, 'index']);
    });
});
