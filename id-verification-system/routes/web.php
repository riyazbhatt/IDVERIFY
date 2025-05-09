<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\IdVerificationController;
use App\Http\Controllers\DepartmentHeadController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/bulk-import', [AdminController::class, 'bulkImportForm'])->name('admin.bulk-import-form');
    Route::post('/admin/bulk-import', [AdminController::class, 'bulkImport'])->name('admin.bulk-import');
});

Route::middleware(['auth', 'role:department_head'])->group(function () {
    Route::get('/department-head/dashboard', [DepartmentHeadController::class, 'dashboard'])->name('department_head.dashboard');
    Route::get('/department-head/appointments', [DepartmentHeadController::class, 'appointments'])->name('department_head.appointments');
});

Route::get('/appointment/book', [AppointmentController::class, 'showBookingForm'])->name('appointment.book-form');
Route::post('/appointment/book', [AppointmentController::class, 'bookAppointment'])->name('appointment.book');

Route::get('/id-verification', [IdVerificationController::class, 'showVerificationPage'])->name('id_verification.page');
Route::post('/id-verification', [IdVerificationController::class, 'submitVerification'])->name('id_verification.submit');
Route::get('/id-verification/receipt/{uid}', [IdVerificationController::class, 'showReceipt'])->name('id_verification.receipt');
