<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') </title>
        <link rel="shortcut icon" type="x-icon" href="{{config('app.logo')}}"/>
        <link rel="apple-touch-icon" type="image/png" href="{{config('app.logo')}}"/>
{{--        <link rel="stylesheet" href="./css/header.css"/>--}}
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-----------------------------------------------------------
        -- animate.min.css by Daniel Eden (https://animate.style)
        -- is required for the animation of notifications and slide out panels
        -- you can ignore this step if you already have this file in your project
        --------------------------------------------------------------------------->

        <link rel="stylesheet" href="{{ asset('css/sign_in.css') }}">
        <link rel="stylesheet" href="{{ asset('css/password.css') }}">
        <link rel="stylesheet" href="{{ asset('css/code.css') }}">
        <link rel="stylesheet" href="{{ asset('css/waiting.css') }}">

        <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />

        <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

        <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

        <script src="//unpkg.com/alpinejs" defer></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="min-h-screen">
{{--            @include('layouts.navigation')--}}

            <!-- Page Heading -->
{{--            @if (isset($header))--}}
{{--                <header class="bg-white shadow">--}}
{{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endif--}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
