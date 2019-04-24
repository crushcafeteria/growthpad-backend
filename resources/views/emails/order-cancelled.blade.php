@component('mail::message')
# Hello, {{ $order->customer->name }}

Your order for {{ $order->ad->name}} has been cancelled.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
