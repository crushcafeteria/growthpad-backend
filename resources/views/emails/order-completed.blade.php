@component('mail::message')

Your order for <b>{{ $order->ad->name }} from {{ $order->ad->publisher->business_name }}</b> has been completed.
<br>
Expect delivery soon!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
