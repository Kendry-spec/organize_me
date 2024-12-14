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

    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" 
      integrity="sha256-qWVM38RAVYHA4W8TAlDdszO1hRaAq0ME7y2e9aab354=" 
      crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js" 
      integrity="sha256-U9LehD2IdwJEt0PXfqH+Mfoyk3/UNxTlfegsMQWOQrY=" 
      crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-500">
 
    <!-- Header Section -->
    <header class="bg-slate-800 text-white shadow-md py-2 fixed top-0 left-0 w-full">
        <nav class="container mx-auto flex justify-between items-center px-4 sm:px-6 md:px-10">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-semibold">{{ config('app.name', 'OrganizeMe') }}</h1>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="pt-2">
        <div class="container mx-auto mt-4 h-[calc(100vh-4rem)] px-4 sm:px-6 md:px-10">
            {{ $slot }}
        </div>
    </main>

</body>
</html>