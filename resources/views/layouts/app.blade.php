<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @if (session()->has('message'))
                <div class="bg-green-600 text-white p-4">
                    <x-container>
                        {{ session('message') }}
                    </x-container>
                </div>
            @endif

            @include('layouts.navbar')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white border-b border-gray-300">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="pt-8">
                {{ $slot }}
            </main>
        </div>

        @include('layouts.footer')
    </body>

</html>
