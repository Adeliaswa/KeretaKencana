<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-green-600 tracking-wide">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-green-100 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/70 backdrop-blur-xl shadow-xl sm:rounded-2xl border border-green-100 p-10">

                {{-- Heading Aesthetic --}}
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-extrabold text-green-600 drop-shadow-sm">
                        Selamat Datang 👋
                    </h1>
                    <p class="text-gray-600 mt-2">
                        Kamu berhasil login, yuk mulai kelola data drivermu!
                    </p>
                </div>

                {{-- Icon Decoration --}}
                <div class="flex justify-center mb-6">
                    <div class="bg-green-100 p-4 rounded-full shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M16 3H5a2 2 0 00-2 2v14a2 2 0 002 2h11m0-18h3a2 2 0 012 2v5m-5-7v18m0-6h3m-3-4h3m-3-4h3" />
                        </svg>
                    </div>
                </div>

                {{-- Button --}}
                <div class="flex justify-center mt-6">
                    <a href="{{ route('drivers.index') }}"
                       class="px-8 py-3 bg-green-300 
                       text-gray-900 font-semibold rounded-xl shadow-md 
                       hover:bg-green-400 hover:shadow-lg 
                       transition-all duration-300">
                        Mulai Kelola Driver →
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
