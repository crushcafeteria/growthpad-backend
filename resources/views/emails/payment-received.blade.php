@component('mail::message')
# Hello,

Just letting you know that we have received a new payment.

MPESA Code: {{ $payment->transaction_reference }} <br>
Customer Names: {{ $payment->first_name }} {{ $payment->last_name }} <br>
Amount: Ksh {{ number_format($payment->amount) }}

@component('mail::button', ['url' => url('payments')])
Go to payments
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
