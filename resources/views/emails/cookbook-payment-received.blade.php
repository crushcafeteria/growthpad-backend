@component('mail::message')
# Hello, {{ auth()->user()->name }}!

We have received your payment of Ksh {{ number_format($payment->amount) }} via MPESA.
<br>
Transaction Code: {{ $payment->transaction_reference }}
<br>

Thanks for purchasing Chakula Chetu!<br>
{{ config('app.name') }}
@endcomponent
