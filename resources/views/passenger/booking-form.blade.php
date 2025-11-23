@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white shadow p-6 rounded-xl">

    <h1 class="text-xl font-semibold mb-4">Booking Trip</h1>

    <form action="#" method="POST">
        @csrf

        <label class="block font-medium mb-1">Lokasi Jemput</label>
        <input type="text" name="pickup" class="w-full border p-2 rounded mb-3">

        <label class="block font-medium mb-1">Tujuan</label>
        <input type="text" name="destination" class="w-full border p-2 rounded mb-3">

        <label class="block font-medium mb-1">Jarak Estimasi (KM)</label>
        <input type="number" step="0.1" name="distance" class="w-full border p-2 rounded mb-3">

        <button class="w-full bg-blue-600 text-white py-2 rounded-lg">Cari Driver</button>
    </form>

</div>
@endsection
