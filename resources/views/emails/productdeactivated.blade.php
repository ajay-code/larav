@component('mail::message')
# Product Disabled

your product <b>{{ $product->title }}</b> was disabled by the admin
for more information please contact the the admin at info@buyagoo.com

Thanks,<br>
{{ config('app.name') }}
@endcomponent
