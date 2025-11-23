<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trip;
use App\Models\Driver;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua trips dengan relasi driver dan passenger
        $trips = Trip::with(['driver', 'passenger'])->orderBy('created_at', 'desc')->get();

        // Kirim ke view
        return view('admin.trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua driver dan passenger untuk dropdown
        $drivers = Driver::all();
        $passengers = User::where('role', 'passenger')->get();

        return view('admin.trips.create', compact('drivers', 'passengers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'driver_id' => 'required|exists:drivers,id',
            'pickup_location' => 'required|string|max:255',
            'destination_location' => 'required|string|max:255',
            'estimated_distance' => 'required|numeric|min:0',
            'status' => 'required|in:pending,ongoing,completed,cancelled',
            'total_cost' => 'required|numeric|min:0',
        ]);

        Trip::create($validated);

        return redirect()->route('admin.trips.index')->with('success', 'Trip berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        $drivers = Driver::all();
        $passengers = User::where('role', 'passenger')->get();

        return view('admin.trips.edit', compact('trip', 'drivers', 'passengers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        // Hanya update status dari dropdown di index
        if ($request->has('status')) {
            $request->validate([
                'status' => 'required|in:pending,on_trip,completed,cancelled',
            ]);

            $trip->update(['status' => $request->status]);

            return redirect()->route('admin.trips.index')->with('success', 'Status trip berhasil diperbarui.');
        }

        // Update seluruh field jika pakai form edit lengkap
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'driver_id' => 'required|exists:drivers,id',
            'pickup_location' => 'required|string|max:255',
            'destination_location' => 'required|string|max:255',
            'estimated_distance' => 'required|numeric|min:0',
            'status' => 'required|in:pending,on_trip,completed,cancelled',
            'total_cost' => 'required|numeric|min:0',
        ]);

        $trip->update($validated);

        return redirect()->route('admin.trips.index')->with('success', 'Trip berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();

        return redirect()->route('admin.trips.index')->with('success', 'Trip berhasil dihapus.');
    }

}
