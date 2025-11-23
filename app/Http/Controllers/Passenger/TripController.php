<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DriverSearchService;
use App\Models\Trip;
use App\Models\Driver;

class TripController extends Controller
{
    public function index()
    {
        return view('passenger.booking-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pickup_location'    => 'required|string',
            'destination'        => 'required|string',
            'estimated_distance' => 'required|numeric|min:1',
        ]);

        $pickup = $request->pickup_location;
        $dest   = $request->destination_location;
        $dist   = $request->estimated_distance;

        $service = new DriverSearchService();
        $bestDriver = $service->findBestDriver($pickup, $dest);

        if (!$bestDriver) {
            return back()->with('error', 'Tidak ada driver tersedia.');
        }

        $totalCost = $dist * 5000;

        $trip = Trip::create([
            'user_id'            => auth()->id(),
            'driver_id'          => $bestDriver->id,
            'pickup_location'    => $pickup,
            'destination'        => $dest,
            'estimated_distance' => $dist,
            'total_cost'         => $totalCost,
            'status'             => 'pending',
        ]);

        $bestDriver->is_available = false;
        $bestDriver->save();

        return redirect()
            ->route('passenger.history')
            ->with('success', 'Trip berhasil dipesan!');
    }

    public function history()
    {
        $trips = Trip::with('driver')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('passenger.history', compact('trips'));
    }
}
