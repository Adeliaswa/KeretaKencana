<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function showBookingForm()
    {
        return view('passenger.booking-form');
    }
}
