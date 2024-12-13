<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <link rel="shortcut icon" type="x-icon" href="{{config('app.logo')}}"/>
        <link rel="apple-touch-icon" type="image/png" href="{{config('app.logo')}}"/>
{{--        <link rel="stylesheet" href="/css/header.css"/>--}}

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />

        <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

        <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/sign_in.css') }}">
        <link rel="stylesheet" href="{{ asset('css/password.css') }}">
        <link rel="stylesheet" href="{{ asset('css/code.css') }}">
        <link rel="stylesheet" href="{{ asset('css/waiting.css') }}">

        <script src="//unpkg.com/alpinejs" defer></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-white">
{{--    @include('layouts.navigation')--}}

        <div class="min-h-screen">
{{--             <div>--}}
{{--                <a href="/">--}}
{{--                    <img class="block h-9 w-auto fill-current text-gray-800" src="{{asset('logo-blue.png')}}" alt="logo"/>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            @if(session('success'))--}}
{{--                <x-bladewind::alert--}}
{{--                    type="success" icon="cloud-arrow-down" shade="dark">--}}
{{--                    {{session('success')}}--}}
{{--                </x-bladewind::alert>--}}
{{--            @endif--}}
{{--            @if(session('error'))--}}
{{--                <x-bladewind::alert color="red" icon="exclamation-triangle" shade="dark">--}}
{{--                    {{session('error')}}--}}
{{--                </x-bladewind::alert>--}}
{{--            @endif--}}
            <div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
