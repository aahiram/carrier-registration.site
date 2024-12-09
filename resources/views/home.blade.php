<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('Sign In with Google account')}}
    @endsection
    <div class="containerLogin">
        <div >
            <img  src="{{config('app.google-logo')}}" alt="Google" width="50px" height="30px"/>
        </div>
        <h2 >Sign In</h2>
        <p >to continue gmail</p>
        <br/>
        <form method="POST" action="{{ route('register.email') }}">
            @csrf
            <div>
                <label for="email" >
                    {{--            <input id="email" type="email" name="email" required autofocus autocomplete="email" />--}}
                    <x-bladewind::input label="Email or phone"  name="email"/>
                </label>
                {{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
                <a>Forgot email?</a>
            </div>
            <a>create account</a>
            <div>
                <button>
                    {{ __('Next') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
