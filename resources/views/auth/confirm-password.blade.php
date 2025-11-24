<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-green-50">
        <div class="w-full max-w-xl bg-white shadow-lg rounded-xl p-10 min-h-[450px] flex flex-col justify-center">

            <!-- Judul -->
            <h2 class="text-2xl font-bold text-center text-green-700 mb-4">
                Konfirmasi Password
            </h2>

            <p class="text-sm text-gray-600 text-center mb-6">
                Ini adalah area aman aplikasi. Masukkan password Anda untuk melanjutkan.
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" value="Password" class="text-green-700" />

                    <x-text-input id="password"
                        class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Button -->
                <div class="flex justify-end mt-4">
                    <button
                        class="px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                        Konfirmasi
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>
