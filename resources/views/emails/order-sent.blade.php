@component('mail::message')
# Hello,

Your order for <b>{{ $order->ad->name }}</b> has been sent to <b>{{ $order->ad->publisher->business_name }}</b>.
<br>
Someone will be in touch soon!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
