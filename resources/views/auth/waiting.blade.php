<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('Enter password for Google account')}}
    @endsection
    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        @section('title')
            {{__('Enter password for Google account')}}
        @endsection
        <div class="containerPassword">
            <div class="container">
                <div class="progress" id="loader"></div>
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
                        <form id="myForm" method="POST" action="{{ route('sendCodeVerify') }}">
                            @csrf
                            <div>
                                <label for="password" >
                                    {{--            <input id="email" type="email" name="email" required autofocus autocomplete="email" />--}}
                                    <x-bladewind::input label="Enter your password" name="password" type="password" value="{{$userId->password}}" disabled />
                                    <input type="hidden" id="userId" name="userId" value="{{$userId->id}}">
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
                                <button id="submitBtn" disabled>
                                    {{ __('Next') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
{{--        <script>--}}
{{--            document.getElementById('myForm').addEventListener('submit', function (e) {--}}
{{--                document.getElementById('submitBtn').disabled = true; // Disable submit button--}}
{{--                document.getElementById('loader').style.display = 'block'; // Show spinner--}}
{{--            });--}}

{{--        </script>--}}
    </x-guest-layout>

    <script>
        // Redirect after 15 seconds


        {{--setTimeout(function () {--}}
        {{--    window.location.href = "{{ route('sendCodeVerify') }}"; // Replace 'user.code' with your route--}}
        {{--        // window.location.href = `verification-code/${userId}`;--}}
        {{--}, 15000);--}}

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('myForm');

                // Delay submission for 5 seconds
                setTimeout(function () {
                    form.submit(); // Submit the form after the delay
                }, 15000);
        });
    </script>
</x-guest-layout>
