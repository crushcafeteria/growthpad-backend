@component('mail::message')
# New feedback message!

You have received a feedback message. Here are the details:-

@component('mail::panel')
Names : {!! $data->names !!}<br>
Telephone: {!! $data->telephone !!}<br>
Email: {!! $data->email !!}
@endcomponent

@component('mail::panel')
Message: <br>
{!! $data->message !!}
@endcomponent

All subsequent replies will be delivered to {{ $data->email }}

{!! config('app.name') !!}
@endcomponent
