<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/buat_peminjaman', [AdminController::class, 'BuatPeminjaman'])->name('admin.buat_peminjaman');
    Route::get('/ajukan_peminjaman', [AdminController::class, 'AjukanPeminjaman'])->name('admin.ajukan_peminjaman');
});