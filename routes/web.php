<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPricelistController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth Routes (sudah ada dari laravel/ui)
Auth::routes();

// User Routes (perlu login)
Route::middleware('auth')->group(function () {
    Route::get('/appointments/create/{pricelist}', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{id}/payment', [AppointmentController::class, 'payment'])->name('appointments.payment');
    Route::post('/appointments/{id}/confirm-payment', [AppointmentController::class, 'confirmPayment'])->name('appointments.confirm-payment');
    Route::get('/appointments/{id}/status', [AppointmentController::class, 'status'])->name('appointments.status');
    Route::get('/my-appointments', [AppointmentController::class, 'myAppointments'])->name('appointments.my');
});

// Admin Routes
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/appointments/{id}/confirm', [AdminController::class, 'confirm'])->name('appointments.confirm');
    Route::post('/appointments/{id}/cancel', [AdminController::class, 'cancel'])->name('appointments.cancel');
    
    Route::resource('pricelists', AdminPricelistController::class);
});