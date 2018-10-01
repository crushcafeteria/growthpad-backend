@component('mail::message')
# Hello {{ $order->ad->publisher->name }}

You have received a new order via {{ config('app.name') }}


@component('mail::table')
    |                           |                                   |
    |---------------------------|-----------------------------------|
    | **Customer Names**        | {{$order->customer->name}}       |
    | **Customer Telephone**    | {{$order->customer->telephone}}   |
    | **Customer Email**        | {{$order->customer->email}}   |
    | **Customer Location**     | {{$order->customer->location['display_name']}}    |
    | **Order Item**            | {{$order->ad->name}}              |
    | **Price**                 | {{$order->ad->price}}             |
    | **Order Item**            | {{$order->ad->name}}              |
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
