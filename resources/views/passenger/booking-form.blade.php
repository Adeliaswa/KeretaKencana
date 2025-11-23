@extends('layouts.passenger')

@section('content')
<!-- <div class="w-full h-full flex justify-center items-center py-12"> -->

    <div class="max-w-lg w-full backdrop-blur-xl bg-white/70 p-8 shadow-2xl rounded-2xl">
        <h1 class="text-3xl font-extrabold text-gray-700 text-center mb-6 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M3 12h18" stroke-width="2" stroke-linecap="round"/>
                <circle cx="12" cy="12" r="9" stroke-width="2"/>
            </svg>
            Pesan Trip
        </h1>

        @if (session('error'))
            <div class="bg-red-100 text-red-600 p-3 rounded-lg shadow mb-4 animate-pulse">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('passenger.booking.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="font-semibold text-gray-700">Lokasi Jemput</label>
                <input type="text" name="pickup_location"
                       class="w-full border p-3 rounded-lg focus:ring-4 focus:ring-pink-200 outline-none shadow-sm">
            </div>

            <div>
                <label class="font-semibold text-gray-700">Tujuan</label>
                <input type="text" name="destination"
                       class="w-full border p-3 rounded-lg focus:ring-4 focus:ring-green-200 outline-none shadow-sm">
            </div>

            <div>
                <label class="font-semibold text-gray-700">Jarak (km)</label>
                <input type="number" name="estimated_distance"
                       class="w-full border p-3 rounded-lg focus:ring-4 focus:ring-pink-200 outline-none shadow-sm">
            </div>

            <button class="bg-gradient-to-r from-pink-400 to-green-400 w-full text-white 
                           px-4 py-3 rounded-xl font-semibold shadow-lg hover:shadow-2xl
                           hover:scale-[1.03] transition duration-300 hover:rotate-[1deg]">
                💫 Cari Driver & Pesan
            </button>
        </form>
    </div>
<!-- </div> -->
@endsection
