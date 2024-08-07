<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('Sign Up')}}
    @endsection

    <h2>Sign Up with Google Account</h2>
     <br/>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="MC" :value="__('MC#')" />
            <x-text-input class="block mt-1 w-full" type="text" required autofocus/>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="DOT" :value="__('DOT#')" />
            <x-text-input class="block mt-1 w-full" type="text" required autofocus/>
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="Company Name" :value="__('Company Name')" />
            <x-text-input  class="block mt-1 w-full" type="text" required autofocus/>
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="FMCSA Email" :value="__('FMCSA Email')" />
            <x-text-input  class="block mt-1 w-full" type="text" required autofocus/>
        </div>
        <!-- Email Address -->
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-300 shadow-sm focus:ring-blue-300" name="remember">--}}
{{--                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

        <div class="flex items-center justify-end mt-4">
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

            <x-primary-button class="ml-3">
                {{ __('Sign Up') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
