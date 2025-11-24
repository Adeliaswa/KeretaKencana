@extends('layouts.admin') {{-- kalau pakai layout admin; pakai layouts.app jika mau sama layout passenger --}}

@section('content')
<div class="min-h-screen bg-gradient-to-b from-green-50 to-pink-50 flex justify-center items-center p-6">
    <div class="max-w-4xl w-full bg-white shadow-xl rounded-2xl p-8 text-center">
        <h1 class="text-3xl font-extrabold text-gray-700 mb-4">Admin Dashboard</h1>
        <p class="text-gray-600 mb-6">Ringkasan cepat sistem dan akses admin.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('admin.drivers.index') }}" class="p-4 bg-pink-100 rounded-lg shadow hover:bg-pink-200">Kelola Driver</a>
            <a href="{{ route('admin.trips.index') }}" class="p-4 bg-green-100 rounded-lg shadow hover:bg-green-200">Kelola Trip</a>
        </div>
    </div>
</div>
@endsection
