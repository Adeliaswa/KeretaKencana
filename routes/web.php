<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Passenger\TripController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Passenger routes
Route::middleware(['auth', 'role:passenger'])
    ->prefix('passenger')
    ->name('passenger.')
    ->group(function () {
        Route::get('/booking', [TripController::class, 'index'])->name('booking');
        Route::post('/booking', [TripController::class, 'store'])->name('booking.store');
        Route::get('/history', [TripController::class, 'history'])->name('history');
    });

require __DIR__.'/auth.php';
