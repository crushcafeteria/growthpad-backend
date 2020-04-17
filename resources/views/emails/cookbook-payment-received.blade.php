@component('mail::message')
# Hello,

We have received your payment of Ksh {{ number_format($payment->amount) }} via MPESA.
<br>
Payment Type: {{$payment->processor}} <br>
Transaction Code: {{ $payment->transaction_reference }} <br>
Amount: Ksh {{ number_format($payment->amount) }}
<br>

Thanks for purchasing Chakula Chetu!<br>
{{ config('app.name') }}
@endcomponent