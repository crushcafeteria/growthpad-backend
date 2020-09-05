@component('mail::message')
# Hello,

We have received your payment
@if($paypal)
    {{ (session()->get('locale') == 'de') ? 'EUR' : 'USD' }}
@else
    Ksh
@endif

{{ number_format($payment->amount) }}.

<br>
Payment Type: {{$payment->processor}} <br>
Transaction Code: {{ $payment->transaction_reference }} <br>
Amount:
@if($paypal)
    {{ (session()->get('locale') == 'de') ? 'EUR' : 'USD' }}
@else
    Ksh
@endif
{{ number_format($payment->amount) }}
<br>

Thanks for purchasing Chakula Chetu!<br>
{{ config('app.name') }}
@endcomponent
