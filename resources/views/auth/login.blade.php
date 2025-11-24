<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-green-50">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">

            <!-- Judul -->
            <h2 class="text-2xl font-bold text-center text-green-700 mb-6">
                Selamat Datang Kembali
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" value="Email" class="text-green-700" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500"
                        type="email"
                        name="email"
                        :value="old('email')" required autofocus />

                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" value="Password" class="text-green-700" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500"
                        type="password"
                        name="password"
                        required />

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                        name="remember">

                    <label for="remember_me" class="ms-2 text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                <!-- Tombol -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-green-600 hover:text-green-700"
                            href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif

                    <button
                        class="px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>
