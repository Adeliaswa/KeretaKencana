@extends('layouts.passenger')

@section('content')
<!-- <div class="w-full h-full flex justify-center items-center py-12"> -->
    <div class="max-w-4xl bg-white/80 p-8 shadow-xl rounded-2xl">
        <h1 class="text-3xl font-bold text-gray-700 text-center mb-6 flex items-center justify-center gap-2">
            📜 Riwayat Trip
        </h1>

        <div class="overflow-x-auto">
            <table class="w-full border shadow rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-pink-200 to-green-200 text-gray-800">
                        <th class="p-3 border">Driver</th>
                        <th class="p-3 border">Dari</th>
                        <th class="p-3 border">Ke</th>
                        <th class="p-3 border">Biaya</th>
                        <th class="p-3 border">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($trips as $trip)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="border p-3">{{ $trip->driver->name ?? 'Driver Tidak Ditemukan'}}</td>
                            <td class="border p-3">{{ $trip->pickup_location }}</td>
                            <td class="border p-3">{{ $trip->destination_location }}</td>
                            <td class="border p-3 font-semibold">Rp {{ number_format($trip->total_cost) }}</td>
                            <td class="border p-3">
                                <span class="px-3 py-1 rounded-full text-sm shadow-sm
                                    @if($trip->status === 'completed') bg-green-200 text-green-700
                                    @elseif($trip->status === 'canceled') bg-red-200 text-red-700
                                    @else bg-yellow-200 text-yellow-700 @endif">
                                    {{ ucfirst($trip->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-6 text-gray-500">Belum ada trip.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
<!-- </div> -->
@endsection
