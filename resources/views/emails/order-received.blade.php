@component('mail::message')
# Hello {{ $order->ad->publisher->name }}

You have received a new order via {{ config('app.name') }}

@component('mail::panel')
    @component('mail::table')
        |                           |                                   |
        |---------------------------|-----------------------------------|
        | **Customer Names**        | {{$order->customer->names}}       |
        | **Customer Telephone**    | {{$order->customer->telephone}}   |
        | **Customer Email**        | {{$order->customer->telephone}}   |
        | **Customer Location**     | {{$order->customer->location}}    |
        | **Order Item**            | {{$order->ad->name}}              |
        | **Price**                 | {{$order->ad->price}}             |
        | **Order Item**            | {{$order->ad->name}}              |
    @endcomponent
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
