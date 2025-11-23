<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Passenger\TripController;
use App\Http\Controllers\DriverController;

// ===================== HOME =====================
Route::get('/', function () {
    return view('welcome');
});

// ===================== DASHBOARD =====================
// Redirect ke dashboard sesuai role
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'passenger') {
        return view('passenger.dashboard');
    } elseif (auth()->user()->role === 'admin') {
        return view('admin.dashboard');
    }
    abort(403); // jika role tidak dikenali
})->middleware(['auth', 'verified'])->name('dashboard');

// ===================== PASSENGER ROUTES =====================
Route::middleware(['auth', 'role:passenger'])
    ->prefix('passenger')
    ->name('passenger.')
    ->group(function () {
        Route::get('/booking', [TripController::class, 'index'])->name('booking');
        Route::post('/booking', [TripController::class, 'store'])->name('booking.store');
        Route::get('/history', [TripController::class, 'history'])->name('history');
    });

// ===================== ADMIN ROUTES =====================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Resource driver
        Route::resource('drivers', DriverController::class);
        Route::resource('trips', App\Http\Controllers\Admin\TripController::class);

    });

// ===================== PROFILE ROUTES =====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===================== AUTH ROUTES =====================
require __DIR__.'/auth.php';
