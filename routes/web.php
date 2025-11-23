<?php

use App\Http\Controllers\Passenger\TripController;

Route::middleware(['auth', 'role:passenger'])
    ->prefix('passenger')
    ->name('passenger.')
    ->group(function () {

        Route::get('/booking', [TripController::class, 'index'])->name('booking');
        Route::post('/booking', [TripController::class, 'store'])->name('booking.store');
        Route::get('/history', [TripController::class, 'history'])->name('history');
    });
