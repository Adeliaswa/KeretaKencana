<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Passenger\TripController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'passenger') {
        return redirect()->route('passenger.booking'); // Menggunakan route name Anda
    }
    
    return view('dashboard'); 
})->middleware(['auth'])->name('dashboard'); 

Route::middleware(['auth', 'role:passenger'])
    ->prefix('passenger')
    ->name('passenger.')
    ->group(function () {
        Route::get('/booking', [TripController::class, 'index'])->name('booking');
        Route::post('/booking', [TripController::class, 'store'])->name('booking.store');
        Route::get('/history', [TripController::class, 'history'])->name('history');
    });
use App\Http\Controllers\DriverController;

Route::resource('drivers', DriverController::class)
    ->middleware(['auth', 'verified']); 
require __DIR__.'/auth.php';
