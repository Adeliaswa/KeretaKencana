<x-guest-layout>

    <div class="max-w-md mx-auto bg-white/70 backdrop-blur-xl shadow-lg rounded-2xl p-8 border border-green-100">

        {{-- Judul --}}
        <h2 class="text-3xl font-bold text-green-600 text-center mb-3">
            Lupa Password?
        </h2>
        <p class="text-gray-600 text-center mb-6">
            Tenang aja! Masukkan email kamu dan kami akan kirim link untuk reset password.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        {{-- Form --}}
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" 
                    class="block mt-1 w-full border-green-200 focus:border-green-400 focus:ring-green-300" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Tombol --}}
            <div class="flex justify-center mt-6">
                <button
                    class="px-6 py-3 bg-green-300 hover:bg-green-400 
                    text-green-900 font-semibold rounded-xl shadow 
                    transition-all duration-300">
                    Kirim Link Reset Password
                </button>
            </div>

        </form>

    </div>

</x-guest-layout>
