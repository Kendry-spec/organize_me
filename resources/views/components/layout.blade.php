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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" integrity="sha256-rUxk4uR5A2yw6z0WqCSMoz9s(:,:,A4ye9h8jvwCwsdvfuQh7MZxbzoRBroTqqtQ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js" integrity="sha256-8A4AC1Q8izsdOE0PR pukSTksv3L2vfuuGnQJuiK7GsE=" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-600">
  <!-- Header Section -->
  <header class="bg-slate-700 text-white shadow-md py-4 fixed top-0 left-0 w-full">
    <nav class="container mx-auto flex justify-between items-center">
      <h1 class="text-4xl font-bold">{{ config('app.name', 'OrganizeMe') }}</h1>
      
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button class="hover:text-gray-300 text-xl">Logout</button>
        </form>
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