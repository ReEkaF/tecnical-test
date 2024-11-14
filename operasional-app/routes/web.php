<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApproverController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\RecordBookingController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/booking', [BookingController::class, 'index'])->name('admin.booking');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('admin.booking.create');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('admin.booking.store');
    //record
    Route::get('/record', [RecordBookingController::class, 'index'])->name('admin.record');
    Route::get('/record/inuse/{id}', [RecordBookingController::class, 'inuse'])->name('admin.record.inuse');
    Route::get('/record/used/{id}', [RecordBookingController::class, 'used'])->name('admin.record.used');
    Route::post('/record/used/store', [RecordBookingController::class, 'store'])->name('admin.record.store');

    //service
    Route::get('/service', [AdminController::class, 'service'])->name('admin.service');
    Route::get('/service/craate', [AdminController::class, 'service_create'])->name('admin.service.create');
    Route::post('/service/store', [AdminController::class, 'service_store'])->name('admin.service.store');
    Route::get('/service/inservice/{id}', [AdminController::class, 'inservice'])->name('admin.service.inservice');
    Route::get('/service/done/{id}', [AdminController::class, 'done'])->name('admin.service.done');
    //report
    Route::get('/report', [ReportController::class, 'index'])->name('admin.report');
    Route::post('/report/excel', [ExportController::class, 'exportBooking'])->name('admin.excel.booking');

});

Route::group(['prefix' => 'admin-center', 'middleware' => ['admin-center']], function () {
    Route::get('/dashboard', [ApproverController::class, 'index'])->name('admin-center.dashboard');
    Route::get('/approval', [ApproverController::class, 'booking'])->name('admin-center.booking');
    Route::get('/approval/setujui/{id}', [ApproverController::class, 'approved'])->name('admin-center.booking.approved');
    Route::get('/approval/tolak/{id}', [ApproverController::class, 'reject'])->name('admin-center.booking.reject');
    Route::get('/report', [ApproverController::class, 'report'])->name('admin-center.report');
    Route::post('/report/excel', [ExportController::class, 'exportBooking'])->name('admin-center.excel.booking');
});
