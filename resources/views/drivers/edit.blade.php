<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Driver: ') . $driver->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('admin.drivers.update', $driver) }}">
                        @csrf
                        @method('patch') <div>
                            <x-input-label for="name" :value="__('Nama Driver')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $driver->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Nomor Telepon')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $driver->phone)" required />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="license_number" :value="__('Nomor Lisensi (SIM)')" />
                            <x-text-input id="license_number" class="block mt-1 w-full" type="text" name="license_number" :value="old('license_number', $driver->license_number)" required />
                            <x-input-error :messages="$errors->get('license_number')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status Driver')" />
                            <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="available" {{ old('status', $driver->status) == 'available' ? 'selected' : '' }}>Available (Tersedia)</option>
                                <option value="on_trip" {{ old('status', $driver->status) == 'on_trip' ? 'selected' : '' }}>On Trip (Sedang Bertugas)</option>
                                <option value="offline" {{ old('status', $driver->status) == 'offline' ? 'selected' : '' }}>Offline (Tidak Aktif)</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.drivers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2">
                                {{ __('Batal') }}
                            </a>
                            <x-primary-button class="ms-4">
                                {{ __('Update Driver') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>