<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propan App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<nav class="bg-white shadow-md px-8 py-4 flex justify-between items-center">

    <h1 class="text-2xl font-bold text-blue-600">
        Propan App
    </h1>

    <div class="flex items-center gap-6 text-sm font-medium">

        <a href="/dashboard" class="hover:text-blue-500 transition">
            Dashboard
        </a>

        <a href="/paints" class="hover:text-blue-500 transition">
            Data Cat
        </a>

        <a href="{{ route('suppliers.index') }}" class="text-gray-700 hover:text-blue-500">
            Supplier
        </a>

        <a href="/rekomendasi" class="hover:text-blue-500 transition">
            Rekomendasi
        </a>

        <form action="/logout" method="POST">
            @csrf
            <button class="text-red-500 hover:underline">
                Logout
            </button>
        </form>

    </div>
</nav>

<!-- Content -->
<div class="max-w-6xl mx-auto px-6 py-8">
    @yield('content')
</div>

</body>
</html>