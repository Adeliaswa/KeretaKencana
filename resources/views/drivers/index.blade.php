<x-app-layout>
    <div class="container mx-auto px-4 py-8">

        {{-- Title Aesthetic --}}
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold text-green-600 tracking-wide drop-shadow-sm">
                Daftar Driver
            </h1>
            <p class="text-gray-500 mt-1">
                Kelola data driver dengan mudah dan cepat
            </p>
        </div>

        {{-- Table --}}
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-left">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">ID</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Nama</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">No. Telepon</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Alamat</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">No. Lisensi</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Status</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700 w-32">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($drivers as $driver)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-800">{{ $driver->id }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $driver->name }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $driver->phone }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $driver->address }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $driver->license_number }}</td>

                            {{-- Status Label --}}
                            <td class="px-6 py-4">
                                @if($driver->status === 'available')
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                                        Available
                                    </span>
                                @elseif($driver->status === 'on_trip')
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">
                                        On Trip
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full text-sm">
                                        Offline
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 flex items-center gap-3">
                                <a href="{{ route('drivers.edit', $driver->id) }}"
                                   class="text-indigo-600 hover:text-indigo-800 font-medium">
                                    Edit
                                </a>

                                <form action="{{ route('drivers.destroy', $driver->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus driver {{ $driver->name }}?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="text-red-600 hover:text-red-800 font-medium">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-6 text-center text-gray-500">
                                Belum ada data driver.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- Tombol di bawah --}}
        <div class="mt-6 flex justify-center">
            <a href="{{ route('drivers.create') }}"
               class="px-5 py-3 bg-green-300 text-gray-900 rounded-lg hover:bg-green-400 transition font-medium shadow">
                + Tambah Driver
            </a>
        </div>

    </div>
</x-app-layout>
