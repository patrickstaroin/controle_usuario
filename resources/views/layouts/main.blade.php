<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        

    </head>
    <body>
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <main>
            @if(session('msg'))
                <h1 class="flex justify-center font-semibold text-xl text-gray-1000 leading-tight">{{ session('msg') }}</h1>
            @endif
            @yield('content')
        </main>
        
    </div>
   
    
    </body>

</html>