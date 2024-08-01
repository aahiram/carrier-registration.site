@component('mail::message')
    Hi, {{ $user->name.' '.$user->lastname }}
    <br>
    Please use the link below to log in:
    <br>
    This link will expire in 30 minutes.
    <br>
    @component('mail::button',['url' => $link])
    Log in
    @endcomponent
    Thanks,
    <br>
    {{ config('app.name') }}
@endcomponent


