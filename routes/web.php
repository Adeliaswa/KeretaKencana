<?php

use App\Http\Controllers\Passenger\TripController;

Route::middleware(['auth', 'role:passenger'])->group(function() {
    Route::get('/booking', [TripController::class, 'showBookingForm'])
         ->name('passenger.booking');
});

