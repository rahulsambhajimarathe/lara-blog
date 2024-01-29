@component('mail::message')
<p>Hello {{$user->name}}</p>

    @component('mail::button', ['url' => url('reset', $user->remember_token)])
        Reset your password
    @endcomponent

<p> in case you have issues revcovering your password please contact us. </p>
Thanks <br>
    {{ config('app.name') }}
@endcomponent
