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

        <script src="//unpkg.com/alpinejs" defer></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-white">
{{--    @include('layouts.navigation')--}}

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
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
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
