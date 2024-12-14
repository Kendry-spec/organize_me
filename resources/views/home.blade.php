<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'OrganizeMe') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 overflow-hidden">
    <!-- Header Section -->
    <header class="bg-indigo-800 text-white shadow-md py-4 fixed top-0 left-0 w-full z-50">
        <nav class="container mx-auto px-4 sm:px-6 md:px-10">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-center">{{ config('app.name', 'OrganizeMe') }}</h1>
        </nav>
    </header>

    <!-- Main content section -->
    <main class="relative z-10 h-screen flex items-center justify-center px-4 sm:px-6 md:px-10">
        <!-- Welcome Message -->
        <div class="text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl text-yellow-500 font-semibold mb-4 sm:mb-6">Welcome to OrganizeMe</h1>
            <p class="text-lg sm:text-xl md:text-2xl text-white">Get Focused, Stay Organized!</p>
            <button class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-sm sm:text-base md:text-lg mt-6 sm:mt-8">
                <a href="{{ route('login') }}">Get Started</a>
            </button>
            <p class="text-sm sm:text-lg text-white mt-4">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-500 font-semibold hover:text-blue-800">Register here</a>
            </p>
        </div>
    </main>

    <!-- Importing Alpine.js for Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
</body>
</html>
