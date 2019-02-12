@component('mail::message')
# Hello there,

Just letting you know we have received your payment of Ksh {{ number_format($payment->amount) }}
<br>
Your total credits = {{ auth()->user()->credits }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
