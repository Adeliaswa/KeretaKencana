<x-guest-layout>

    <div class="max-w-md mx-auto bg-white/70 backdrop-blur-xl shadow-lg rounded-2xl p-8 border border-green-100">

        {{-- Judul --}}
        <h2 class="text-3xl font-bold text-green-600 text-center mb-3">
            Reset Password
        </h2>
        <p class="text-gray-600 text-center mb-6">
            Masukkan password baru kamu untuk akun ini.
        </p>

        {{-- Form --}}
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" 
                    class="block mt-1 w-full border-green-200 focus:border-green-400 focus:ring-green-300" 
                    type="email" 
                    name="email" 
                    :value="old('email', $request->email)" 
                    required autofocus 
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" 
                    class="block mt-1 w-full border-green-200 focus:border-green-400 focus:ring-green-300" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" 
                    class="block mt-1 w-full border-green-200 focus:border-green-400 focus:ring-green-300"
                    type="password"
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- Tombol --}}
            <div class="flex justify-center">
                <button type="submit"
                    class="px-6 py-3 bg-green-300 hover:bg-green-400 text-green-900 font-semibold rounded-xl shadow-md transition-all duration-300">
                    Reset Password
                </button>
            </div>

        </form>
    </div>

</x-guest-layout>
