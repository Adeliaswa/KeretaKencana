@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Riwayat Trip</h1>

    @if (session('success'))
        <p class="text-green-600 mb-3">{{ session('success') }}</p>
    @endif

    <table class="w-full border shadow">
        <tr class="bg-indigo-100">
            <th class="p-2 border">Driver</th>
            <th class="p-2 border">Dari</th>
            <th class="p-2 border">Ke</th>
            <th class="p-2 border">Biaya</th>
            <th class="p-2 border">Status</th>
        </tr>

        @forelse ($trips as $trip)
        <tr class="hover:bg-gray-50">
            <td class="border p-2">{{ $trip->driver->name }}</td>
            <td class="border p-2">{{ $trip->pickup_location }}</td>
            <td class="border p-2">{{ $trip->destination_location }}</td>
            <td class="border p-2">Rp {{ number_format($trip->total_cost) }}</td>
            <td class="border p-2">{{ ucfirst($trip->status) }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center p-4">Belum ada trip.</td>
        </tr>
        @endforelse
    </table>
</div>
@endsection
