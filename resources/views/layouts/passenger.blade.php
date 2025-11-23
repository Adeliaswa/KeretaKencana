<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Passenger | {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    {{-- Background Gradasi Khusus Passenger --}}
    <div class="min-h-screen bg-gradient-to-b from-pink-100 via-white to-green-100">

        {{-- Navbar Tetap --}}
        @include('layouts.navigation')

        {{-- Main Content (POSISI TENGAH) --}}
        <main class="min-h-screen pt-16 px-4 flex justify-center items-center">
            @yield('content')
        </main>

    </div>

</body>
</html>
