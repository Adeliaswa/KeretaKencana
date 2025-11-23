@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white shadow p-6 rounded-xl">

    <h1 class="text-2xl font-semibold mb-4">Booking Trip</h1>

    <form action="{{ route('passenger.booking.store') }}" method="POST">
        @csrf

        <label class="block mb-2 font-medium">Lokasi Jemput</label>
        <input type="text" name="pickup" class="w-full border p-2 rounded mb-4" required>

        <label class="block mb-2 font-medium">Tujuan</label>
        <input type="text" name="destination" class="w-full border p-2 rounded mb-4" required>

        <label class="block mb-2 font-medium">Estimasi Jarak (KM)</label>
        <input type="number" name="distance" step="0.1" class="w-full border p-2 rounded mb-4" required>

        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Cari Driver
        </button>
    </form>

</div>
@endsection
