<?php

use App\Http\Controllers\Passenger\TripController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return redirect()->route('passenger.booking');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:passenger'])
    ->prefix('passenger')
    ->name('passenger.')
    ->group(function () {

        Route::get('/booking', [TripController::class, 'index'])->name('booking');
        Route::post('/booking', [TripController::class, 'store'])->name('booking.store');
        Route::get('/history', [TripController::class, 'history'])->name('history');

    });

require __DIR__.'/auth.php';
