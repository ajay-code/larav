@component('mail::message')
# Welcome to {{ config('app.name') }}, {{ $user->name }}

Please click the button to Confirm your Account

@component('mail::button', ['url' =>  url('').'/register/confirm/' . $token->token ])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
