<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create()
    {
        return view('passenger.booking-form');
    }

    public function store(Request $request)
    {
        // nanti diisi logika booking trip
    }
}
