@extends('layouts.passenger')
@section('content')

{{-- WRAPPER UTAMA UNTUK CENTER FULL --}}
<!-- <div class="w-full h-full flex justify-center items-center py-12"> -->
    <div class="max-w-3xl w-full bg-white/80 p-10 shadow-xl rounded-2xl text-center">
        <h1 class="text-3xl font-extrabold text-gray-700 mb-4">
            Selamat Datang, Penumpang Cantik! 💖
        </h1>

        <p class="text-gray-600 mb-6">
            Silakan pilih aksi yang ingin kamu lakukan di bawah ini:
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
            <a href="{{ route('passenger.booking') }}"
               class="bg-pink-400 hover:bg-pink-500 text-white font-semibold py-3 rounded-xl transition shadow">
                🚗 Pesan Trip
            </a>

            <a href="{{ route('passenger.history') }}"
               class="bg-green-400 hover:bg-green-500 text-white font-semibold py-3 rounded-xl transition shadow">
                📜 Riwayat Trip
            </a>
        </div>
    </div>

<!-- </div> -->
@endsection
