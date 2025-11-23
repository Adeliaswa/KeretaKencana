use App\Http\Controllers\Passenger\TripController;

Route::middleware(['auth', 'role:passenger'])->group(function() {
    Route::get('/booking', [TripController::class, 'create'])->name('passenger.booking');
    Route::post('/booking', [TripController::class, 'store'])->name('passenger.booking.store');
});
