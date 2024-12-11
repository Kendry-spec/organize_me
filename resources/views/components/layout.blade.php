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
      
    {{-- SweetAlert links --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" 
      integrity="sha256-qWVM38RAVYHA4W8TAlDdszO1hRaAq0ME7y2e9aab354=" 
      crossorigin="anonymous"
    >
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js" 
      integrity="sha256-U9LehD2IdwJEt0PXfqH+Mfoyk3/UNxTlfegsMQWOQrY=" 
      crossorigin="anonymous"
    >

    @vite('resources/css/app.css')
  </head>

  <body class="bg-neutral-600">
    <!-- Header Section -->
    <header class="bg-slate-700 text-white shadow-md py-2 fixed top-0 left-0 w-full">
      <nav class="container mx-auto flex justify-between">
        <h1 class="text-3xl font-semibold">{{ config('app.name', 'OrganizeMe') }}</h1>
        
        @auth
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <div class="flex items-center">
              <span class="text-white text-xl mr-4">{{ Auth::user()->username }} |</span>
              <button class="hover:text-gray-300 text-xl">Logout</button>
            </div>
          </form>
        @endauth
      </nav>
    </header>

    {{-- Main content section --}}
    <main>
      <div class="container mx-auto mt-4 h-screen-80 overflow-y-auto">
      {{ $slot }}
      </div>
    </main>
    
    {{-- Script Section --}}
      <script>
          // swal function for delete button
          function confirmDelete(event) {
            event.preventDefault();

            Swal.fire({
              title: "Are you sure?",
              html: "<span style='font-size:22px;'>Once Deleted🗑, it's gone Forever!</span>",
              icon: "warning",
              iconColor: "#ff9900", //Darker Orange, color for a warning icon
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!"
            }).then((result) => {
              if (result.isConfirmed) {
                event.target.submit();
                Swal.fire({
                  title: "Deleted!",
                  html: "<span style='font-size:22px;'>Task Deleted Successfully🎊</span>",
                  icon: "success",
                  iconColor: "#008000", //Darker Green, color for a Success icon
                  confirmButtonText: 'OK'
                });
              }
            });
          }
      </script>
    
    {{-- Importing Alpine.js for Tailwind --}}
      <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
  </body>
</html>