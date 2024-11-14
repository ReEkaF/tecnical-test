<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApproverController;
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
    Route::get('/peminjaman/create', [AdminController::class, 'create'])->name('admin.peminjaman.create');
    Route::post('/peminjaman/store', [AdminController::class, 'store'])->name('admin.peminjaman.store');
    //record
    Route::get('/record', [AdminController::class, 'record'])->name('admin.record');
    Route::get('/record/inuse/{id}', [AdminController::class, 'inuse'])->name('admin.record.inuse');
    Route::get('/record/used/{id}', [AdminController::class, 'used'])->name('admin.record.used');
    Route::post('/record/used/store', [AdminController::class, 'store_record'])->name('admin.record.store');

    //service
    Route::get('/service', [AdminController::class, 'service'])->name('admin.service');
    Route::get('/service/craate', [AdminController::class, 'service_create'])->name('admin.service.create');
    Route::post('/service/store', [AdminController::class, 'service_store'])->name('admin.service.store');
    Route::get('/service/inservice/{id}', [AdminController::class, 'inservice'])->name('admin.service.inservice');
    Route::get('/service/done/{id}', [AdminController::class, 'done'])->name('admin.service.done');
    

});

Route::group(['prefix' => 'admin-center', 'middleware' => ['web']], function () {
    Route::get('/dashboard', [ApproverController::class, 'index'])->name('admin-center.dashboard');
    Route::get('/approval', [ApproverController::class, 'booking'])->name('admin-center.booking');
    Route::get('/approval/setujui/{id}', [ApproverController::class, 'approved'])->name('admin-center.booking.approved');
    Route::get('/approval/tolak/{id}', [ApproverController::class, 'reject'])->name('admin-center.booking.reject');
});
