@component('mail::message')
# Hello,

We have received your payment of Ksh {{ number_format($payment->amount) }} via MPESA.
<br>
Payment Type: {{$payment->processor}}
Transaction Code: {{ $payment->transaction_reference }}
Amount: Ksh {{ number_format($payment->amount) }}
<br>

Thanks for purchasing Chakula Chetu!<br>
{{ config('app.name') }}
@endcomponent