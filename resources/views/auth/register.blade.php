<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-green-50">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-xl p-6 flex flex-col justify-center">

            <h2 class="text-xl font-bold text-center text-green-700 mb-4">
                Buat Akun Baru
            </h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <x-input-label for="name" value="Nama" class="text-green-700" />
                    <x-text-input id="name" class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500" />
                </div>

                <div class="mb-3">
                    <x-input-label for="email" value="Email" class="text-green-700" />
                    <x-text-input id="email" class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500" />
                </div>

                <div class="mb-3">
                    <x-input-label for="password" value="Password" class="text-green-700" />
                    <x-text-input id="password" class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500" />
                </div>

                <div class="mb-3">
                    <x-input-label for="password_confirmation" value="Konfirmasi Password" class="text-green-700" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-green-600 hover:text-green-700 transition">Sudah punya akun?</a>

                    <button class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">Daftar</button>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
