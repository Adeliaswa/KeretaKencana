@extends('layouts.admin')

@section('content')
<div class="p-8">

    {{-- Title --}}
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-pink-400 mb-2">Daftar Trip (Admin)</h1>
        <p class="text-green-500">Kelola semua perjalanan ojek online dengan mudah</p>
    </div>

    {{-- Tabel --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full text-left">
            <thead class="bg-pink-100 border-b">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Driver</th>
                    <th class="px-6 py-3">Penumpang</th>
                    <th class="px-6 py-3">Asal</th>
                    <th class="px-6 py-3">Tujuan</th>
                    <th class="px-6 py-3">Jarak (km)</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 w-32">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($trips as $trip)
                    <tr class="border-b hover:bg-green-50 transition">
                        <td class="px-6 py-4">{{ $trip->id }}</td>
                        <td class="px-6 py-4">{{ $trip->driver?->name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $trip->passenger?->name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $trip->pickup_location }}</td>
                        <td class="px-6 py-4">{{ $trip->destination_location }}</td>
                        <td class="px-6 py-4">{{ $trip->estimated_distance ?? '-' }}</td>

                        {{-- Status --}}
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.trips.update', $trip->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="w-full border rounded px-2 py-1 text-sm">
                                    <option value="pending" {{ $trip->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="on_trip" {{ $trip->status === 'on_trip' ? 'selected' : '' }}>On Trip</option>
                                    <option value="completed" {{ $trip->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $trip->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>

                            </form>
                        </td>


                        {{-- Aksi --}}
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('admin.trips.edit', $trip->id) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                            <form action="{{ route('admin.trips.destroy', $trip->id) }}" method="POST" onsubmit="return confirm('Hapus trip ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-6 text-center text-gray-500">Belum ada data trip.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tambah Trip --}}
    <!-- <div class="mt-6 flex justify-center">
        <a href="{{ route('admin.trips.create') }}" class="px-5 py-3 bg-pink-200 text-green-800 rounded-lg hover:bg-pink-300 transition font-medium shadow">
            + Tambah Trip
        </a>
    </div> -->

</div>
@endsection
