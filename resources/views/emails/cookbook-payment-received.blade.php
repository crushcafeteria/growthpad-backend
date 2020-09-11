@component('mail::message')
# Hello,

We have received your payment {{ (($payment->processor == 'PAYPAL')) ? 'EUR' : 'KES' }} {{ number_format($payment->amount) }}.

<br>
Processor: {{$payment->processor}} <br>
Transaction Code: {{ $payment->transaction_reference }} <br>
Amount: {{ (($payment->processor == 'PAYPAL')) ? 'EUR' : 'KES' }} {{ number_format($payment->amount) }}

<br>

@component('mail::button', ['url' => url('/cookbook/my-purchases')])
    Click to download your purchases
@endcomponent

Thanks for purchasing Chakula Chetu!<br>
{{ config('app.name') }}
@endcomponent
