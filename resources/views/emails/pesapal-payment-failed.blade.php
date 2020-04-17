@component('mail::message')
# Hello,

It seems your payment via Pesapal failed with the following status:-
<br>
STATUS: <code>{{$payment->pesapal_status}}</code>
<br>
For more information about this issue, please contact <a href="https://pesapal.com">Pesapal</a>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent