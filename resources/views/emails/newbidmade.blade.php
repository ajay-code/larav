@component('mail::message')
# Notice

A New Bid Was made on your Product By {{ $from->name }}

@component('mail::button', ['url' => url('/notifications')])
View Notification
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
