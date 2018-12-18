@component('mail::message')

    Your item {{ $ad->name }} has been successfully posted to the {{ config('app.name') }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
