<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    {{-- Navbar (TETAP PAKAI YANG SAMA) --}}
    @include('layouts.navigation')

    {{-- Content --}}
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
