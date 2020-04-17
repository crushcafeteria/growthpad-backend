@component('mail::message')
# Hello,

It seems your payment via Pesapal failed with the status
<code>{{$payment->pesapal_status}}</code>

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent