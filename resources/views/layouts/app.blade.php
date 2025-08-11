<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Flowbite CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" data-dark-mode="{{ Auth::check() && Auth::user()->dark_mode ? 'true' : 'false' }}">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.sidebar')

            <div class="p-4 sm:ml-64">
                <!-- User Info Bar (Mobile Only) -->
                <div class="sm:hidden p-4 mb-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow rounded-lg mb-4">
                        <div class="py-6 px-4 sm:px-6">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>
</html>
