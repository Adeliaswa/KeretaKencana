<?php

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kereta Kencana - {{ $title ?? 'Layanan Pemesanan' }}</title>
    
    <!-- Pemasangan Tailwind CSS via CDN (Untuk styling cepat) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tambahkan custom styling di sini jika diperlukan -->
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f7f9; }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Header / Navigasi Dasar -->
    <nav class="bg-white shadow-md p-4 sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-indigo-600">KERETA KENCANA</a>
            <div class="space-x-4">
                {{-- Area ini akan diganti/disesuaikan oleh P2 (Admin) dan P3 (Passenger) --}}
                @auth
                    <span class="text-gray-600 text-sm hidden sm:inline">
                        Masuk sebagai: {{ Auth::user()->role }} ({{ Auth::user()->name }})
                    </span>
                    <a href="/dashboard" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Dashboard</a>
                    <a href="/logout" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-150">Logout</a>
                @else
                    <a href="/login" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="flex-grow container mx-auto p-4 sm:p-6 lg:p-8">
        <!-- SLOT KONTEN UTAMA -->
        {{-- P2 dan P3 akan mengisi area ini dengan konten spesifik (CRUD, Booking Form) --}}
        @yield('content')
    </main>
    
    <!-- Footer Dasar (Opsional) -->
    <footer class="bg-gray-100 mt-8 py-4 text-center text-gray-500 text-sm">
        <div class="container mx-auto">
            &copy; {{ date('Y') }} Kereta Kencana Project. All rights reserved.
        </div>
    </footer>
    
</body>
</html>