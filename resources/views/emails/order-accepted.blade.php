@component('mail::message')

<b>{{ $order->ad->publisher->business_name }}</b> has accepted your order for <b>{{ $order->ad->name }}</b>.
<br>
Expect your delivery soon!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
