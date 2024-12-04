@component('mail::message')
    <h1>Hi, {{$user->email}}</h1>
    <br>
    <p>Your verification code is: <strong>{{ $code }}</strong></p>
    <br>
    @component('mail::button',['url' => $link])
        Verify
    @endcomponent
    <br>
    {{ config('app.name') }}
@endcomponent



