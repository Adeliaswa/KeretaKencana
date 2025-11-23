<x-guest-layout>
    <div class="max-w-md mx-auto bg-white/70 backdrop-blur-xl shadow-lg rounded-2xl p-8 border border-green-100">

        {{-- Judul --}}
        <h2 class="text-3xl font-bold text-green-600 text-center mb-3">
            Verifikasi Email
        </h2>
        <p class="text-gray-600 text-center mb-6">
            Terima kasih sudah mendaftar! Sebelum memulai, silakan verifikasi email dengan mengklik link yang kami kirimkan.  
            Jika belum menerima email, kamu bisa minta kirim ulang di bawah.
        </p>

        {{-- Status --}}
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-center font-medium text-green-700">
                Link verifikasi baru telah dikirim ke emailmu.
            </div>
        @endif

        {{-- Tombol --}}
        <div class="flex flex-col gap-4 mt-6">
            {{-- Resend Verification --}}
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                        class="w-full px-6 py-3 bg-green-300 hover:bg-green-400 text-green-900 font-semibold rounded-xl shadow-md transition-all duration-300">
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-xl shadow-sm transition-all duration-300">
                    Logout
                </button>
            </form>
        </div>

    </div>
</x-guest-layout>
