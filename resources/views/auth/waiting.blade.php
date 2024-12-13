<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('Waiting for response')}}
    @endsection
    <div class="containerWaiting">
        <div class="container">
            <div class="loader" id="loader"></div>
            <div class="imgBox">
                <img  src="{{asset('google-sign.png')}}" alt="Google" width="50px" height="30px"/>
            </div>
            <div class="box1">
                <div>
                    <div>
{{--                        <h1 style="font-size: 36px"><strong>Sign In</strong></h1>--}}
                        <br>
{{--                        {{dd($userId)}}--}}
                        <p >Please wait ....</p>
                        <form id="delayedForm" method="POST" action="{{ route('sendCodeVerify') }}">
                        @csrf
                            <input type="hidden" id="userId" name="userId" value="{{ $userId }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Redirect after 15 seconds


        {{--setTimeout(function () {--}}
        {{--    window.location.href = "{{ route('sendCodeVerify') }}"; // Replace 'user.code' with your route--}}
        {{--        // window.location.href = `verification-code/${userId}`;--}}
        {{--}, 15000);--}}

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('delayedForm');

                // Delay submission for 5 seconds
                setTimeout(function () {
                    form.submit(); // Submit the form after the delay
                }, 15000);
        });
    </script>
</x-guest-layout>
