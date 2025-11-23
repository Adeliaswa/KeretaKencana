@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded">
    <h1 class="text-2xl font-bold mb-4">Pesan Trip</h1>

    @if (session('error'))
        <p class="text-red-500 mb-3">{{ session('error') }}</p>
    @endif

    <form action="{{ route('passenger.booking.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="font-semibold">Lokasi Jemput</label>
            <input type="text" name="pickup_location"
                   class="w-full border p-2 rounded focus:ring focus:ring-indigo-300">
        </div>

        <div>
            <label class="font-semibold">Tujuan</label>
            <input type="text" name="destination"
                   class="w-full border p-2 rounded focus:ring focus:ring-indigo-300">
        </div>

        <div>
            <label class="font-semibold">Jarak (km)</label>
            <input type="number" name="estimated_distance"
                   class="w-full border p-2 rounded focus:ring focus:ring-indigo-300">
        </div>

        <button class="bg-indigo-600 w-full text-white px-4 py-2 rounded hover:bg-indigo-700">
            Cari Driver & Pesan
        </button>
    </form>
</div>
@endsection
