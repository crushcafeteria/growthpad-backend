@component('mail::message')
# Hello {{ $order->customer->name }}!

Your order for {{ $order->ad->name }} is being processed. Your supplier will be in touch soon!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
