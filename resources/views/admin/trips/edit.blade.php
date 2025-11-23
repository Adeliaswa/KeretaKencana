@extends('layouts.admin')

@section('content')
<div class="p-8">

    {{-- Title --}}
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-pink-400 mb-2">Edit Trip</h1>
        <p class="text-green-500">Ubah detail perjalanan ojek online</p>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('admin.trips.update', $trip->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            {{-- Driver --}}
            <div>
                <label class="block font-medium mb-1">Driver</label>
                <select name="driver_id" class="w-full border rounded px-3 py-2" required>
                    @foreach($drivers as $driver)
                        <option value="{{ $driver->id }}" {{ $trip->driver_id == $driver->id ? 'selected' : '' }}>
                            {{ $driver->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Passenger --}}
            <div>
                <label class="block font-medium mb-1">Penumpang</label>
                <select name="user_id" class="w-full border rounded px-3 py-2" required>
                    @foreach($passengers as $user)
                        <option value="{{ $user->id }}" {{ $trip->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Pickup --}}
            <div>
                <label class="block font-medium mb-1">Asal</label>
                <input type="text" name="pickup_location" class="w-full border rounded px-3 py-2" value="{{ $trip->pickup_location }}" required>
            </div>

            {{-- Destination --}}
            <div>
                <label class="block font-medium mb-1">Tujuan</label>
                <input type="text" name="destination_location" class="w-full border rounded px-3 py-2" value="{{ $trip->destination_location }}" required>
            </div>

            {{-- Estimated Distance --}}
            <div>
                <label class="block font-medium mb-1">Jarak (km)</label>
                <input type="number" name="estimated_distance" class="w-full border rounded px-3 py-2" value="{{ $trip->estimated_distance }}" required>
            </div>

            {{-- Status --}}
            <div>
                <label class="block font-medium mb-1">Status Trip</label>
                <select name="status" class="w-full border rounded px-3 py-2" required>
                    <option value="pending" {{ $trip->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="on_trip" {{ $trip->status == 'on_trip' ? 'selected' : '' }}>On Trip</option>
                    <option value="completed" {{ $trip->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-2 mt-4">
                <a href="{{ route('admin.trips.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
                <button type="submit" class="px-4 py-2 bg-pink-300 text-green-800 rounded hover:bg-pink-400">Update</button>
            </div>

        </form>
    </div>

</div>
@endsection
