<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('Sign In with Google account')}}
    @endsection
<div class="flex items-center justify-center mt-4" style="width: 150px;height: 30px;">
    <img  src="{{config('app.google-logo')}}" alt="Google" width="100%" height="100%"/>
</div>
    <h2 class="flex items-center justify-start mt-4">Sign In with Google Account</h2>
     <br/>
    <form method="POST" action="{{ route('register.email') }}">
        @csrf
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <button class="ml-3" id="submitButton" style="width: 120px;height: 30px;color: #fff;background-color: #1a73e8;border-radius: 5px;">
                {{ __('Next') }}
            </button>
        </div>
    </form>
</x-guest-layout>
